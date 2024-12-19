@extends('components.layout')

@section('content')
    <x-slot:title>{{ $title ?? 'Post Details' }}</x-slot:title>

    <article class="py-8 max-w-screen-md">
        @if ($post['image'])
            <img src="{{ $post['image'] }}" alt="{{ $post['title'] }}" class="mb-4 w-full rounded shadow-md">
        @endif
        <h2 class="mb-1 text-3xl tracking-tight font-bold text-gray-900">{{ $post['title'] }}</h2>
        <div>
            By
            <a href="/authors/{{ $post->author->username }}"
                class="hover:underline text-base text-gray-500">{{ $post->author->name }}</a>
            in
            <a href="/categories/{{ $post->category->slug }}"
                class="hover:underline text-base text-gray-500">{{ $post->category->name }}</a> |
            {{ $post->created_at->diffForHumans() }}
        </div>
        <p class="my-4 font-light">{{ $post['body'] }}</p>
        <a href="/posts" class="font-medium text-blue-500 hover:underline">Back To Posts &laquo;</a>
    </article>
@endsection
