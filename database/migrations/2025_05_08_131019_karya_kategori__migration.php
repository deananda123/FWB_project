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
        Schema::create('karya_kategori', function (Blueprint $table) {
            $table->unsignedBigInteger('karya_id');
            $table->unsignedBigInteger('kategori_id');
        
            $table->foreign('karya_id')->references('id')->on('karya')->onDelete('cascade');
            $table->foreign('kategori_id')->references('id')->on('kategori')->onDelete('cascade');

            $table->primary(['karya_id', 'kategori_id']); //tidak ada yang double
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
