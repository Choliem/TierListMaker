<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function updateImage(Request $request, Post $post)
    {
        $validated = $request->validate([
            'image_url' => 'required|url',
        ]);

        $post->update([
            'image' => $validated['image_url'],
        ]);

        return response()->json(['success' => true]);
    }

    public function deleteImage(Post $post)
    {
        // Remove the image
        $post->update(['image' => null]);

        return response()->json(['success' => true]);
    }

}
