@extends('layouts.myapp')

@section('content')
<h1>Danh sách tin tức</h1>

@auth
    <a href="{{ route('news.create') }}" class="btn btn-primary">
        Thêm tin mới
    </a>
@endauth

<ul>
@foreach($news as $item)
    <li>
        <h3>
            <a href="{{ route('news.show', $item->id) }}">
                {{ $item->title }}
            </a>
        </h3>

        @if(!empty($item->summary))
            <p>{{ $item->summary }}</p>
        @endif

        @auth
            <a href="{{ route('news.edit', $item->id) }}">Sửa</a>

            <form action="{{ route('news.destroy', $item->id) }}"
                  method="POST"
                  style="display:inline">
                @csrf
                @method('DELETE')
                <button type="submit">Xóa</button>
            </form>
        @endauth
    </li>
@endforeach
</ul>

<div>
    {{ $news->links() }}
</div>
@endsection

