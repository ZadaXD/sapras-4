<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengawasanSaprasTable extends Migration
{
    public function up()
    {
        Schema::create('pengawasan_sapras', function (Blueprint $table) {
            $table->id();

            // Relasi ke tabel sapras
            $table->foreignId('sapras_id')->constrained('sapras')->onDelete('cascade');

            // Relasi ke tabel users (penanggung jawab)
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

            // Tanggal pengawasan
            $table->date('tanggal');

            // Hasil pengawasan
            $table->enum('kondisi', ['baik', 'rusak']);

            // Catatan tambahan (opsional)
            $table->text('catatan')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pengawasan_sapras');
    }
}
