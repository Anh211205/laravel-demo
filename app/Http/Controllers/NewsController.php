<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
class NewsController extends Controller
{
    
    public function index()
    {
        $news = News::latest()->paginate(10); 
    return view('news.index', compact('news'));
    }

    public function create()
    {
        return view('news.create');
    }

    public function store(Request $request)
    {
        News::create($request->all());
        return redirect()->route('news.index');
    }

    public function show(string $id)
    {
        echo "show method called";
    }

    public function edit(string $id)
    {
        $news=News::findOrFail($id);
        return view('news.edit', compact('news'));
    }

    public function update(Request $request, string $id)
    {
        $news=News::findOrFail($id);
        $news->update($request->all());
        return redirect()->route('news.index');
    }

    public function destroy(string $id)
    {
    $news=News::findOrFail($id);
    $news->delete();
    return redirect()->route('news.index');
    }
}
