<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    public function getAllCategory() {
        $getCategories = Category::all();
        return response()->json($getCategories);
    }
    public function addCategory(Request $request) {
        $nameCategory = $request->validate([
            'name' => 'required|string|max:50|unique:categories,name'
        ]);
        $category = Category::create($nameCategory);
        return response()->json($category);
    }
    public function getCategoryById($categoryId) 
    {
        $getCategoryById = Category::find($categoryId);
        return response()->json($getCategoryById);
    }
    public function updateCategory($categoryId, Request $request)
    {
        $nameCategory = $request->validate([
            'name' => 'required|string|max:50|unique:categories,name,' . $categoryId
        ]);
        $category = Category::find($categoryId);

    if (!$category) {
        return response()->json(['message' => 'Danh mục không tồn tại'], 404);
    }

    $category->update(['name' => $nameCategory['name']]);

    return response()->json(['message' => 'Cập nhật thành công', 'category' => $category]);
    }
    public function deleteCategory(string $id) {
        $category = Category::find($id);

        $hasProduct = Product::where('category_code', $id)->get();

        if($hasProduct->count() > 0) {
            Product::where('category_code', $id)->update(
                ['category_code' => 11]
            );
        }

        $category->delete();
        return response()->json(["message" => "Xóa danh mục thành công"]);

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
        //
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
