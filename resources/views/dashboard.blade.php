@extends('layouts.app')

@section('content')
    <h2>Dashboard</h2>

    <h3>Most Commented Posts</h3>
    <ul>
        @foreach ($mostCommentedPosts as $post)
            <li>
                <a href="/posts/{{ $post->slug }}">{{ $post->title }}</a>
                - {{ $post->comments_count }} Comments
            </li>
        @endforeach
    </ul>

    <h3>Most Liked Posts</h3>
    <ul>
        @foreach ($mostLikedPosts as $post)
            <li>
                <a href="/posts/{{ $post->slug }}">{{ $post->title }}</a>
                - {{ $post->likes_count }} Likes
            </li>
        @endforeach
    </ul>

    <h3>Most Followed Users</h3>
    <ul>
        @foreach ($mostFollowedUsers as $user)
            <li>
                <a href="/profile/{{ $user->username }}">{{ $user->name }}</a>
                - {{ $user->followers_count }} Followers
            </li>
        @endforeach
    </ul>
@endsection
