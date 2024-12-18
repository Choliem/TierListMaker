
{{-- If Halaman User --}}

{{-- If Halaman User --}}
@if(auth()->user() && !auth()->user()->is_admin)
    @extends('components.layout')
@else
    {{-- If Halaman Admin --}}
    @extends('components.admin-layout')
@endif

@section('content')
    <x-slot:title>{{ $title ?? 'Post Details' }}</x-slot:title>

    <article class="py-8 max-w-screen-md">
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



{{-- If Halaman Admin --}}
