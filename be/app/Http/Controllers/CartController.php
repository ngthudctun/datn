<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Cart_Item;
use Illuminate\Http\Request;
use App\Models\Order;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cart = Cart::paginate(8);
        return response()->json($cart);
    }
    public function getCartByUser($user_code) {
        $result = Cart::where('user_code', $user_code)
                   ->where('status', 'Giỏ hàng')
                   ->first();
                   if ($result) {
                    return response()->json([
                        'message' => 'Đơn hàng đã được khởi tạo',
                        'data' => $result
                    ]);
                }
        return response()->json(['message' => 'Đơn hàng chưa đc khởi tạo']);
    }
     public function toggle(Request $request)
    {
    $request->validate([
        'product_variant_id' => 'required|exists:product_variants,id',
        'quantity' => 'nullable|integer|min:1',
    ]);

    $userId = auth()->id();
    if (!$userId) {
        return response()->json(['message' => 'Unauthorized'], 401);
    }

    $quantity = $request->quantity ?? 1;

    $cart = Cart::firstOrCreate(['user_id' => $userId]);

    $item = Cart_Item::where('cart_id', $cart->cart_id)
                    ->where('product_variant_id', $request->product_variant_id)
                    ->first();

        if ($item) {
            $item->delete();
            return response()->json(['message' => 'Đã xóa sản phẩm khỏi giỏ hàng']);
        }

        Cart_Item::create([
            'cart_id' => $cart->cart_id,
            'product_variant_id' => $request->product_variant_id,
            'quantity' => $quantity
        ]);

        return response()->json(['message' => 'Đã thêm sản phẩm vào giỏ hàng']);
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
