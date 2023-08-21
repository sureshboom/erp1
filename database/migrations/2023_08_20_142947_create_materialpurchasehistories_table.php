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
        Schema::create('materialpurchasehistories', function (Blueprint $table) {
            $table->id();
            $table->enum('project_type',['contract','villa']);
            $table->unsignedBigInteger('contract_project_id')->nullable();
            $table->foreign('contract_project_id')
                ->references('id')
                ->on('contract_projects')
                ->onDelete('cascade');
            $table->unsignedBigInteger('villa_project_id')->nullable();
            $table->foreign('villa_project_id')
                ->references('id')
                ->on('villa_projects')
                ->onDelete('cascade');
            $table->foreignId('materialin_id')->constrained('materialins')->cascadeOnDelete();
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
        Schema::dropIfExists('materialpurchasehistories');
    }
};
