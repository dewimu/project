@extends('layouts.master')
@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Status</h3>
                            <div class="right">

                                <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal"><i
                                        class="lnr lnr-plus-circle"></button>
                            </div>
                        </div>

                        <table class="table table-hover">
                            <thead>
                                <td><button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#modaldokter">Tambah Data</button> </td>
                                <tr>
                                    <th scope="col">Nama</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($status as $row)
                                <tr>
                                    <td>{{$row->nama}}</td>
                                    <td>
                                        <a href="/status/{{$row->id}}/edit" class="btn btn-success btn-sm">Edit</a>
                                        <a href="/status/{{$row->id}}/destroy" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Yakin Akun Ini Dihapus???')">Delete</a>
                                        @csrf
                                        @method('DELETE')
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modaldokter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/status/create" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" placeholder="nama" name="nama">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
    @stop



    @section('content1')
    @if(session('sukses'))
    <div class="alert alert-success" role="alert">
        {{session('sukses')}}
    </div>
    @endif
    <div class="row">
        <div class="col-lg-12">
            <h1>Status</h1>
        </div>
        <div class="col-lg-12">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
                Tambah Data Status
            </button>
        </div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Nama</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($status as $row)
                <tr>
                    <td>{{$row->nama}}</td>
                    <td>
                        <a href="/status/{{$row->id}}/edit" class="btn btn-success btn-sm">Edit</a>
                        <a href="/status/{{$row->id}}/destroy" class="btn btn-danger btn-sm"
                            onclick="return confirm('Yakin Akun Ini Dihapus?')">Delete</a>
                        @csrf
                        @method('DELETE')
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
            <div class="modal-body">
                <form action="/status/create" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" placeholder="nama" name="nama">
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
    @endsection
