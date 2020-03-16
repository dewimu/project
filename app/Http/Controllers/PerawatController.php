<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dokter;
use App\Perawat;

class PerawatController extends Controller
{
    public function index()
    {
    $perawat = Perawat::with('dokter')->orderBy('created_at', 'DESC')->paginate(10);
        return view('perawat/index', compact('perawat'));
    }

    public function create()
    {
    $dokter = Dokter::orderBy('nama', 'ASC')->get();
    return view('perawat/create', compact('dokter'));
    }

    public function store(Request $request)
    {
    //validasi data
    $this->validate($request, [
        'nama' => 'required|string|max:100',
        'jenis_kelamin' => 'required|string',
        'id_dokter' => 'required|exists:dokters,id',
    ]);


        //Simpan data ke dalam table products
        $perawat = Perawat::create([
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'id_dokter' => $request->id_dokter
        ]);

        //jika berhasil direct ke produk.index
        return redirect(route('listPerawat'))
            ->with(['success' => '<strong>' . $perawat->nama . '</strong> Ditambahkan']);
    }

    public function edit($id)
    {
    //query select berdasarkan id
    $perawat = Perawat::findOrFail($id);
    $dokter = Dokter::orderBy('nama', 'ASC')->get();
    return view('perawat/edit', compact('perawat', 'dokter'));
    }


    public function update(Request $request, $id)
    {

        //validasi
        $this->validate($request, [
            'nama' => 'required|string|max:100',
            'jenis_kelamin' => 'required|string|max:100',
            'id_dokter' => 'required|exists:dokters,id',
        ]);
            //perbaharui data di database
            $perawat = Perawat::findOrFail($id);
            $perawat->update([
                'nama' => $request->nama,
                'jenis_kelamin' => $request->jenis_kelamin,
                'id_dokter' => $request->id_dokter
            ]);
            return redirect(route('listPerawat'))
                ->with(['success' => '<strong>' .$perawat->nama . '</strong> Diperbaharui']);
        }

        public function destroy($id)
        {
        $perawat = Perawat::find($id);
        $perawat->delete($perawat);
        return redirect('/perawat')->with('sukses', 'data berhasil dihapus');
         }
}

