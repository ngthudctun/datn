<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if (!Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'Email hoặc mật khẩu không đúng'
            ], 401);
        }
        $user = Auth::user();

        // Trả về thông tin user
        return response()->json([
            'message' => 'Đăng nhập thành công',
            'user' => $user
        ]);
    }
    public function createUser(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:1|confirmed',
        ], [
            "email.unique" => "Email đã tồn tại",
            "password.confirmed" => "Mật khẩu không trùng khớp"
        ]);
        $validated['password'] = Hash::make($validated['password']);
        $user = User::create($validated);
        return response()->json([
            "message" => "Đăng kí thành công",
            "user" => $user
        ], 201);
    }
}
