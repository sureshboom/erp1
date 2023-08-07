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
        Schema::create('land_payment_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('landcustomers_id')->constrained('land_customers')->cascadeOnDelete();
            $table->string('paytype');
            $table->float('amount',10,2);
            $table->string('payway');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('land_payment_histories');
    }
};
