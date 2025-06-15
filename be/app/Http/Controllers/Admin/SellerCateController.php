<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use App\Models\Category;

class SellerCateController extends Controller
{
    // Danh sách danh mục (có lọc, tìm kiếm, phân trang)
    public function index(Request $request)
    {
        $query = Category::query()->withCount('products');

        if ($request->filled('search')) {
            $query->where('category_name', 'like', '%' . $request->search . '%');
        }

        if ($request->has('status')) {
            if ($request->status == 1) {
                $query->where('status', 1);
            } elseif ($request->status == 2) {
                $query->where('status', 2);
            }
        }

        if ($request->has('sort')) {
            if ($request->sort === 'newest') {
                $query->orderBy('created_at', 'desc');
            } elseif ($request->sort === 'oldest') {
                $query->orderBy('created_at', 'asc');
            }
        }

        $cateall = $query->paginate(4);

        return response()->json($cateall);
    }

    // Lấy danh mục cha (trừ ID hiện tại nếu có)
    public function getParentcate(?int $id = null)
    {
        $query = Category::select('id', 'category_name');

        if ($id) {
            $query->where('id', '!=', $id);
        }

        $cateparent = $query->get();

        return response()->json(['cateparent' => $cateparent], 200);
    }

    // Tạo mới danh mục
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'category_name' => 'required|string|max:255|unique:categories,category_name',
                'image' => 'nullable|string|max:255',
                'slug' => 'nullable|string|max:255',
                'category_parent_id' => 'nullable|integer',
            ]);

            $slug = $validated['slug'] ?? Str::slug($validated['category_name']);

            $category = Category::create([
                'category_name' => $validated['category_name'],
                'image' => $validated['image'] ?? null,
                'category_parent_id' => empty($request->category_parent_id) || $request->category_parent_id == 0 ? null : (int)$request->category_parent_id,
                'slug' => $slug,
                'status' => $request->status ?? 1,
            ]);

            return response()->json([
                'type' => 'success',
                'message' => 'Tạo danh mục thành công',
                'data' => $category
            ], 201);
        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Dữ liệu gửi lên không hợp lệ',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Lỗi hệ thống',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // Hiển thị thông tin 1 danh mục
    public function show(string $id)
    {
        try {
            $category = Category::with('parent:id,category_name')->findOrFail((int)$id);
            $cateparent = $this->getParentcate((int)$id)->getData(true)['cateparent'];

            return response()->json([
                'cateparent' => $cateparent,
                'data' => [
                    'id' => $category->id,
                    'category_name' => $category->category_name,
                    'slug' => $category->slug,
                    'image' => $category->image,
                    'status' => $category->status,
                    'category_parent_id' => $category->category_parent_id,
                    'category_parent_name' => $category->parent->category_name ?? null,
                ]
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Lỗi hệ thống',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // Cập nhật danh mục
    public function update(Request $request, string $id)
    {
        try {
            $category = Category::findOrFail($id);

            $validated = $request->validate([
                'category_name' => 'required|string|max:255|unique:categories,category_name,' . $id,
                'image' => 'nullable|string|max:255',
                'slug' => 'nullable|string|max:255',
                'category_parent_id' => 'nullable|integer',
            ]);

            $slug = $validated['slug'] ?? Str::slug($validated['category_name']);

            $category->update([
                'category_name' => $validated['category_name'],
                'image' => $validated['image'] ?? $category->image,
                'category_parent_id' => empty($request->category_parent_id) || $request->category_parent_id == 0 ? null : (int)$request->category_parent_id,
                'slug' => $slug,
                'status' => $request->status ?? $category->status
            ]);

            return response()->json([
                'type' => 'success',
                'message' => 'Cập nhật danh mục thành công',
                'data' => $category
            ], 200);
        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Dữ liệu gửi lên không hợp lệ',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Lỗi hệ thống',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // Đổi trạng thái hiển thị danh mục
    public function changeStatus(Request $request)
    {
        $category = Category::findOrFail((int)$request->id);

        $category->status = $category->status == 1 ? 2 : 1;
        $category->save();

        return response()->json([
            'message' => $category->status == 1 ? 'Danh mục đã được hiển thị.' : 'Danh mục đã bị ẩn.',
            'type' => 'success'
        ]);
    }

    // Xóa danh mục (nếu cần)
    public function destroy(Request $request)
    {
        // Viết code xóa ở đây nếu cần
    }
}
