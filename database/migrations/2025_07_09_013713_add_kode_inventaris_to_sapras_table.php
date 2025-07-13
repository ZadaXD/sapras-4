<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::table('sapras', function (Blueprint $table) {
            $table->string('kode_inventaris')->nullable()->after('nama_barang');
        });
    }

    public function down()
    {
        Schema::table('sapras', function (Blueprint $table) {
            $table->dropColumn('kode_inventaris');
        });
    }
};
