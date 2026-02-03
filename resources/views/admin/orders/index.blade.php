@extends('layouts.app')

@section('content')
<div class="container">
    <h3>📋 Quản lý đơn hàng</h3>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Khách</th>
                <th>Tổng</th>
                <th>Trạng thái</th>
                <th>Cập nhật</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr>
                <td>#{{ $order->id }}</td>
                <td>{{ $order->customer_name }}</td>
                <td>{{ number_format($order->total) }} đ</td>
                <td>{{ $order->status }}</td>
                <td>
                    <form method="POST"
                        action="{{ route('admin.orders.updateStatus', $order->id) }}">
                        @csrf
                        <select name="status" class="form-select form-select-sm">
                            <option>Đang xử lý</option>
                            <option>Đang giao</option>
                            <option>Hoàn thành</option>
                            <option>Hủy</option>
                        </select>
                        <button class="btn btn-sm btn-primary mt-1">Lưu</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
