<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('home_videos', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('category')->default('general')->index();
            $table->string('video_url');
            $table->string('thumbnail_path')->nullable();
            $table->text('description')->nullable();
            $table->string('duration')->nullable();
            $table->unsignedInteger('sort_order')->default(0)->index();
            $table->boolean('is_active')->default(true)->index();
            $table->json('metadata')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('home_videos');
    }
};
