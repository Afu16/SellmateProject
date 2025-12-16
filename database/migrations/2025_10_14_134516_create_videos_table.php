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
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('category', 100)->nullable();
            $table->string('title', 255);
            $table->string('slug', 255)->unique()->nullable();
            $table->text('description')->nullable();
            $table->text('link');
            // thumbnail optional (bisa manual / auto generate)
            $table->string('thumbnail')->nullable();
            // durasi video, format "MM:SS" atau "HH:MM:SS"
            $table->string('duration', 8)->default('00:00:00');
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('videos');
    }
};
