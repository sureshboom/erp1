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
        Schema::create('teleworks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('telecaller_id')->constrained('telecallers')->cascadeOnDelete();
            $table->integer('called');
            $table->integer('follow_up');
            $table->integer('site_visit');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teleworks');
    }
};
