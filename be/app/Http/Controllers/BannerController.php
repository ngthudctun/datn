<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;

class BannerController extends Controller
{
    public function store(Request $request)
{
    $validated = $request->validate([
        'url' => 'nullable|url',
        'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
    ]);

    if ($request->hasFile('image')) {
        $path = $request->file('image')->store('public/storage/images/banner');
        $imageUrl = str_replace('public/', 'storage/', $path);
    } else {
        return response()->json(['error' => 'Image file is required.'], 400);
    }

    $banner = Banner::create([
        'url' => $request->input('url'),
        'image_url' => $imageUrl,
    ]);

    return response()->json([
        'message' => 'Banner created successfully.',
        'data' => $banner,
    ]);
}
}
