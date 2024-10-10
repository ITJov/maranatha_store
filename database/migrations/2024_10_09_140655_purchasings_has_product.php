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
        Schema::create('purchasings_has_product', function (Blueprint $table) {
            $table->string('purchasing_id', 10); 
            $table->foreign('purchasing_id')->references('id')->on('purchasings')->onDelete('cascade');

            $table->string('product_id', 10); 
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            
            $table->timestamps(); // Ini akan membuat kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
