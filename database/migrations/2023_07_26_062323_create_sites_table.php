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
        Schema::create('sites', function (Blueprint $table) {
            $table->id();
            $table->string('sitename');
            $table->string('siteid');
            $table->string('sitetype');
            $table->foreignId('owner_id')->constrained('owners')->cascadeOnDelete();
            $table->foreignId('chiefengineer_id')->constrained('chiefengineers')->cascadeOnDelete();
            $table->foreignId('siteengineer_id')->constrained('siteengineers')->cascadeOnDelete();
            $table->float('amount', 8, 2)->default(0.00);
            $table->float('paid', 8, 2)->default(0.00);
            $table->float('pending', 8, 2)->default(0.00);
            $table->string('location');
            $table->date('site_date')->nullable();
            $table->enum('status',['ready_to_start','processing','completed'])->default('ready_to_start');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sites');
    }
};
