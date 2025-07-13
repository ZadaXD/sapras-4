<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    use HasFactory;

    protected $table = 'pengajuans';

    protected $fillable = [
        'user_id', 'sapras_id', 'alasan', 'dari', 'ke', 'jumlah', 'status', 'tanggal',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sapras()
    {
        return $this->belongsTo(Sapras::class);
    }
}
