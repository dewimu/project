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
                                <form action="/dokter/{{$dokter->id}}/update" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input name="nama" type="text" class="form-control" id="nama" placeholder="nama"
                                            value="{{$dokter->nama}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="jenis_kelamin">Jenis Kelamin</label>
                                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                            <option value="Laki-Laki" @if($dokter->jenis_kelamin == "Laki-Laki") selected @endif>Lali-Laki</option>
                                            <option value="Perempuan" @if($dokter->jenis_kelamin == "Perempuan") selected @endif>Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="spesialis">Spesialis</label>
                                        <select name="spesialis" id="spesialis" class="form-control">
                                            <option value="Anak" @if($dokter->spesialis == "Anak") selected @endif>Anak</option>
                                            <option value="Mata" @if($dokter->spesialis == "Mata") selected @endif>Mata</option>
                                            <option value="THT" @if($dokter->spesialis == "THT") selected @endif>THT</option>
                                            <option value="Umum" @if($dokter->spesialis == "Umum") selected @endif>Umum</option>
                                            <option value="Gigi" @if($dokter->spesialis == "Gigi") selected @endif>Gigi</option>
                                            <option value="Dalam" @if($dokter->spesialis == "Dalam") selected @endif>Dalam</option>
                                        </select>
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
<h1>Edit Data Dokter</h1>
@if(session('sukses'))
<div class="alert alert-success" role="alert">
    {{session('sukses')}}
</div>
@endif
<div class="row">
    <div class="col-lg-12">
        <form action="/dokter/{{$dokter->id}}/update" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nama">Nama</label>
                <input name="nama" type="text" class="form-control" id="nama" placeholder="nama"
                    value="{{$dokter->nama}}">
            </div>
            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                    <option value="Laki-Laki" @if($dokter->jenis_kelamin == "Laki-Laki") selected @endif>Lali-Laki</option>
                    <option value="Perempuan" @if($dokter->jenis_kelamin == "Perempuan") selected @endif>Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="spesialis">Spesialis</label>
                <select name="spesialis" id="spesialis" class="form-control">
                    <option value="Anak" @if($dokter->spesialis == "Anak") selected @endif>Anak</option>
                    <option value="Mata" @if($dokter->spesialis == "Mata") selected @endif>Perempuan</option>
                    <option value="THT" @if($dokter->spesialis == "THT") selected @endif>THT</option>
                    <option value="Umum" @if($dokter->spesialis == "Umum") selected @endif>Umum</option>
                    <option value="Gigi" @if($dokter->spesialis == "Gigi") selected @endif>Gigi</option>
                    <option value="Dalam" @if($dokter->spesialis == "Dalam") selected @endif>Dalam</option>
                </select>
            </div>
                <button type="submit" class="btn btn-info">Update</button>
        </form>
    </div>
</div>
@endsection
