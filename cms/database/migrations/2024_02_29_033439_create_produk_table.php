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
        Schema::create('produks', function (Blueprint $table) {

            $table->string('id')->unique();
            $table->string('nama_produk');
            $table->date('tanggal');
            $table->string('harga');
            $table->string('stock');
            $table->string('gambar')->default('no-images.jpg');
            $table->string('detail');
            $table->foreignId('id_kategori');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};
