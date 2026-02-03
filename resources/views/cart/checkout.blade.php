<form action="{{ route('order.store') }}" method="POST">
@csrf

<h3>Thông tin người nhận</h3>
<input name="customer_name" placeholder="Họ tên" required>
<input name="email" placeholder="Email" required>
<input name="phone" placeholder="Số điện thoại" required>
<input name="address" placeholder="Địa chỉ" required>

<h3>Đơn hàng</h3>
@php $total = 0; @endphp
@foreach($cart as $item)
    <p>
        {{ $item['title'] }} × {{ $item['quantity'] }}
        = {{ number_format($item['price'] * $item['quantity']) }}đ
    </p>
    @php $total += $item['price'] * $item['quantity']; @endphp
@endforeach

<strong>Tổng cộng: {{ number_format($total) }}đ</strong>

<br><br>
<button type="submit">Đặt hàng</button>
</form>
