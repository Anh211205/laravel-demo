@extends('layouts.myapp')	
@section('content')	
<h1>Danh sách tin tức</h1>	
<a	href="{{route('news.create')}}">Thêm tin tức mới</a>	
<ul>	
@foreach($news as $item)	
<li>	
{{$item->title}}	
<a	href="{{route('news.edit',$item->id)}}">Sửa</a>	
<form action="{{route('news.destroy',$item->id)}}"	method="POST"	
style="display:inline">	
@csrf	
@method('DELETE')	
<button	type="submit">Xóa</button>	
</form>	
</li>	
@endforeach	
</ul>
<div>
	{{$news->links()}}
</div>
@endsection
