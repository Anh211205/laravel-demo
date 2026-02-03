@extends('layouts.myapp')

@section('content')

<div class="max-w-4xl mx-auto bg-white p-6 rounded-xl shadow">

    <h1 class="text-3xl font-bold mb-4">
        {{ $news->title }}
    </h1>

    {{-- ẢNH SẢN PHẨM --}}
    @if($news->image)
        <img
            src="{{ asset('storage/' . $news->image) }}"
            alt="{{ $news->title }}"
            class="w-full h-80 object-contain rounded-lg mb-6"
        >
    @endif

    <p class="text-gray-700 mb-4">
        {!! nl2br(e($news->content)) !!}
    </p>

    <p class="text-red-600 text-2xl font-bold mb-6">
        {{ number_format($news->price) }} đ
    </p>

</div>

@endsection
