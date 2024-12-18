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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->foreignId('author_id')->constrained(
                table: 'users', indexName: 'posts_author_id'
            );
            $table->foreignId('category_id')->constrained(
                table: 'categories', indexName: 'post_category_id'
            );
            $table->string('slug')->unique();
            $table->text('body');
            $table->string('image_url')->nullable(); // column to store image URL
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('image_url', 'likes_count');
        });

        Schema::dropIfExists('posts');

    }
};
