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
        Schema::create('shop_carts', function (Blueprint $table) {
            $table->string('id',10)->primary();
            $table->integer('kuantiti_produk');
            $table->string('user_id',10); 
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');        
            $table->timestamp('updated_at')->useCurrent();
            $table->timestamp('created_at')->useCurrent();        
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shop_carts');
    }
};
