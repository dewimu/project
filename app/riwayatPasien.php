<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class riwayatPasien extends Model
{

    protected $guarded = [];

    protected $fillable= ['id_pasien', 'id_dokter', 'diagnosa_penyakit', 'id_status'];

    public function dokter()
    {
        return $this->belongsTo(Dokter::class);
    }

    public function getDoctor($id){
        $data = Dokter::where('id',$id)->first();
        return $data;
    }

    public function pasien()
    {
        return $this->belongsTo(Pasien::class);
    }

    public function getPasien($id){
        $data = Pasien::where('id',$id)->first();
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
