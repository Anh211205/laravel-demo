@extends('layouts.app')

@section('content')
<style>
.cart-table img {
    border-radius: 8px;
}
.qty-box {
    display: flex;
    align-items: center;
    gap: 6px;
}
.qty-box button {
    width: 32px;
    height: 32px;
}
.order-summary {
    border-radius: 12px;
}
</style>

<div class="container">
    <h3 class="mb-4">🛒 Giỏ hàng của bạn</h3>

    @if(count($cart) == 0)
        <p>Giỏ hàng trống</p>
    @else
    <div class="row">
        <!-- GIỎ HÀNG -->
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <table class="table cart-table align-middle">
                        <thead>
                            <tr>
                                <th>Ảnh</th>
                                <th>Sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Giá</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $total = 0; @endphp

                            @foreach($cart as $key => $item)
                                @php
                                    $subtotal = $item['price'] * $item['quantity'];
                                    $total += $subtotal;
                                @endphp
                                <tr>
                                    <td>
                                        <img src="{{ asset('storage/'.$item['image']) }}" width="70">
                                    </td>
                                    <td>
                                        <strong>{{ $item['title'] }}</strong>
                                    </td>
                                    <td>
                                        <div class="qty-box">
                                            <form action="{{ route('cart.decrease', $key) }}" method="POST">
                                                @csrf
                                                <button class="btn btn-outline-secondary btn-sm">−</button>
                                            </form>

                                            <span>{{ $item['quantity'] }}</span>

                                            <form action="{{ route('cart.increase', $key) }}" method="POST">
                                                @csrf
                                                <button class="btn btn-outline-secondary btn-sm">+</button>
                                            </form>
                                        </div>
                                    </td>
                                    <td>{{ number_format($subtotal) }} đ</td>
                                    <td>
                                        <form action="{{ route('cart.remove', $key) }}" method="POST">
                                            @csrf
                                            <button class="btn btn-link text-danger">Xóa</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- TÓM TẮT ĐƠN HÀNG -->
        <div class="col-md-4">
            <div class="card order-summary shadow position-sticky" style="top: 80px;">
                <div class="card-body">
                    <h5 class="mb-3">🧾 Tóm tắt đơn hàng</h5>

                    <div class="d-flex justify-content-between mb-2">
                        <span>Tạm tính</span>
                        <span>{{ number_format($total) }} đ</span>
                    </div>

                    <div class="d-flex justify-content-between mb-2">
                        <span>Vận chuyển</span>
                        <span>Miễn phí</span>
                    </div>

                    <hr>

                    <div class="d-flex justify-content-between fw-bold fs-5 mb-3">
                        <span>Tổng cộng</span>
                        <span>{{ number_format($total) }} đ</span>
                    </div>

                    <form action="{{ route('order.store') }}" method="POST">
                        @csrf
                        <button class="btn btn-dark w-100">
                            Đặt hàng
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection
