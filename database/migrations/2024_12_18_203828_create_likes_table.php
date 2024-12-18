<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('likes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_id')->constrained('posts')->onDelete('cascade'); // Foreign key to posts
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Foreign key to users (who liked the post)
            $table->timestamps();

            $table->unique(['post_id', 'user_id']); // Ensuring each user can like a post only once
        });

        // Optional: You can also add a counter to posts and users to track total likes.
        Schema::table('posts', function (Blueprint $table) {
            $table->unsignedBigInteger('likes_count')->default(0);
        });

        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('likes_received')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        Schema::dropIfExists('likes');

    }

};
