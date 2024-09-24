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
        Schema::create('question_detail', function (Blueprint $table) {
            $table->id();
            $table->foreignId('question_id')->constrained('question')->onDelete('restrict');
            $table->longText('question');
            $table->string('image')->nullable();
            $table->longText('choice_1');
            $table->string('image_choice_1')->nullable();
            $table->longText('choice_2');
            $table->string('image_choice_2')->nullable();
            $table->longText('choice_3');
            $table->string('image_choice_3')->nullable();
            $table->longText('choice_4');
            $table->string('image_choice_4')->nullable();
            $table->longText('choice_5');
            $table->string('image_choice_5')->nullable();
            $table->longText('key');
            $table->string('image_key')->nullable();
            $table->foreignId('user_id')->constrained('users')->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('question_detail');
    }
};
