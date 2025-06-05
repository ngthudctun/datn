<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    public function getCartByUser($user_code) {
        $result = Order::where('user_code', $user_code)
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
