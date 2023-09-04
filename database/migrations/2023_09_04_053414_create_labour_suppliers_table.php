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
        Schema::create('labour_suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->string('address');
            $table->string('pancard');
            $table->string('aadharno');
            $table->string('gstno');
            $table->string('attachment1');
            $table->string('attachment2');
            $table->double('total',10,2)->default(0.00);
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
        Schema::dropIfExists('labour_suppliers');
    }
};
