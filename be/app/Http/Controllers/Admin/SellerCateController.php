<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class SellerCateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Category::query()->withCount('products');

        // 🔍 1. Tìm kiếm theo tên
        if ($request->filled('search')) {
            $query->where('category_name', 'like', '%' . $request->search . '%');
        }

        // ✅ 2. Lọc theo trạng thái
        if ($request->has('status')) {
            if ($request->status == 1) {
                $query->where('status', 1);
            } elseif ($request->status == 2) {
                $query->where('status', 2);
            }
        }

        // ✅ 3. Lọc theo thời gian tạo
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

    public function getParentcate(?int $id = null)
    {

        if ($id) {

            $cateparent = Category::where('id', '!=', (int) $id)
                ->select('id', 'category_name') // Chỉ lấy các cột cần
                ->get();
            return $cateparent;
        } else {
            $cateparent = Category::select('id', 'category_name') // Chỉ lấy các cột cần
                ->get();
            return response()->json([
                'cateparent' => $cateparent,
            ], 200);
        }
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // Validate dữ liệu đầu vào
            $validated = $request->validate([
                'category_name' => 'required|string|max:255|unique:categories,category_name',
                'image' => 'nullable|string|max:255',
                'slug' => 'nullable|string|max:255',
                'category_parent_id' => 'nullable|integer',

            ]);

            // Gán slug nếu không truyền
            $slug = $validated['slug'] ?? Str::slug($validated['category_name']);

            // Tạo mới danh mục
            $category = Category::create([
                'category_name' => $validated['category_name'],
                'image' => $validated['image'] ?? null,
                'category_parent_id' =>
                empty($request->category_parent_id) || $request->category_parent_id == 0
                    ? null
                    : (int)$request->category_parent_id,
                'slug' => $slug,
                'status' => $request->status ?? 1 // mặc định là hiển thị nếu không truyền
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

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            // Lấy danh mục cùng với thông tin danh mục cha (chỉ lấy id, category_name)
            $category = Category::with('parent:id,category_name')->findOrFail((int)$id);

            $cateparent = $this->getParentcate((int)$id);
            return response()->json([

                'cateparent' => $cateparent,
                'data' => [
                    'id' => $category->id,
                    'category_name' => $category->category_name,
                    'slug' => $category->slug,
                    'image' => $category->image,
                    'status' => $category->status,
                    'category_parent_id' => $category->category_parent_id,
                    'category_parent_name' => $category->parent->category_name ?? null, // <- lấy tên danh mục cha
                ]
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Lỗi hệ thống',
                'error' => $e->getMessage()
            ], 500);
        }
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {

            // Tìm danh mục cần cập nhật
            $category = Category::findOrFail($id);

            // Validate dữ liệu đầu vào
            $validated = $request->validate([
                'category_name' => 'required|string|max:255|unique:categories,category_name,' . $id,
                'image' => 'nullable|string|max:255',
                'slug' => 'nullable|string|max:255',
                'category_parent_id' => 'nullable|integer',

            ]);

            // Gán slug nếu không truyền
            $slug = $validated['slug'] ?? Str::slug($validated['category_name']);

            // Cập nhật dữ liệu
            $category->update([
                'category_name' => $validated['category_name'],
                'image' => $validated['image'] ?? $category->image,
                'category_parent_id' =>
                empty($request->category_parent_id) || $request->category_parent_id == 0
                    ? null
                    : (int)$request->category_parent_id,
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


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request) {}
    public function changeStatus(Request $request)
    {

        $category = Category::findOrFail((int)$request->id);

        if ($category->status == 1) {
            $category->status = 2; // Ẩn danh mục
            $message = 'Danh mục đã bị ẩn.';
        } else {
            $category->status = 1; // Hiển thị lại danh mục
            $message = 'Danh mục đã được hiển thị.';
        }

        $category->save();

        return response()->json([
            'message' => $message,
            'type' => 'success'
        ]);
    }
}
