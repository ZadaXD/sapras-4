<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    
    public function up()
    {
        Schema::create('berita_acaras', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pengajuan_id')->constrained()->onDelete('cascade');
            $table->date('tanggal');
            $table->string('lokasi_lama');
            $table->string('lokasi_baru');
            $table->string('penanggung_jawab_lama');
            $table->string('penanggung_jawab_baru');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('berita_acaras');
    }
};
