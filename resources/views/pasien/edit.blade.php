@extends('layouts.master')
@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <div class="panel-body">
                                <form action="/pasien/{{$pasien->id}}/update" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input name="nama" type="text" class="form-control" id="nama" placeholder="nama"
                                            value="{{$pasien->nama}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <textarea name="alamat" id="alamat" rows="3" class="form-control"
                                            placeholder="alamat">{{$pasien->alamat}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="telepon">Telepon</label>
                                        <input name="telepon" type="text" class="form-control" id="telepon"
                                            placeholder="telepon" value="{{$pasien->telepon}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="jenis_kelamin">Jenis Kelamin</label>
                                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                            <option value="Laki-Laki" @if($pasien->jenis_kelamin == "Laki-Laki")
                                                selected @endif>Lali-Laki</option>
                                            <option value="Perempuan" @if($pasien->jenis_kelamin == "Perempuan")
                                                selected @endif>Perempuan</option>
                                        </select>
                                    </div>
                                    <img src="{{asset('foto/'.$pasien->foto)}}" height="100px" alt="">
                                    <div class="form-group">
                                        <label for="foto">Foto</label>
                                        <input type="file" id="foto" name="foto">

                                        <p class="help-block">Masukkan foto</p>
                                    </div>
                                    <button type="submit" class="btn btn-success">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop



@section('content1')
<h1>Edit Data Pasien</h1>
@if(session('sukses'))
<div class="alert alert-success" role="alert">
    {{session('sukses')}}
</div>
@endif
<div class="row">
    <div class="col-lg-12">
        <form action="/pasien/{{$pasien->id}}/update" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nama">Nama</label>
                <input name="nama" type="text" class="form-control" id="nama" placeholder="nama"
                    value="{{$pasien->nama}}">
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea name="alamat" id="alamat" rows="3" class="form-control"
                    placeholder="alamat">{{$pasien->alamat}}</textarea>
            </div>
            <div class="form-group">
                <label for="telepon">Telepon</label>
                <input name="telepon" type="text" class="form-control" id="telepon" placeholder="telepon"
                    value="{{$pasien->telepon}}">
            </div>
            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                    <option value="Laki-Laki" @if($pasien->jenis_kelamin == "Laki-Laki") selected @endif>L</option>
                    <option value="Perempuan" @if($pasien->jenis_kelamin == "Perempuan") selected @endif>P</option>
                </select>
            </div>
            <img src="{{asset('foto/'.$pasien->foto)}}" height="100px" alt="">
            <div class="form-group">
                <label for="foto">Foto</label>
                <input type="file" id="foto" name="foto">

                <p class="help-block">Masukkan foto</p>
            </div>
            <button type="submit" class="btn btn-info">Update</button>
        </form>
    </div>
</div>
@endsection
