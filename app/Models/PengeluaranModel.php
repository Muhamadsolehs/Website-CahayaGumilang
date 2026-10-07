<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengeluaranModel extends Model
{
    use HasFactory;
    protected $table = 'tb_pengeluaran';
    protected $primaryKey = 'id_pengeluaran';
    protected $fillable = ['jumlah', 'tanggal_pengeluaran','deskripsi'];
}
