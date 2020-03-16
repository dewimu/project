@extends('layouts.master')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Edit Data</h1>
                    </div>
                </div>
            </div>
        </div>
​
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">

                            <form action="{{ route('updatePerawat', $perawat->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="_method" value="POST">

                                <div class="form-group">
                                    <label for="">Nama</label>
                                    <input type="text" name="nama" required
                                        value="{{ $perawat->nama }}"
                                        class="form-control {{ $errors->has('nama') ? 'is-invalid':'' }}">
                                    <p class="text-danger">{{ $errors->first('nama') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                        <option value="Laki-Laki" @if($perawat->jenis_kelamin == "Laki-Laki") selected @endif>Laki-Laki</option>
                                        <option value="Perempuan" @if($perawat->jenis_kelamin == "Perempuan") selected @endif>Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Dokter</label>
                                    <select name="id_dokter" id="id_dokter"
                                        required class="form-control {{ $errors->has('id_dokter') ? 'is-invalid':'' }}">
                                        <option value="">Pilih</option>
                                        @foreach ($dokter as $row)
                                            <option value="{{ $row->id }}">{{ ucfirst($row->nama) }}</option>
                                        @endforeach
                                    </select>
                                    <p class="text-danger">{{ $errors->first('id_dokter') }}</p>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-info btn-sm">
                                        <i class="fa fa-refresh"></i> Update
                                    </button>
                                </div>
                            </form>
                            @slot('footer')
​
                            @endslot
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
