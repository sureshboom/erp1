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
        Schema::create('chiefengineers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->string('user_code')->nullable();
            $table->string('photo');
            $table->string('phone')->nullable();
            $table->string('alternate_no')->nullable();
            $table->string('location')->nullable();
            $table->float('salary', 8, 2);
            $table->string('attachment')->nullable();
            $table->string('vpassword');
            $table->date('joined_date')->nullable();
            $table->enum('status', ['Active', 'Inactive'])->default('Active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chiefengineers');
    }
};
