<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Get the most commented posts
        $mostCommentedPosts = Post::withCount('comments')
            ->orderByDesc('comments_count')
            ->limit(5)
            ->get();

        // Get the most liked posts
        $mostLikedPosts = Post::withCount('likes')
            ->orderByDesc('likes_count')
            ->limit(5)
            ->get();

        // Get the most followed users
        $mostFollowedUsers = User::withCount('followers')
            ->orderByDesc('followers_count')
            ->limit(5)
            ->get();

        // Return the data to a view
        return view('dashboard', [
            'mostCommentedPosts' => $mostCommentedPosts,
            'mostLikedPosts' => $mostLikedPosts,
            'mostFollowedUsers' => $mostFollowedUsers,
        ]);
    }
}

