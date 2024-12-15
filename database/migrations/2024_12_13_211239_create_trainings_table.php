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
        Schema::create('trainings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('interview_id')->nullable();
            $table->foreign('interview_id')->references('id')->onDelete('set null')->on('interviews');
            $table->integer('score_technical')->nullable();
            $table->integer('score_teamwork')->nullable();
            $table->integer('score_communication')->nullable();
            $table->integer('score_problem_solving')->nullable();
            $table->integer('score_attitude')->nullable();
            $table->integer('score_soft_skills')->nullable();
            $table->float('final_score', 8, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trainings');
    }
};
