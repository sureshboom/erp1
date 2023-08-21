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
        $table->unsignedBigInteger('contract_project_id')->nullable();
        $table->foreign('contract_project_id')
            ->references('id')
            ->on('contract_projects')
            ->onDelete('cascade');
        $table->unsignedBigInteger('villa_project_id')->nullable();
        $table->foreign('villa_project_id')
            ->references('id')
            ->on('villa_projects')
            ->onDelete('cascade');
        $table->foreignId('supplier_id')->nullable()->constrained('suppliers')->onDelete('cascade');
        $table->foreignId('siteengineer_id')->constrained('siteengineers')->onDelete('cascade');
        $table->foreignId('chiefengineer_id')->constrained('chiefengineers')->onDelete('cascade');
        $table->float('amount', 8, 2);
        $table->enum('status', ['request', 'approved', 'paid', 'verified', 'received']);
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
