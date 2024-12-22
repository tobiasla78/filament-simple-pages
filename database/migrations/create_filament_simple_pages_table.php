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
        Schema::create('filament_simple_pages', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('title')->nullable();
            $table->string('image_url')->nullable()->default(null);
            $table->longText('content')->nullable();
            $table->boolean('is_public');
            $table->boolean('indexable');
            $table->boolean('register_outside_filament');
            $table->string('layout')->nullable();
            $table->string('extends')->nullable();
            $table->string('section')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('filament_simple_pages');
    }
};
