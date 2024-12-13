<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products'; // Pastikan nama tabel sesuai
    protected $primaryKey = 'id_produk'; // Pastikan primary key sesuai
    public $incrementing = true;
    protected $fillable = ['nama_barang', 'kategori', 'keterangan', 'foto', 'harga'];
    public $timestamps = false;
}

