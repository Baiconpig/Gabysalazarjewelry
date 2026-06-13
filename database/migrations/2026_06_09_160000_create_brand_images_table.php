<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('brand_images', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('category')->default('general')->index();
            $table->string('image_path');
            $table->string('alt_text')->nullable();
            $table->string('source')->nullable();
            $table->unsignedInteger('sort_order')->default(0)->index();
            $table->boolean('is_active')->default(true)->index();
            $table->json('metadata')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('brand_images');
    }
};
