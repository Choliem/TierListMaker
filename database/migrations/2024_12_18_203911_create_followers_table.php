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
        Schema::create('followers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Foreign key to the user being followed
            $table->foreignId('follower_id')->constrained('users')->onDelete('cascade'); // Foreign key to the user who is following
            $table->timestamps();

            $table->unique(['user_id', 'follower_id']); // Prevent duplicate follow relationships
        });

        // Optional: Add counters to the users table to track followers and followings
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('followers_count')->default(0); // Number of followers a user has
            $table->unsignedBigInteger('following_count')->default(0); // Number of users a user is following
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('followers');

    }

};
