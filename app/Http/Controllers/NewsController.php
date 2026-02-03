<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Comment;

class NewsController extends Controller
{
    // Danh sách sản phẩm
    public function index()
    {
        $news = News::paginate(8);
        return view('news.index', compact('news'));
    }

    // Form thêm sản phẩm
    public function create()
    {
        return view('news.create');
    }

    // Lưu sản phẩm mới
    public function store(Request $request)
{
    $imagePath = null;

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')
                             ->store('products', 'public');
    }

    News::create([
        'title'   => $request->title,
        'content' => $request->content,
        'price'   => $request->price,
        'image'   => $imagePath, // lưu đường dẫn ảnh
    ]);

    return redirect()->route('news.index')
                     ->with('success','Thêm sản phẩm thành công');
}


    // Chi tiết sản phẩm
    public function show($id)
    {
        $news = News::findOrFail($id);
        $comments = Comment::where('news_id', $id)
        ->latest()
        ->paginate(5);
        return view('news.show', compact('news','comments'));
    }

    // Form sửa
    public function edit($id)
    {
        $news = News::findOrFail($id);
        return view('news.edit', compact('news'));
    }

    public function update(Request $request, $id)
{
    $news = News::findOrFail($id);

    $data = $request->validate([
        'title'   => 'required',
        'content' => 'nullable',
        'price'   => 'required|numeric',
        'image'   => 'nullable|image|max:2048'
    ]);

    // Nếu có upload ảnh mới
    if ($request->hasFile('image')) {

        // Xóa ảnh cũ (nếu có)
        if ($news->image && Storage::disk('public')->exists($news->image)) {
            Storage::disk('public')->delete($news->image);
        }

        // Lưu ảnh mới
        $data['image'] = $request->file('image')
                                 ->store('products', 'public');
    }

    $news->update($data);

    return redirect()->route('news.index')
        ->with('success','Cập nhật sản phẩm thành công');
}


    // Xóa (chỉ admin)
    public function destroy($id)
    {
        if (!auth()->check() || auth()->user()->role !== 'admin') {
            abort(403, 'Bạn không có quyền xóa sản phẩm');
        }

        News::findOrFail($id)->delete();

        return redirect()->route('news.index')
                         ->with('success','Xóa sản phẩm thành công');
    }
    public function search(Request $request)
{
    $q = $request->q;

    $news = News::where('title', 'like', "%$q%")->latest()->get();

    return view('news.search', compact('news', 'q'));
}
}
