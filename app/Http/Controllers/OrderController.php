<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\OrderItem;

class OrderController extends Controller
{
    /**
     * ============================
     * USER: XỬ LÝ ĐẶT HÀNG
     * ============================
     */
    public function store(Request $request)
{
    $cart = session()->get('cart');

    if (!$cart || count($cart) == 0) {
        return redirect()->route('cart.index')
            ->with('error', 'Giỏ hàng trống');
    }

    $total = 0;
    foreach ($cart as $item) {
        $total += $item['price'] * $item['quantity'];
    }
    $user = auth()->user();

    $order = Order::create([
    'user_id'       => $user->id,
    'customer_name' => $user->name,
    'email'         => $user->email,
    'phone'         => $user->phone ?? '',
    'address'       => $user->address ?? '',
    'total'         => $total,
    'status'        => 'Đang xử lý',
]);


    // TẠO ORDER ITEMS
    foreach ($cart as $news_id => $item) {
        OrderItem::create([
            'order_id' => $order->id,
            'news_id'  => $news_id,
            'quantity' => $item['quantity'],
            'price'    => $item['price'],
        ]);
    }

    // XÓA GIỎ HÀNG SAU KHI LƯU XONG
    session()->forget('cart');

    return redirect()->route('order.success', $order->id);
}


    /**
     * ============================
     * USER: TRANG ĐẶT HÀNG THÀNH CÔNG
     * ============================
     */
    public function success($id)
    {
        $order = Order::with('items.news')->findOrFail($id);
        return view('cart.success', compact('order'));
    }

    /**
     * ============================
     * USER: ĐƠN HÀNG CỦA TÔI
     * ============================
     */
    public function myOrders()
{
    $orders = Order::where('user_id', auth()->id())
        ->with('items.news')
        ->latest()
        ->get();

    return view('order.my_orders', compact('orders'));
}


    /**
     * ============================
     * ADMIN: DANH SÁCH ĐƠN HÀNG
     * ============================
     */
    public function adminIndex()
    {
        $orders = Order::orderBy('created_at', 'desc')->get();
        return view('admin.orders.index', compact('orders'));
    }

    /**
     * ============================
     * ADMIN: CẬP NHẬT TRẠNG THÁI
     * ============================
     */
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required',
        ]);

        $order = Order::findOrFail($id);
        $order->status = $request->status;
        $order->save();

        return back()->with('success', 'Cập nhật trạng thái thành công');
    }
}
