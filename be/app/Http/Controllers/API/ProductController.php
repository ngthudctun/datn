<?php
// app/Http/Controllers/API/ProductController.php
namespace App\Http\Controllers\API;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    // Danh sách sản phẩm
    public function index()
    {
        return Product::all();
    }

    // Thêm sản phẩm mới
    public function store(Request $request)
    {
        $data = $request->validate([
            'product_name' => 'required|string|max:255',
            'image' => 'nullable|string', 
            'description' => 'nullable|string',
            'short_description' => 'nullable|string',
            'slug' => 'required|string|unique:products,slug',
            'status' => 'boolean',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
        ]);

        $product = Product::create($data);
        return response()->json($product, 201);
    }

    // Sửa sản phẩm
    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'product_name' => 'sometimes|required|string|max:255',
            'image' => 'nullable|string',
            'description' => 'nullable|string',
            'short_description' => 'nullable|string',
            'slug' => 'sometimes|required|string|unique:products,slug,' . $product->id,
            'status' => 'boolean',
            'category_id' => 'sometimes|required|exists:categories,id',
            'brand_id' => 'sometimes|required|exists:brands,id',
        ]);

        $product->update($data);
        return response()->json($product);
    }

    //Xoá sản phẩm
    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json(['message' => 'Sản phẩm đã được xoá']);
    }
}
