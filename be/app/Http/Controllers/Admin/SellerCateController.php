<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class SellerCateController extends Controller
{
    // Danh sách danh mục (có lọc, tìm kiếm, phân trang)
    public function index(Request $request)
    {
        $query = Category::withTrashed()->withCount('products');

        if ($request->filled('search')) {
            $query->where('category_name', 'like', '%' . $request->search . '%');
        }

        if ($request->has('status')) {
            $query->where('status', $request->status);
        }

        if ($request->sort === 'newest') {
            $query->orderBy('created_at', 'desc');
        } elseif ($request->sort === 'oldest') {
            $query->orderBy('created_at', 'asc');
        }

        return response()->json($query->paginate(4));
    }

    // Lấy danh mục cha
    public function getParentcate(?int $id = null)
    {
        $query = Category::select('id', 'category_name');

        if ($id) {
            $query->where('id', '!=', $id);
        }

        return response()->json(['cateparent' => $query->get()], 200);
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
                'slug' => $slug,
                'category_parent_id' => $request->category_parent_id ?: null,
                'status' => $request->status ?? 1,
            ]);

            return response()->json([
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

    // Lấy chi tiết 1 danh mục
    public function show(string $id)
    {
        try {
            $category = Category::with('parent:id,category_name')->findOrFail($id);
            $cateparent = $this->getParentcate($id)->getData(true)['cateparent'];

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
            ]);
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
                'category_parent_id' => $request->category_parent_id ?: null,
                'slug' => $slug,
                'status' => $request->status ?? $category->status
            ]);

            return response()->json([
                'message' => 'Cập nhật danh mục thành công',
                'data' => $category
            ]);
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

    // Đổi trạng thái danh mục
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

    // Xoá danh mục
    public function destroy(string $id)
    {
        try {
            $category = Category::findOrFail($id);
            $category->delete();

            return response()->json([
                'message' => 'Xoá danh mục thành công.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Lỗi khi xoá danh mục.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
