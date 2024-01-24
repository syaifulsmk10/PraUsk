<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produk extends Model
{
    use HasFactory;
    protected $fillable =[
        'name',
        'price',
        'stok',
        'foto'
       
    ] ;


    public function transaksi(){
        return $this->hasMany(transaksi::class);
    }
}