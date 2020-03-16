<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    protected $fillable= ['nama', 'jenis_kelamin', 'spesialis'];

    public function perawat(){
        return $this->hasMany(Perawat::class);
    }
        public function riwayatPasien(){
        return $this->hasMany(riwayatPasien::class);
            }

}
