@extends('layouts.myapp')

@section('content')

<h1 class="text-3xl font-bold mb-8 text-center">
    Danh sách sản phẩm
</h1>

@if($news->count() == 0)
    <p class="text-center text-gray-500">
        Chưa có sản phẩm nào.
    </p>
@else
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
        @foreach($news as $item)
            <div class="bg-white rounded-xl shadow hover:shadow-lg transition p-5">

                {{-- ẢNH SẢN PHẨM --}}
                @if($item->image)
                    <img
                        src="{{ asset('storage/' . $item->image) }}"
                        alt="{{ $item->title }}"
                        class="w-full h-48 object-cover rounded-lg mb-4"
                    >
                @else
                    {{-- ẢNH MẶC ĐỊNH --}}
                    <div class="w-full h-48 bg-gray-200 flex items-center justify-center rounded-lg mb-4 text-gray-400">
                        Không có ảnh
                    </div>
                @endif

                <h2 class="font-semibold text-lg mb-2">
                    {{ $item->title }}
                </h2>

                <p class="text-gray-600 text-sm mb-3">
                    {{ Str::limit($item->content, 90) }}
                </p>

                <p class="text-red-600 font-bold text-lg mb-4">
                    {{ number_format($item->price) }} đ
                </p>

                <div class="flex justify-between items-center">
                    <a href="{{ route('news.show', $item->id) }}"
                       class="text-blue-600 hover:underline">
                        Chi tiết
                    </a>

                    <form action="{{ route('cart.add', $item->id) }}" method="POST">
                        @csrf
                        <button
                            class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                            Thêm giỏ
                        </button>
                    </form>
                </div>

            </div>
        @endforeach
    </div>

    <div class="mt-8">
        {{ $news->links() }}
    </div>
@endif

@endsection
