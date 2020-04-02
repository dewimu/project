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
                    <form action="{{route('createRawat')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">No Kamar</label>
                            <input type="text" name="no_kamar" required
                                class="form-control {{ $errors->has('no_kamar') ? 'is-invalid':'' }}">
                            <p class="text-danger">{{ $errors->first('no_kamar') }}</p>
                        </div>
                        <div class="form-group">
                            <label for="">Nama Perawat</label>
                            <select name="id_perawat" id="id_perawat" required
                                class="form-control {{ $errors->has('id_perawat') ? 'is-invalid':'' }}">
                                <option value="">Pilih</option>
                                @foreach ($perawat as $row)
                                <option value="{{ $row->id }}">{{ ucfirst($row->nama) }}</option>
                                @endforeach
                            </select>
                            <p class="text-danger">{{ $errors->first('id_perawat') }}</p>
                        </div>
                        <div class="form-group">
                            <label for="">Status</label>
                            <select name="id_status" id="id_status" required
                                class="form-control {{ $errors->has('id_status') ? 'is-invalid':'' }}">
                                <option value="">Pilih</option>
                                @foreach ($status as $row)
                                <option value="{{ $row->id }}">{{ ucfirst($row->nama) }}</option>
                                @endforeach
                            </select>
                            <p class="text-danger">{{ $errors->first('id_status') }}</p>
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
