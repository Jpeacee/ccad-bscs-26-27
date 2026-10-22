<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('book_genre', function (Blueprint $table) {
            $table->unique(['book_id', 'genre_id']);
        });
    }

    public function down(): void
    {
        Schema::table('book_genre', function (Blueprint $table) {
            $table->dropUnique(['book_id', 'genre_id']);
        });
    }
};
