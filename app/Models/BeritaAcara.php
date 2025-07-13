<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeritaAcara extends Model
{
    use HasFactory;

    protected $fillable = [
        'pengajuan_id',
        'tanggal',
        'lokasi_lama',
        'lokasi_baru',
        'penanggung_jawab_lama',
        'penanggung_jawab_baru'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pengajuan()
    {
        return $this->belongsTo(Pengajuan::class);
    }
    
}
