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
        Schema::create('materialins', function (Blueprint $table) {
            $table->id();
            $table->foreignId('site_id')->constrained('sites')->cascadeOnDelete();
            $table->foreignId('supplier_id')->constrained('suppliers')->cascadeOnDelete();
            $table->foreignId('siteengineer_id')->constrained('siteengineers')->cascadeOnDelete();
            $table->foreignId('chiefengineer_id')->constrained('chiefengineers')->cascadeOnDelete();
            $table->float('amount',8,2);
            $table->enum('status',['request','approved','paid','verified','received']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materialins');
    }
};
