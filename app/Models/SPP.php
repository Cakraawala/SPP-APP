<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SPP extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'spp';

    public function Pembayaran(){
        return $this->hasMany(Pembayaran::class, 'id');
    }
}
