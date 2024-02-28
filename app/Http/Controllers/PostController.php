<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return Inertia::render('PostsIndex', ['posts' => $posts]);
    }

    public function create()
    {
        return Inertia::render('PostCreate');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);

        Post::create([
            'title' => $request->title,
            // Add other fields as needed
        ]);

        return redirect()->route('posts.index');
    }

    public function edit(Post $post)
    {
        return Inertia::render('PostEdit', ['post' => $post]);
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $post->update([
            'title' => $request->title,
            // Add other fields as needed
        ]);

        return redirect()->route('posts.index');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index');
    }
}
