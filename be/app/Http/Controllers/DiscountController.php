<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DiscountController extends Controller
{
    public function index()
    {
        $discounts = Discount::with('product')->get();
        return response()->json($discounts);
    }

    
    public function store(Request $request)
    {
          
        try {
            $validated = $request->validate([
            'product_id'     => 'required|exists:products,id',
            'value'          => 'required|numeric|min:0',
            'discount_type'  => 'required|in:percentage,fixed_amount',
            'start_date'     => 'required|date|before_or_equal:end_date',
            'end_date'       => 'required|date|after_or_equal:start_date',
        ]);

        $discount = Discount::create($validated);

        return response()->json([
            'message' => 'Discount created successfully.',
            'data'    => $discount
        ], 201);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    // Giảm giá theo ID sp
    public function show($id)
    {
        $discount = Discount::with('product')->find($id);

        if (!$discount) {
            return response()->json(['message' => 'Discount not found'], 404);
        }

        return response()->json($discount);
    }

    
    public function update(Request $request, $id)
    {
        $discount = Discount::find($id);

        if (!$discount) {
            return response()->json(['message' => 'Discount not found'], 404);
        }

        $validated = $request->validate([
            'value'          => 'sometimes|required|numeric|min:0',
            'discount_type'  => 'sometimes|required|in:percentage,fixed_amount',
            'start_date'     => 'sometimes|required|date|before_or_equal:end_date',
            'end_date'       => 'sometimes|required|date|after_or_equal:start_date',
        ]);

        $discount->update($validated);

        return response()->json([
            'message' => 'Discount updated successfully.',
            'data'    => $discount
        ]);
    }

    
    public function destroy($id)
    {
        $discount = Discount::find($id);

        if (!$discount) {
            return response()->json(['message' => 'Discount not found'], 404);
        }

        $discount->delete();

        return response()->json(['message' => 'Discount deleted successfully.']);
    }

   
    public function getByProduct($productId)
    {
        $discount = Discount::where('product_id', $productId)
            ->whereDate('start_date', '<=', now())
            ->whereDate('end_date', '>=', now())
            ->latest()
            ->first();

        if (!$discount) {
            return response()->json(['message' => 'No active discount found for this product.'], 404);
        }

        return response()->json($discount);
    }
}
