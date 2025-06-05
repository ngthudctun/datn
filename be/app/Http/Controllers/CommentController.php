<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    public function getAll() 
    {
        $comments = Comment::join('users', 'comments.user_code', '=', 'users.id')
                   ->select('comments.*', 'users.name')
                   ->get();
        return response()->json($comments);
    }

    public function sendComment( $product, $user, Request $request) {
        $validated = $request->validate([
            'content' => 'required|string|max:255',
        ]);

        if($product && $user) {
            $validated['product_code'] = $product;
            $validated['user_code'] = $user;
        
            $comment = Comment::create($validated);
        
            return response()->json([
                'message' => 'Bình luận đã được gửi thành công!',
                'data' => $comment
            ], 201);
        }
        return response()->json([
            'message' => 'Bình luận chưa được gửi thành công!'
        ], 404);
        
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
