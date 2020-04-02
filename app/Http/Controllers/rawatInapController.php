<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Perawat;
use App\Status;
use App\rawatInap;

class rawatInapController extends Controller
{
    public function index()
    {
    $rawatInap = rawatInap::with('perawat')->orderBy('created_at', 'DESC')->paginate(10);
    $rawatInap = rawatInap::with('status')->orderBy('created_at', 'DESC')->paginate(10);
        return view('rawatInap/index', compact('rawatInap'));
    }

    public function create()
    {
    $perawat = Perawat::orderBy('nama', 'ASC')->get();
    $status = Status::orderBy('nama', 'ASC')->get();
    return view('rawatInap/create', compact('perawat', 'status'));
    }

    public function store(Request $request)
    {
    //validasi data
    $this->validate($request, [
        'no_kamar' => 'required|string|max:100',
        'id_perawat' => 'required|exists:perawats,id',
        'id_status' => 'required|exists:statuses,id'
    ]);


        //Simpan data ke dalam table riwayat_Pasien
        $rawatInap = rawatInap::create([
            'no_kamar' => $request->no_kamar,
            'id_perawat' => $request->id_perawat,
            'id_status' => $request->id_status,

        ]);

        //jika berhasil direct ke riwayatPasien.index
        return redirect(route('listRawat'))
            ->with(['success' => '<strong>' . $rawatInap->nama . '</strong> Ditambahkan']);
    }

    public function edit($id)
    {
    //query select berdasarkan id
    $rawatInap = rawatInap::findOrFail($id);
    $perawat = Perawat::orderBy('nama', 'ASC')->get();
    $status = Status::orderBy('nama', 'ASC')->get();
    return view('rawatInap/edit', compact( 'rawatInap', 'perawat', 'status'));
    }

    public function update(Request $request, $id)
    {
        //validasi
        $this->validate($request, [
            'no_kamar' => 'required|string|max:100',
            'id_perawat' => 'required|exists:perawats,id',
            'id_status' => 'required|exists:statuses,id'
        ]);
            //perbaharui data di database
            $rawatInap = rawatInap::findOrFail($id);
            $rawatInap->update([
                'no_kamar' => $request->no_kamar,
                'id_perawat' => $request->id_perawat,
                'id_status' => $request->id_status,
            ]);
            return redirect(route('listRawat'))
                ->with(['success' => '<strong>' .$rawatInap->nama . '</strong> Diperbaharui']);
        }

        public function destroy($id)
        {
        $rawatInap = rawatInap::find($id);
        $rawatInap->delete();
        return redirect('/rawatInap')->with('sukses', 'data berhasil dihapus');
         }

         public function select_box(Request $id){
             $rawatInap = rawatInap::where('id_status', $id->status)->get()->pluck('no_kamar');
             return request()->json($ $rawatInap);
         }
}
