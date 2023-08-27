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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->enum('payment_type',['project','material','expense']);
            $table->enum('payment_subtype',['villa','contract','land','project','office']);
            $table->bigInteger('project_id')->nullable();
            $table->bigInteger('customer_id')->nullable();
            $table->bigInteger('supplier_id')->nullable();
            $table->string('payment_mode');
            $table->string('payment_by');
            $table->double('total',10,2)->nullable();
            $table->double('paid',10,2)->default(0.00);
            $table->double('pending',10,2)->nullable();
            $table->double('amount',10,2)->nullable();
            $table->string('approved_by')->nullable();
            $table->string('received_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
