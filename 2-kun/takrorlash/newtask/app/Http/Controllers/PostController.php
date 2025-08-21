<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Nette\Utils\Paginator;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }
    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|min:3',
            'body' => 'required|min:10|max:255'
        ]);

        auth()->user()->posts()->create([
            'title' => $request->title,
            'body' => $request->body,
        ]);
        return redirect()->route('posts.index')->with('success', 'Post yaratildi');
    }
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit',compact('post'));
    }
    public function update(Request $request,Post $post)
    {
        $request->validate([
            'title' => 'required|,min:3',
            'body' => 'required|min:10|max:255',
        ]);
        $post->update($request->all());
        return redirect()->route('posts.index')->with('success','Yangilandi');
    }
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('success',"O'chirildi");
    }
    public function new()
    {
        $posts = Post::where('id', '<=', '6')
            ->orderBy('created_at', 'desc')
            ->paginate(3);
        return view('posts.index',compact('posts'));
    }
    public function where()
    {
        $posts = Post::where('id', '>', '1')
        ->orderBy('created_at', 'asc')
        ->paginate(2);
        return $posts;
    }
    public function wherein()
    {
        $posts = Post::query()->whereIn('id',[2, 4, 6]);
    }
}
