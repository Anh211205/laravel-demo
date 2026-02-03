@extends('layouts.myapp')

@section('content')
<h1 class="text-2xl font-bold mb-6">Sửa sản phẩm</h1>

<form action="{{ route('news.update', $news->id) }}"
      method="POST"
      enctype="multipart/form-data"
      class="space-y-4">

    @csrf
    @method('PUT')

    <input type="text"
           name="title"
           value="{{ $news->title }}"
           class="w-full border p-2"
           required>

    <textarea name="content"
              class="w-full border p-2"
              rows="4">{{ $news->content }}</textarea>

    <input type="number"
           name="price"
           value="{{ $news->price }}"
           class="w-full border p-2"
           required>

    {{-- Ảnh hiện tại --}}
    @if($news->image)
        <img src="{{ asset('storage/'.$news->image) }}"
             class="w-40 mb-2 rounded">
    @endif

    {{-- Upload ảnh mới --}}
    <input type="file" name="image">

    <button class="bg-blue-600 text-white px-4 py-2 rounded">
        Cập nhật
    </button>
</form>
@endsection
