@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-4">📦 Đơn hàng của tôi</h3>

    @if($orders->count() == 0)
        <p>Bạn chưa có đơn hàng nào</p>
    @else
        <table class="table table-bordered">
            <thead class="table-light">
                <tr>
                    <th>Mã đơn</th>
                    <th>Ngày đặt</th>
                    <th>Tổng tiền</th>
                    <th>Trạng thái</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                    <td>#{{ $order->id }}</td>
                    <td>{{ $order->created_at->format('d/m/Y') }}</td>
                    <td>{{ number_format($order->total) }} đ</td>
                    <td>
                        <span class="badge bg-info">
                            {{ $order->status }}
                        </span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
