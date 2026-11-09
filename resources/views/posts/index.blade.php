@extends('layouts.app')

@section('content')
<div class="mb-6 bg-white p-4 rounded shadow">
    <form method="GET" action="{{ route('posts.index') }}" class="flex flex-col sm:flex-row gap-2">
        <input 
            type="text" 
            name="q" 
            value="{{ request('q') }}" 
            placeholder="Search title..." 
            class="border p-2 rounded flex-1"
        >
        <select name="category" class="border p-2 rounded">
            <option value="">All Categories</option>
            @foreach ($categories as $c)
                <option value="{{ $c }}" {{ request('category') == $c ? 'selected' : '' }}>
                    {{ $c }}
                </option>
            @endforeach
        </select>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Filter</button>
    </form>
</div>

<div class="space-y-4 mb-6">
    @forelse ($posts as $post)
        <div class="bg-white p-4 rounded shadow border-l-4 {{ $post->is_pinned ? 'border-amber-500' : 'border-blue-500' }}">
            <div class="flex items-center gap-2 mb-1">
                @if ($post->is_pinned)
                    <span class="bg-amber-100 text-amber-800 text-xs px-2 py-0.5 rounded font-bold">Pinned</span>
                @endif
                <span class="bg-gray-200 text-gray-700 text-xs px-2 py-0.5 rounded">{{ $post->category }}</span>
                <span class="text-xs text-gray-500">{{ $post->published_at ? $post->published_at->format('M d, Y') : '' }}</span>
            </div>

            <h2 class="text-lg font-bold">
                <a href="{{ route('posts.show', $post->id) }}" class="hover:underline text-blue-900">
                    {{ $post->title }}
                </a>
            </h2>

            <p class="text-sm text-gray-600 mt-1">{{ Str::limit($post->body, 120) }}</p>

            <div class="mt-2 text-xs text-gray-500 flex justify-between">
                <span>By: {{ $post->author->name ?? 'Author #' . $post->author_id }} ({{ $post->author->position ?? 'Staff' }})</span>
                <span>Views: {{ $post->views }}</span>
            </div>
        </div>
    @empty
        <div class="bg-white p-4 rounded shadow text-center text-gray-500">
            <p>No posts match your search.</p>
        </div>
    @endforelse
</div>

<div class="mt-4">
    {{ $posts->links() }}
</div>
<p class="text-xs text-gray-500 mt-2">
    Showing {{ $posts->firstItem() ?? 0 }}-{{ $posts->lastItem() ?? 0 }} of {{ $posts->total() }} posts
</p>
@endsection