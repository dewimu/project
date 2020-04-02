<?php

namespace App\Http\Controllers;
use App\Pasien;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    public function index(Request $request)
    {
        $pasien = Pasien::get();
        return view('pasien/index', compact('pasien'));
    }

    public function create(Request $request)
    {
        $pasien = Pasien::create($request->all());
        return redirect('/pasien')->with('sukses', 'data berhasil diinput');
    }

    public function store(Request $request)
    {
        $file = $request->file('foto');
        $directory = 'foto';

        $pasien = new Pasien($request->all());

        if($request->hasFile('foto')) {
            $fileName = time().$file->getClientOriginalName();
            $file->move($directory, $fileName);
            $pasien->foto = $fileName;
        }

        $pasien->save();

        return redirect()->route('listPasien');
    }

    public function edit($id)
    {
        $pasien = Pasien::find($id);
        return view('pasien.edit', compact('pasien'));
    }

    public function update(Request $request, $id)
    {
        $pasien = Pasien::find($id);
        $pasien->update($request->all());
        return redirect('/pasien')->with('sukses', 'data berhasil diupdate');
    }

    public function destroy($id)
    {
        $pasien = Pasien::find($id);
        $pasien->delete($pasien);
        return redirect('/pasien')->with('sukses', 'data berhasil dihapus');
    }
}
