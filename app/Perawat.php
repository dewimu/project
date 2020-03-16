<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perawat extends Model
{
    protected $guarded = [];

    protected $fillable= ['nama', 'jenis_kelamin', 'id_dokter'];
    public function dokter()
    {
        return $this->belongsTo(Dokter::class);
    }

    public function getDoctor($id){
        $data = Dokter::where('id',$id)->first();
        return $data;
    }

}
