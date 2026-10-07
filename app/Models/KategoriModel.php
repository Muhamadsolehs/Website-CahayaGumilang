<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class KategoriModel extends Model

{


    protected $table = 'tb_kategori_layanan';
    protected $primaryKey = 'id_kategori';

    protected $fillable = [
        'nama_layanan',
        'deskripsi',
        'harga',
        'foto',

    ];

    public function pemesanan()
    {
        return $this->hasMany(PesananModel::class, 'id_kategori', 'id_kategori');
    }


}
