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
        Schema::create('tag_news', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tag_id')->constrained(
                'tags'
            )->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('new_id')->constrained(
                'news'
            )->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tag_news');
    }
};
