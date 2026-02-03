@extends('layouts.myapp')

@section('content')
<div class="max-w-xl mx-auto py-20 text-center">

    <h1 class="text-3xl font-bold text-green-600 mb-4">
        🎉 Đặt hàng thành công
    </h1>

    <p class="text-gray-600 mb-6">
        Cảm ơn bạn đã mua hàng tại shop phụ kiện máy tính
    </p>

    <a href="{{ route('news.index') }}"
       class="inline-block bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700">
        Quay về trang chủ
    </a>

</div>
@endsection
