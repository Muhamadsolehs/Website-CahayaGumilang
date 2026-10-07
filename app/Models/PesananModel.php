<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PesananModel extends Model
{
    protected $table = 'tb_pesanan';
    protected $primaryKey = 'id_pesanan';

    protected $dates = ['tanggal_acara'];

    protected $fillable = [
        'id_user',
        'id_kategori',
        'nama',
        'telepon',
        'alamat',
        'lokasi_acara',
        'tanggal_acara',
        'waktu_acara',
        'total_tagihan',
        'jumlah_dp',
        'status_pemesanan',
        'statusBayarDP',
        'statusBayarPelunasan',
    ];

    public function user()
    {
        return $this->belongsTo(UserModel::class, 'id_user', 'id_user');
    }

    public function kategori()
    {
        return $this->belongsTo(KategoriModel::class, 'id_kategori', 'id_kategori');
    }


}
