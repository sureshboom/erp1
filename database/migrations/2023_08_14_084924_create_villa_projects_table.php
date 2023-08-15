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
        Schema::create('villa_projects', function (Blueprint $table) {
            $table->id();
            $table->string('project_name');
            $table->foreignId('chiefengineer_id')->constrained('chiefengineers')->cascadeOnDelete();
            $table->foreignId('siteengineer_id')->constrained('siteengineers')->cascadeOnDelete();
            $table->date('site_date')->nullable();
            $table->string('dtcp_no');
            $table->string('reg_no');
            $table->string('location');
            $table->string('total_land_area');
            $table->string('total_buildup_area');
            $table->string('no_of_unit');
            $table->enum('status',['ready_to_start','processing','completed'])->default('ready_to_start');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('villa_projects');
    }
};
