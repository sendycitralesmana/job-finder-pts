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
        Schema::create('interviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('job_application_id')->nullable();
            $table->foreign('job_application_id')->references('id')->onDelete('set null')->on('job_applications');
            $table->integer('score_verbal')->nullable();
            $table->integer('score_exam')->nullable();
            $table->integer('score_practice')->nullable();
            $table->float('final_score', 8, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('interviews');
    }
};
