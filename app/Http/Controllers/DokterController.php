<?php

namespace App\Http\Controllers;
use App\Dokter;
use Illuminate\Http\Request;

class DokterController extends Controller
{
    public function index(Request $request)
    {
            $dokter = Dokter::get();
        return view('dokter.index', compact('dokter'));
    }

    public function create(Request $request)
    {
        $dokter = Dokter::create($request->all());
        return redirect('/dokter')->with('sukses', 'data berhasil diinput');
    }

    public function store(Request $request)
    {
        $dokter = Dokter::store($request->all());
        return redirect('/dokter')->with('sukses', 'data berhasil diinput');
    }


    public function edit($id)
    {
        $dokter = Dokter::find($id);
        return view('dokter.edit', compact('dokter'));
    }

    public function update(Request $request, $id)
    {
        $dokter = Dokter::find($id);
        $dokter->update($request->all());
        return redirect('/dokter')->with('sukses', 'data berhasil diupdate');
    }

    public function destroy($id)
    {
        $dokter = Dokter::find($id);
        $dokter->delete($dokter);
        return redirect('/dokter')->with('sukses', 'data berhasil dihapus');
    }
}
