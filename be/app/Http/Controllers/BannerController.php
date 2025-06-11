<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banners = Banner::paginate(5);
        return response()->json($banners);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'url' => 'nullable|url',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Lưu ảnh vào storage/app/public/images/banner
            $path = $request->file('image')->store('images/banner', 'public');
            $imageUrl = 'storage/' . $path;
        } else {
            return response()->json(['error' => 'Image file is required.'], 400);
        }

        $banner = Banner::create([
            'url' => $validated['url'] ?? null,
            'image_url' => $imageUrl,
        ]);

        return response()->json([
            'message' => 'Banner created successfully.',
            'data' => $banner,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $banner = Banner::find($id);

        if (!$banner) {
            return response()->json(['error' => 'Banner not found.'], 404);
        }

        return response()->json($banner);
    }
}
