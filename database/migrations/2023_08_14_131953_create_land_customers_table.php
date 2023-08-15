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
            $table->string('aadharno');
            $table->string('pancard');
            $table->string('attachment1');
            $table->string('attachment2');
            $table->foreignId('project_id')->constrained('land_projects')->cascadeOnDelete();
            $table->string('plotno');
            $table->string('plot_area');
            $table->float('amount',10,2);
            $table->float('advance',10,2);
            $table->string('leadfrom');
            $table->string('middleman');
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
