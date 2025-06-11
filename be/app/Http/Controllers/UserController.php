<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kq = User::all();
        return response()->json($kq);
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
        // Validate dữ liệu từ frontend
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
        return response()->json($user, 201);
    }
    // public function ($user_code, Request $request)
    // {
    //     $validated = $request->validate([[
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|email|unique:users,email',
    //     ]]);
    // }

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
