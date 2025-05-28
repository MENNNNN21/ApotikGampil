<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ObatModel extends Model
{
    protected $table = 'obats';

    protected $fillable = [
        'nama', 'kategori', 'stok', 'harga', 'deskripsi', 'gambar', 'expired_at'
    ];

  
}
