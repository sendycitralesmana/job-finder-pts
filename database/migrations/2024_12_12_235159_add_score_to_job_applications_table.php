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
        Schema::table('job_applications', function (Blueprint $table) {
            $table->string('application_letter')->nullable();
            $table->integer('score_education')->nullable();
            $table->integer('score_experience')->nullable();
            $table->integer('score_skill')->nullable();
            $table->float('final_score', 8, 2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('job_applications', function (Blueprint $table) {
            $table->dropColumn('application_letter');
            $table->dropColumn('score_education');
            $table->dropColumn('score_experience');
            $table->dropColumn('score_skill');
            $table->dropColumn('final_score');
        });
    }
};
