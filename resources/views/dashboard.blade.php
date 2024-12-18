@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4 text-center">Dashboard</h2>

    <div class="row">
        <!-- Most Commented Posts -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Most Commented Posts</h5>
                </div>
                <div class="card-body">
                    @if ($mostCommentedPosts->isEmpty())
                        <p class="text-muted">No posts available.</p>
                    @else
                        <ul class="list-group list-group-flush">
                            @foreach ($mostCommentedPosts as $post)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <a href="/posts/{{ $post->slug }}" class="text-decoration-none">{{ $post->title }}</a>
                                    <span class="badge bg-primary rounded-pill">{{ $post->comments_count }} Comments</span>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>

        <!-- Most Liked Posts -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0">Most Liked Posts</h5>
                </div>
                <div class="card-body">
                    @if ($mostLikedPosts->isEmpty())
                        <p class="text-muted">No posts available.</p>
                    @else
                        <ul class="list-group list-group-flush">
                            @foreach ($mostLikedPosts as $post)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <a href="/posts/{{ $post->slug }}" class="text-decoration-none">{{ $post->title }}</a>
                                    <span class="badge bg-success rounded-pill">{{ $post->likes_count }} Likes</span>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>

        <!-- Most Followed Users -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-header bg-warning text-dark">
                    <h5 class="mb-0">Most Followed Users</h5>
                </div>
                <div class="card-body">
                    @if ($mostFollowedUsers->isEmpty())
                        <p class="text-muted">No users available.</p>
                    @else
                        <ul class="list-group list-group-flush">
                            @foreach ($mostFollowedUsers as $user)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <a href="/profile/{{ $user->username }}" class="text-decoration-none">{{ $user->name }}</a>
                                    <span class="badge bg-warning rounded-pill">{{ $user->followers_count }} Followers</span>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
