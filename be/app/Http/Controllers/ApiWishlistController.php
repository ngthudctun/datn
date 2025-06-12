<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;

class ApiWishlistController extends Controller
{
    public function toggle(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
        ]);

        $userId = auth()->id();
        if (!$userId) {
            return response()->json(['message' => 'Chưa đăng nhập'], 401);
        }

        $existing = Wishlist::where('user_id', $userId)
                            ->where('product_id', $request->product_id)
                            ->first();

        if ($existing) {
            $existing->delete();
            return response()->json(['message' => 'Đã xóa khỏi danh sách yêu thích']);
        }

        Wishlist::create([
            'user_id' => $userId,
            'product_id' => $request->product_id
        ]);

        return response()->json(['message' => 'Đã thêm vào danh sách yêu thích']);
    }

    public function index()
    {
        $userId = auth()->id();
        $wishlist = Wishlist::with('product')->where('user_id', $userId)->get();

        return response()->json(['data' => $wishlist]);
    }
}
