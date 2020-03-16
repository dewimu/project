@extends('layouts.master')​
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Tambah Data</h1>
                    </div>
                </div>
            </div>
        </div>
​
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                            <form action="{{route('createPerawat')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="">Nama</label>
                                    <input type="text" name="nama" required
                                        class="form-control {{ $errors->has('nama') ? 'is-invalid':'' }}">
                                    <p class="text-danger">{{ $errors->first('nama') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="jenis_kelamin">Pilih Jenis Kelmain</label>
                                    <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                                        <option value="Laki-Laki">Laki-Laki</option>
                                        <option value="Perempuan">Perempuan</option>
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
                                    <button class="btn btn-primary btn-sm">
                                        Simpan
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
