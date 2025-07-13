<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaprasTable extends Migration
{
    public function up(): void
    {
        Schema::create('sapras', function (Blueprint $table) {
            $table->id();
            $table->string('nama_barang');
            $table->string('lokasi');
            $table->integer('jumlah');
            $table->enum('kondisi', ['baik', 'dipinjam', 'diperbaiki', 'rusak']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sapras');
    }
}
