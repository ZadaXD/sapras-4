<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sapras extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_barang',
        'kode_inventaris',
        'lokasi',
        'jumlah',
        'kondisi',
    ];


    public function pengajuan()
    {
        return $this->hasMany(Pengajuan::class);
    }
}
