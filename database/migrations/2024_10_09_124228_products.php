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
        Schema::create('products', function (Blueprint $table) {
            $table->string('id',10)->primary();
            $table->string('name',255);
            $table->string('description',255);
            $table->integer('price');
            $table->integer('kuantiti');
            $table->string('kategori',255);
            $table->string('file_photo',255);
            $table->timestamp('updated_at')->useCurrent();
            $table->timestamp('created_at')->useCurrent();     
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
