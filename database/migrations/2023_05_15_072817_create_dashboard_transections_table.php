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
        Schema::create('dashboard_transections', function (Blueprint $table) {
            $table->id();
            $table->integer('dashboard_id');
            $table->integer('data_type_id');
            $table->decimal('data_value',12,2);
            $table->smallinteger('data_year');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dashboard_transections');
    }
}; 
