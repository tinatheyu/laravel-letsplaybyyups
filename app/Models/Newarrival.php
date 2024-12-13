<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Newarrival extends Model
{
    use HasFactory;

    protected $table = 'newarrival'; // Nama tabel di database
    protected $primaryKey = 'id_newarrival'; // Primary key
    public $incrementing = true;
    protected $fillable = ['nama_barang', 'kategori', 'tanggal_barang_masuk', 'foto'];
    public $timestamps = false;
}
