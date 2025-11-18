<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mahasiswa extends Model
{
    use SoftDeletes;

    protected $table = 'students'; // karena bukan "mahasiswas"

    protected $fillable = [
        'nim',
        'nama',
        'email',
        'tanggal_lahir',
        'ipk',
        'jenis_kelamin',
        'jurusan',
        'alamat',
    ];

    protected $dates = ['deleted_at'];
}
