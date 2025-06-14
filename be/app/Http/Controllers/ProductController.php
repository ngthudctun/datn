<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Lấy danh sách sản phẩm
    public function index()
    {
        $products = Product::with('variants.attributeVariants', 'variants.images')->paginate(10);
        return response()->json($products);
    }

    // Lấy 1 sản phẩm theo ID
    public function show($id)
    {
        $product = Product::with('variants.attributeVariants', 'variants.images')->findOrFail($id);
        return response()->json($product);
    }

    // Tạo mới sản phẩm + biến thể
    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'slug' => 'required|string|unique:products,slug',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
            'variants' => 'required|array|min:1',
        ]);

        $product = Product::create($request->only([
            'product_name', 'image', 'description', 'short_description',
            'slug', 'status', 'category_id', 'brand_id',
        ]));

        foreach ($request->variants as $variantData) {
            $variant = $product->variants()->create([
                'sku' => $variantData['sku'],
                'price' => $variantData['price'],
                'stock_quantity' => $variantData['stock_quantity'],
                'status' => $variantData['status'] ?? true,
            ]);

            if (!empty($variantData['attribute_variant_ids'])) {
                $variant->attributeVariants()->attach($variantData['attribute_variant_ids']);
            }

            if (!empty($variantData['images'])) {
                foreach ($variantData['images'] as $imageUrl) {
                    $variant->images()->create(['image_url' => $imageUrl]);
                }
            }
        }

        return response()->json(['message' => 'Tạo sản phẩm thành công', 'product' => $product->load('variants.attributeVariants', 'variants.images')]);
    }

    // Cập nhật sản phẩm
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $product->update($request->only([
            'product_name', 'image', 'description', 'short_description',
            'slug', 'status', 'category_id', 'brand_id',
        ]));

        // Xóa biến thể cũ nếu cần
        $product->variants()->each(function ($variant) {
            $variant->attributeVariants()->detach();
            $variant->images()->delete();
            $variant->delete();
        });

        foreach ($request->variants as $variantData) {
            $variant = $product->variants()->create([
                'sku' => $variantData['sku'],
                'price' => $variantData['price'],
                'stock_quantity' => $variantData['stock_quantity'],
                'status' => $variantData['status'] ?? true,
            ]);

            if (!empty($variantData['attribute_variant_ids'])) {
                $variant->attributeVariants()->attach($variantData['attribute_variant_ids']);
            }

            if (!empty($variantData['images'])) {
                foreach ($variantData['images'] as $imageUrl) {
                    $variant->images()->create(['image_url' => $imageUrl]);
                }
            }
        }

        return response()->json(['message' => 'Cập nhật sản phẩm thành công', 'product' => $product->load('variants.attributeVariants', 'variants.images')]);
    }

    // Xoá sản phẩm
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        $product->variants()->each(function ($variant) {
            $variant->attributeVariants()->detach();
            $variant->images()->delete();
            $variant->delete();
        });

        $product->delete();

        return response()->json(['message' => 'Xoá sản phẩm thành công']);
    }
}
