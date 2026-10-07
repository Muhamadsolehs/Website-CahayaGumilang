<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model implements AuthenticatableContract
{
    use HasFactory;
    use Authenticatable;

    protected $table = 'tb_user';
    protected $primaryKey = 'id_user';
    protected $fillable = ['username', 'password','role', 'nama_lengkap', 'nomor_telepon'];

    public function pesanan()
    {
        return $this->hasMany(PesananModel::class, 'id_pesanan', 'id_pesanan');
    }
}
