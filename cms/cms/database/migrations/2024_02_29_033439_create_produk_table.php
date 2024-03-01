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
<<<<<<< HEAD:cms/database/migrations/2024_02_29_033439_create_produk_table.php

            $table->string('id')->unique();
=======
            $table->id();
            $table->string('kode')->unique();
>>>>>>> 21b333dc133547b2e04d2c931ee78ca84fc38a37:cms/cms/database/migrations/2024_02_29_033439_create_produk_table.php
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
