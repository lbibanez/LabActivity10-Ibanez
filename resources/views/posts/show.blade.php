@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded shadow">
    <a href="{{ route('posts.index') }}" class="text-sm text-blue-600 hover:underline mb-4 inline-block">&larr; Back to posts</a>

    <div class="flex items-center gap-2 mb-2">
        @if ($post->is_pinned)
            <span class="bg-amber-100 text-amber-800 text-xs px-2 py-0.5 rounded font-bold">Pinned</span>
        @endif
        <span class="bg-gray-200 text-gray-700 text-xs px-2 py-0.5 rounded">{{ $post->category }}</span>
        <span class="text-xs text-gray-500">{{ $post->published_at ? $post->published_at->format('M d, Y') : '' }}</span>
    </div>

    <h1 class="text-2xl font-bold text-gray-900 mb-2">{{ $post->title }}</h1>
    <p class="text-xs text-gray-500 mb-4">
        By {{ $post->author->name ?? 'Author #' . $post->author_id }} ({{ $post->author->position ?? 'Staff' }}) | Views: {{ $post->views }}
    </p>

    <div class="text-gray-700 leading-relaxed whitespace-pre-line">
        {{ $post->body }}
    </div>
</div>
@endsection