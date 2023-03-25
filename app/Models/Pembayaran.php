<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'pembayaran';

    public function Siswa(){
        return $this->belongsTo(Siswa::class,'id_siswa');
    }

    public function Admin(){
        return $this->belongsTo(User::class, 'id_admin');
    }

    public function Spp(){
        return $this->belongsTo(SPP::class,'id_spp');
    }
    protected $casts = [
        'tanggal_bayar' => 'datetime',
    ];
}
