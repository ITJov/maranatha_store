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
        Schema::create('purchasings_detail', function (Blueprint $table) {
            $table->string('id', 10)->primary();
            $table->date('date');
            $table->integer('total_price');
            $table->integer('status_order');
            $table->string('purchasing_id', 10);
            $table->foreign('purchasing_id')->references('id')->on('purchasings')->onDelete('cascade');
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchasings_detail'); // Hapus tabel saat rollback
    }
};
