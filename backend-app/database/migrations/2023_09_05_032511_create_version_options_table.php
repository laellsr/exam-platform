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
        Schema::create('version_options', function (Blueprint $table) {
            $table->id();
            $table->foreignId('question_version_id')->constrained('question_versions');
            $table->string('option');
            $table->timestamps();
        });

        Schema::table('question_versions', function (Blueprint $table) {
            $table->foreignId('version_option_id')->nullable()->constrained('version_options'); // resposta
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('version_options');
    }
};
