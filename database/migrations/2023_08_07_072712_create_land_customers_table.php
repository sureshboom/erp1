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
        Schema::create('land_customers', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name');
            $table->string('phone');
            $table->string('location');
            $table->string('sitename');
            $table->string('plotno');
            $table->float('amount',10,2);
            $table->float('advance',10,2);
            $table->float('paid',10,2);
            $table->float('pending',10,2);
            $table->string('bookingby');
            $table->enum('status',['pending','completed']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('land_customers');
    }
};
