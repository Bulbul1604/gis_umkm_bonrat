<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    use HasFactory;
    protected $table = 'kelurahan';
    protected $fillable = ['name_kel'];
    public function umkm()
    {
        return $this->hasOne(UMKM::class);
    }
}
