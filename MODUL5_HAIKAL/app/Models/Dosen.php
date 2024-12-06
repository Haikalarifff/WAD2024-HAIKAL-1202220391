<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class dosen extends Model
{

    //Nama tabel yang terkait dengan model
    protected $table = 'dosens';

    //kolom yang dapat diisi secara massal
    protected $fillable = [
        'kode_dosen',
        'nama_dosen',
        'nip',
        'email',
        'no_telepon',

    ];

    public function mahasiswas()
    {
        return $this->hasMany(Mahasiswa::class);
    }
}