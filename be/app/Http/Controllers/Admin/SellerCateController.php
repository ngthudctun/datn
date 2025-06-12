<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class SellerCateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cateall = Category::withTrashed()->withCount('products')->paginate(4);
        return response()->json($cateall);
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
            /*             dd((int)$request->category_parent_id);
 */
            $request->validate([
                'category_name' => 'required|string|max:255|unique:categories,category_name',
                'image' => 'nullable|string|max:255',
            ]);

            $category = Category::create([
                'category_name' => $request->category_name,
                'image' => $request->image,
                'category_parent_id' => (int)$request->category_parent_id,
                'slug' => $request->slug
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

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
