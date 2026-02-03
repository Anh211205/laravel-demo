@extends('layouts.myapp')

@section('title','Thêm sản phẩm')

@section('content')
<h1>Thêm sản phẩm mới</h1>

<form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
@csrf

<input type="text" name="title" placeholder="Tên sản phẩm" required>

<textarea name="content" placeholder="Mô tả"></textarea>

<input type="number" name="price" placeholder="Giá">

{{-- ẢNH --}}
<input type="file" name="image" accept="image/*">

<button type="submit">Thêm</button>
</form>


@endsection
