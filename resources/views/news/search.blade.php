@extends('layouts.myapp')

@section('content')
<div class="max-w-7xl mx-auto py-10">

    <h2 class="text-2xl font-bold mb-6">
        🔎 Kết quả tìm kiếm cho: "{{ $q }}"
    </h2>

    @if($news->count() == 0)
        <p class="text-gray-500">
            Không tìm thấy sản phẩm nào.
        </p>
    @else
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($news as $item)
                <div class="border rounded-lg p-4 shadow hover:shadow-lg">
                    <h3 class="font-semibold text-lg mb-2">
                        {{ $item->title }}
                    </h3>

                    <p class="text-sm text-gray-600 mb-3">
                        {{ Str::limit($item->content, 100) }}
                    </p>

                    <a href="{{ route('news.show', $item->id) }}"
                       class="text-indigo-600 hover:underline">
                        Xem chi tiết →
                    </a>
                </div>
            @endforeach
        </div>
    @endif

</div>
@endsection
