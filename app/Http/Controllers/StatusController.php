<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Status;

class StatusController extends Controller
{
    public function index(Request $request)
    {
            $status = Status::get();
        return view('status.index', compact('status'));
    }

    public function create(Request $request)
    {
        $status = Status::create($request->all());
        return redirect('/status')->with('sukses', 'data berhasil diinput');
    }

    public function store(Request $request)
    {
        $status = Status::store($request->all());
        return redirect('/status')->with('sukses', 'data berhasil diinput');
    }


    public function edit($id)
    {
        $status = Status::find($id);
        return view('status.edit', compact('status'));
    }

    public function update(Request $request, $id)
    {
        $status = Status::find($id);
        $status->update($request->all());
        return redirect('/status')->with('sukses', 'data berhasil diupdate');
    }

    public function destroy($id)
    {
        $status = Status::find($id);
        $status->delete($status);
        return redirect('/dokter')->with('sukses', 'data berhasil dihapus');
    }
}
