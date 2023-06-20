<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UMKM extends Model
{
    use HasFactory;
    protected $table = 'umkm';
    protected $fillable = [
        'user_id', 'nama_usaha', 'alamat', 'kelurahan_id', 'kelompok_usaha_id', 'jenis_usaha', 'location', 'keterangan'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function kelurahan()
    {
        return $this->belongsTo(Kelurahan::class);
    }
    public function kelompokUsaha()
    {
        return $this->belongsTo(KelompokUsaha::class);
    }
}
