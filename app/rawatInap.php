<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rawatInap extends Model
{
    protected $guarded = [];

    protected $fillable= ['no_kamar', 'id_perawat', 'id_status'];
    public function perawat()
    {
        return $this->belongsTo(Perawat::class);
    }

    public function getPerawat($id){
        $data = Perawat::where('id',$id)->first();
        return $data;
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function getStatus($id){
        $data = Status::where('id',$id)->first();
        return $data;
    }
}
