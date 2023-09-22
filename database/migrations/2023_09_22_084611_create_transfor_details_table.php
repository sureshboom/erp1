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
        Schema::create('transfor_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mp_id')->constrained('materialpurchases')->cascadeOnDelete();
            $table->enum('project_type',['contract','villa']);
            $table->bigInteger('project_id')->nullable();
            $table->foreignId('meterial_id')->constrained('meterials')->cascadeOnDelete();
            $table->integer('quantity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transfor_details');
    }
};
