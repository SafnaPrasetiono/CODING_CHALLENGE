<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pembayaran_bonus extends Model
{
    // use HasFactory;

    protected $table = 'pembayaran_bonuses';

    // protected file table produk
    protected $fillable = [
        'buruh_a', 'buruh_b', 'buruh_c', 'pembayaran'
    ];

    public $timestamps = true;
}
