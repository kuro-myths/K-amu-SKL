<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('education_id')->constrained('educations')->cascadeOnDelete();
            $table->tinyInteger('rating')->unsigned()->default(5); // 1-5
            $table->text('comment')->nullable();
            $table->timestamps();

            $table->unique(['user_id', 'education_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
