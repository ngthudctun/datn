<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Order_detail;
use App\Models\Pay;

class OrderController extends Controller
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
        return response()->json([
            'message' => 'Đơn hàng chưa được khởi tạo',
            'data' => $result
        ]);
    }
    public function addCartByUser($user_code, Request $request) {
        $createCartByUser = Order::create([ 'user_code' => $user_code]);
        return response()->json([
            'message' => 'Đơn hàng mới được khởi tạo',
            'data' => $createCartByUser
        ]);
    }
    public function addProductToCart(Request $request) {
        $validated = $request->validate([
            'order_code' => 'integer|required',
            'product_code' => 'integer|required',
            'quantity' => 'integer|required',
            'price' => 'integer|required',
        ]); 
    
        $addProductToCart = Order_detail::create($validated);
    
        return response()->json([
            'message' => 'sản phẩm đã thêm vào giỏ hàng',
            'data' => $addProductToCart
        ]);
    }
    public function getOrderDetail($order_code)
    {
        return response()->json(Order_detail::where('order_code', $order_code)->get());
    }
    public function updateProductInCart(Request $request)
    {
        // Validate dữ liệu đầu vào
        $validated = $request->validate([
            'order_code' => 'required|integer',
            'product_code' => 'required|integer',
            'quantity' => 'required|integer|min:1'
        ]);

        // Tìm chi tiết đơn hàng dựa trên order_code và product_code
        $orderDetail = Order_detail::where('order_code', $validated['order_code'])
            ->where('product_code', $validated['product_code'])
            ->update(['quantity' => $validated['quantity']]);

        return response()->json(['message' => 'Cập nhật thanh công']);
    }

    public function getDataToCart($user_code) {
        $getDataToCarByIdUser = Order::where('user_code', $user_code)->where('status', 'Giỏ hàng')
        ->join('order_details', 'orders.id', '=', 'order_details.order_code')
        ->join('products', 'order_details.product_code', '=', 'products.id')
        ->select('orders.id', 'order_details.quantity', 'order_details.price', 'products.name', 'products.id as product_id', 'products.image')
        ->get();
        return response()->json($getDataToCarByIdUser);
    }
    public function deleteProductCart(string $order_code, string $product_code)
    {
        $deleted = Order_detail::where('order_code', $order_code)
            ->where('product_code', $product_code)
            ->delete();

        // Kiểm tra số lượng dòng bị xóa
        if ($deleted > 0) {
            return response()->json(['message' => 'Sản phẩm đã được xóa khỏi giỏ hàng']);
        }

        return response()->json(['message' => 'Không tìm thấy sản phẩm trong giỏ hàng'], 404);
    }
    public function updateOrder(Request $request, $order_code) 
    {
        $validated = $request->validate([
            'quantity' => 'required|integer|min:0',
            'total' => 'required|numeric|min:0',
        ]);
        $order = Order::where('id', $order_code)->first();
        if (!$order) {
            return response()->json(['message' => 'Không tìm thấy đơn hàng'], 404);
        }
    
        $order->update([
            'quantity' => $validated['quantity'],
            'total' => $validated['total'],
        ]);
    
        return response()->json(['message' => 'Cập nhật đơn hàng thành công', 'data' => $order]);
    }
    public function getDataHistory($user_code) {
        $dataHistory = Order::where('user_code', $user_code)->get();
        return response()->json($dataHistory);
    }
    public function getCartToAdmin() {
        $cartToAdmin = Order::join('users', 'orders.user_code', '=', 'users.id')
        ->select('orders.*', 'users.name as user_name')
        ->get();
        return response()->json($cartToAdmin);
    }
    public function updateStatus($order_code, $user_code, Request  $request)
    {
        $putStatus = $request->validate([
             'status' => 'required|string|max:50'
        ]);
        $dataOrder = Order::where('id', $order_code)
        ->where('user_code', $user_code)
        ->where('status', 'Giỏ hàng')
        ->first();
        if (!$dataOrder) {
            return response()->json([
                'message' => 'Không tìm thấy đơn hàng hoặc đơn hàng không còn ở trạng thái Giỏ hàng',
            ], 404);
        }
        $dataOrder->update([
            'status' => $putStatus['status'],
        ]);
        return response()->json(
            [
                'message' => 'Thánh toán thành công, vui lòng theo dõi đơn hàng',
                'data' => $dataOrder
            ]
        );
    }
    public function adminChangeStatus($order_code, Request $request)
    {
        $putStatus = $request->validate([
            'status' =>  'required|string|max:50'
        ]);
        $dataOrder = Order::where('id', $order_code)
        ->first();
        if(!$dataOrder) {
            return response()->json([
                'message' => 'Không tìm thấy đơn hàng hoặc đơn hàng',
            ], 404);
        }
        $dataOrder->update([
            'status' => $putStatus['status'],
        ]);
        return response()->json([
            'message' => 'Cập nhật thành công',
            'data' => $dataOrder
        ]);
    }
    public function addDiscountToCart($user_code, Request $request)
    {
        // Validate input
        $discountCode = $request->validate([
            'discount_code' => 'required|max:50|string'
        ]);
    
        // Kiểm tra xem có đơn hàng nào của người dùng với trạng thái 'Giỏ hàng' không
        $order = Order::where('user_code', $user_code)
            ->where('status', 'Giỏ hàng')
            ->update([
                'discount_code' => $discountCode['discount_code'],
            ]);
            return response()->json('cập nhật thành công');
    }
    public function addPay(Request $request)
    {
        $addPay = $request->validate([
            'order_code' => 'required|max:10|integer',
            'name_user' => 'required|max:50|string',
            'address' => 'required|max:50|string',
            'phone' => 'required|max:50|string',
            'payment_method' => 'required|max:50|string',
            'total_amount' => 'required|integer'
        ]);

        $addPayed = Pay::create($addPay);

        return response()->json(
            [
                'message' => 'Thanh toán thành công',
                'data' => $addPayed
            ]
        );
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
