<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\riwayatPasien;
use App\Dokter;
Use App\Pasien;
use App\Status;
use App\rawatInap;

class riwayatPasienController extends Controller
{
    public function index()
    {
    $riwayatPasien = riwayatPasien::with('pasien')->orderBy('created_at', 'DESC')->paginate(10);
    $riwayatPasien = riwayatPasien::with('dokter')->orderBy('created_at', 'DESC')->paginate(10);
    $riwayatPasien = riwayatPasien::with('status')->orderBy('created_at', 'DESC')->paginate(10);
    $riwayatPasien = riwayatPasien::with('rawatInap')->orderBy('created_at', 'DESC')->paginate(10);
        return view('riwayatPasien/index', compact('riwayatPasien'));
    }

    public function create()
    {
    $pasien = Pasien::orderBy('nama', 'ASC')->get();
    $dokter = Dokter::orderBy('nama', 'ASC')->get();
    $status = Status::orderBy('nama', 'ASC')->get();
    $rawatInap = rawatInap::orderBy('no_kamar', 'ASC')->get();
    return view('riwayatPasien/create', compact('pasien', 'dokter', 'status', 'rawatInap'));
    }

    public function store(Request $request)
    {
    //validasi data
    $this->validate($request, [
        'id_pasien' => 'required|exists:pasiens,id',
        'id_dokter' => 'required|exists:dokters,id',
        'diagnosa_penyakit' => 'required|string|max:100',
        'id_status' => 'required|exists:statuses,id',

    ]);

        //Simpan data ke dalam table riwayat_Pasien
        if($request->id_status == 2){
            $riwayatPasien = riwayatPasien::create([
                'id_pasien' => $request->id_pasien,
                'id_dokter' => $request->id_dokter,
                'diagnosa_penyakit' => $request->diagnosa_penyakit,
                'id_status' => $request->id_status,
                'id_rawat_inap' => $request->id_rawat_inap,
            ]);
        }else{
            $riwayatPasien = riwayatPasien::create([
                'id_pasien' => $request->id_pasien,
                'id_dokter' => $request->id_dokter,
                'diagnosa_penyakit' => $request->diagnosa_penyakit,
                'id_status' => $request->id_status,
                'id_rawat_inap' => null,
            ]);
        }


        //jika berhasil direct ke riwayatPasien.index
        return redirect(route('listRiwayat'))
            ->with(['success' => '<strong>' . $riwayatPasien->nama . '</strong> Ditambahkan']);
    }

    public function edit($id)
    {
    //query select berdasarkan id
    $riwayatPasien = riwayatPasien::findOrFail($id);
    $pasien = Pasien::orderBy('nama', 'ASC')->get();
    $dokter = Dokter::orderBy('nama', 'ASC')->get();
    $status = Status::orderBy('nama', 'ASC')->get();
    $rawatInap = rawatInap::orderBy('no_kamar', 'ASC')->get();
    return view('riwayatPasien/edit', compact('riwayatPasien', 'pasien', 'dokter', 'status', 'rawatInap'));
    }

    public function update(Request $request, $id)
    {
        //validasi
        $this->validate($request, [
            'id_pasien' => 'required|exists:pasiens,id',
            'id_dokter' => 'required|exists:dokters,id',
            'diagnosa_penyakit' => 'required|string|max:100',
            'id_status' => 'required|exists:statuses,id',
            'id_rawat_inap' => 'required|exists:rawat_inaps,id',
        ]);
            //perbaharui data di database
            $riwayatPasien = riwayatPasien::findOrFail($id);
            $riwayatPasien->update([
                'id_pasien' => $request->id_pasien,
                'id_dokter' => $request->id_dokter,
                'diagnosa_penyakit' => $request->diagnosa_penyakit,
                'id_status' => $request->id_status,
                'id_rawat_inap' => $request->id_rawat_inap,
            ]);
            return redirect(route('listRiwayat'))
                ->with(['success' => '<strong>' .$riwayatPasien->nama . '</strong> Diperbaharui']);
        }

        public function destroy($id)
        {
        $riwayatPasien = riwayatPasien::find($id);
        $riwayatPasien->delete($riwayatPasien);
        return redirect('/riwayatPasien')->with('sukses', 'data berhasil dihapus');
         }


}
