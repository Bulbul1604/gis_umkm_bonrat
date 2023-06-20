<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelompokUsaha extends Model
{
    use HasFactory;
    protected $table = 'kelompok_usaha';
    protected $fillable = ['kel_usaha'];
    public function umkm()
    {
        return $this->hasOne(UMKM::class);
    }
}
