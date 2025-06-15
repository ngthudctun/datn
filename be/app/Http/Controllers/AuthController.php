<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Http\Resources\UserResource;

class AuthController extends Controller
{
    // Lấy danh sách user (có phân trang)
    public function index()
    {
        $users = User::paginate(5);
        return UserResource::collection($users);
    }

    // Đăng nhập
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    if (!Auth::attempt($credentials)) {
        return response()->json([
            'message' => 'Email hoặc mật khẩu không đúng'
        ], 401);
    }

    $users = Auth::user();

    $token = $users->createToken('api-token')->plainTextToken;

    return response()->json([
        'message' => 'Đăng nhập thành công',
        'user' => $users,
        'token' => $token
    ]);
    }
    public function createUser(Request $request) {
        $validated = $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:1|confirmed',
        ], [
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Email không đúng định dạng',
            'password.required' => 'Vui lòng nhập mật khẩu'
        ]);

        if (!Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'Email hoặc mật khẩu không đúng'
            ], 401);
        }

        $user = Auth::user();
        $token = $user->createToken('api-token')->plainTextToken;

        return response()->json([
            'message' => 'Đăng nhập thành công',
            'user' => new UserResource($user),
            'token' => $token
        ]);
    }

    // Đăng ký
    public function createUser(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ], [
            'email.unique' => 'Email đã tồn tại',
            'password.confirmed' => 'Mật khẩu không trùng khớp',
            'password.min' => 'Mật khẩu phải có ít nhất 8 ký tự'
        ]);

        $validated['password'] = Hash::make($validated['password']);
        $user = User::create($validated);
        $token = $user->createToken('api-token')->plainTextToken;

        return response()->json([
            'message' => 'Đăng ký và đăng nhập thành công',
            'user' => new UserResource($user),
            'token' => $token
        ], 201);
    }

    // Đăng xuất
    public function logout(Request $request)
    {
        if ($request->user()) {
            $request->user()->currentAccessToken()->delete();
<<<<<<< HEAD


    public function createUser(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ], [
            'email.unique' => 'Email đã tồn tại',
            'password.confirmed' => 'Mật khẩu không trùng khớp',
            'password.min' => 'Mật khẩu phải có ít nhất 8 ký tự'
        ]);

        $validated['password'] = Hash::make($validated['password']);
        $user = User::create($validated);

        return response()->json([
            'message' => 'Đăng ký thành công',
            'user' => new UserResource($user)
        ], 201);
    }

    public function logout(Request $request)
    {
        if ($request->user()) {
            $request->user()->currentAccessToken()->delete();

=======
>>>>>>> f1ec6e5d (update product và api google)
            return response()->json(['message' => 'Đăng xuất thành công']);
        }

        return response()->json(['message' => 'Không xác thực được người dùng'], 401);
    }
}
