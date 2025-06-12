<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::paginate(12);
        return response()->json($products);
    }
    public function getById($id) {
        $products = Product::find($id);
        return response()->json($products);
    }
    public function getRelatedById($id) {
        $products = Product::find($id);
        $relatedProducts = Product::where('category_code', $products->category_code)
        ->where('id', '!=', $id)
        ->get();
        return response()->json($relatedProducts);
    }
    public function latestFive()    
    {
        $products = Product::orderBy('created_at', 'desc')->take(8)->get();

        return response()->json($products);
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
