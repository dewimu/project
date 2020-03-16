<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    protected $fillable= ['nama', 'alamat', 'telepon', 'jenis_kelamin', 'foto'];

    public function riwayatPasien(){
        return $this->hasMany(riwayatPasien::class);
            }
}
