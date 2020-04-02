@extends('layouts.master')
@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Data Pasien</h3>
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
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Telepon</th>
                                    <th scope="col">Jenis Kelamin</th>
                                    <th scope="col">Foto</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pasien as $row)
                                <tr>
                                    <td>{{$row->nama}}</td>
                                    <td>{{$row->alamat}}</td>
                                    <td>{{$row->telepon}}</td>
                                    <td>{{$row->jenis_kelamin}}</td>
                                    <td>
                                        <img src="{{asset('foto/'.$row->foto)}}" alt="foto" height="100px">
                                    </td>
                                    <td>
                                        <a href="/pasien/{{$row->id}}/edit" class="btn btn-success btn-sm">Edit</a>
                                        <a href="pasien/{{$row->id}}/destroy" class="btn btn-danger btn-sm"
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
                <form action="{{route('create.pasien')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" placeholder="nama" name="nama">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea name="alamat" id="alamat" rows="3" class="form-control"
                            placeholder="alamat"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="telepon">Telepon</label>
                        <input type="text" class="form-control" id="telepon" placeholder="telepon" name="telepon">
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin">Pilih Jenis Kelmain</label>
                        <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto</label>
                        <input type="file" class="form-control" id="foto" name="foto">
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
