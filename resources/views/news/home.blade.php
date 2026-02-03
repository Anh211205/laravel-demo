@extends('layouts.myapp')

@section('content')

{{-- BANNER --}}
<div class="mb-12">
    <img src="/images/banner1.jpg"
         class="w-full h-[420px] object-cover rounded-xl shadow">
</div>

{{-- GIỚI THIỆU --}}
<div class="grid md:grid-cols-3 gap-6 text-center">

    <div class="bg-white p-6 rounded-xl shadow">
        <img src="/images/icon1.png" class="h-20 mx-auto mb-4">
        <h3 class="font-bold text-lg mb-2">Phụ kiện chính hãng</h3>
        <p class="text-gray-600 text-sm">
            Cam kết chất lượng – bảo hành đầy đủ
        </p>
    </div>

    <div class="bg-white p-6 rounded-xl shadow">
        <img src="/images/icon2.png" class="h-20 mx-auto mb-4">
        <h3 class="font-bold text-lg mb-2">Giá tốt</h3>
        <p class="text-gray-600 text-sm">
            Giá cạnh tranh – nhiều ưu đãi
        </p>
    </div>

    <div class="bg-white p-6 rounded-xl shadow">
        <img src="/images/icon3.png" class="h-20 mx-auto mb-4">
        <h3 class="font-bold text-lg mb-2">Giao hàng nhanh</h3>
        <p class="text-gray-600 text-sm">
            Toàn quốc – nhận hàng nhanh chóng
        </p>
    </div>

</div>

@endsection
