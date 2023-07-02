<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::where('user_id', \auth()->id())->get();
        return \view('post.index', \compact('posts'));
    }

    public function create()
    {
        return \view('post.create');
    }

    public function store(Request $request)
    {
        Gate::authorize('test');
        $validated = $request->validate([
            'title' => 'required|max:20',
            'body' => 'required|max:400',
        ]);

        $validated['user_id'] = \auth()->id();
        $post = Post::create($validated);
        return \back()->with('message', '保存しました');
    }

    public function show(Post $post)
    {
        return \view('post.show', \compact('post'));
    }
}
