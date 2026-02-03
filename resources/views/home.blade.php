@extends('layouts.app')

@section('title', 'Trang chủ')

@section('content')

<section class="mb-20 bg-indigo-50 rounded-xl p-10">

    <h1 class="text-4xl font-bold mb-4 text-gray-800">
        Phụ kiện máy tính <br>
        <span class="text-indigo-600">Chính hãng – Giá tốt</span>
    </h1>

    <p class="text-gray-600 mb-6 max-w-xl">
        Chuột, bàn phím, tai nghe, linh kiện PC chất lượng cao.
        Phù hợp học tập – làm việc – gaming.
    </p>

    <a href="{{ route('news.index') }}"
       class="inline-block bg-indigo-600 text-white px-6 py-3 rounded-lg hover:bg-indigo-700 transition">
        Xem sản phẩm
    </a>

</section>

{{-- CTA --}}
<section class="bg-indigo-600 text-white text-center py-14 rounded-xl">

    <h2 class="text-3xl font-bold mb-4">
        Nâng cấp góc máy của bạn ngay hôm nay
    </h2>

    <a href="{{ route('news.index') }}"
       class="inline-block bg-white text-indigo-600 px-6 py-3 rounded-lg font-semibold hover:bg-gray-100">
        Mua ngay
    </a>

</section>

@endsection
