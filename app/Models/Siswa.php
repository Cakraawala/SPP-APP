<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'Siswa';
    public function User(){
        return $this->belongsTo(User::class, 'id_user');
    }

    public function Kelas(){
        return $this->belongsTo(Kelas::class,'id_kelas');
    }
}
