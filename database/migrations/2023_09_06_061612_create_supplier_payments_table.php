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
        Schema::create('supplier_payments', function (Blueprint $table) {
            $table->id();
            $table->enum('project_type',['contract','villa']);
            $table->unsignedBigInteger('contractproject_id')->nullable();
            $table->foreign('contractproject_id')
                ->references('id')
                ->on('contract_projects')
                ->nullable();
            $table->unsignedBigInteger('villaproject_id')->nullable();
            $table->foreign('villaproject_id')
                ->references('id')
                ->on('villa_projects')
                ->nullable();
            $table->unsignedBigInteger('villa_id')->nullable();
            $table->foreign('villa_id')
                ->references('id')
                ->on('villas')
                ->nullable();
            $table->foreignId('supplier_id')->constrained('labour_suppliers')->cascadeOnDelete();
            $table->double('total',10,2);
            $table->double('paid',10,2)->default(0.00);
            $table->double('pending',10,2)->default(0.00);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supplier_payments');
    }
};
