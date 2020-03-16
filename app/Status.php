<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $fillable= ['nama'];
    public function riwayatPasien(){
        return $this->hasMany(riwayatPasien::class);
            }
}
