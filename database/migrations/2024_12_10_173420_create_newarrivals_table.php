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
        Schema::create('newarrival', function (Blueprint $table) {
            $table->id('id_newarrival'); // Primary Key
            $table->string('foto');
            $table->string('nama_barang');
            $table->string('kategori');
            $table->date('tanggal_barang_masuk');
            $table->timestamps(); // created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('newarrival');
    }
};
