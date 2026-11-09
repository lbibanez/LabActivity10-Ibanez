<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $query = Post::query()
            ->with('author')
            ->where('is_published', true);

        if ($request->filled('q')) {
            $query->where('title', 'like', '%' . $request->q . '%');
        }

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        $posts = $query->orderByDesc('is_pinned')
            ->latest('published_at')
            ->paginate(6)
            ->withQueryString();

        $categories = Post::query()
            ->where('is_published', true)
            ->distinct()
            ->orderBy('category')
            ->pluck('category');

        return view('posts.index', compact('posts', 'categories'));
    }

    public function show($id)
    {
        $post = Post::with('author')->findOrFail($id);

        if (!$post->is_published) {
            abort(404);
        }

        $post->increment('views');

        return view('posts.show', compact('post'));
    }
}