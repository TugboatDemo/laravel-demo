<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // "sessions" is taken by Laravel's database session driver.
        Schema::create('conference_sessions', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('abstract')->nullable();
            $table->foreignId('speaker_id')->constrained('speakers');
            $table->foreignId('track_id')->constrained('tracks');
            $table->string('room');
            $table->dateTime('starts_at');
            $table->enum('level', ['beginner', 'intermediate', 'advanced']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('conference_sessions');
    }
};
