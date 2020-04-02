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

                    <form action="{{ route('updateRiwayat', $riwayatPasien->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="_method" value="POST">

                        <div class="form-group">
                            <label for="">Pasien</label>
                            <select name="id_pasien" id="id_pasien" required
                                class="form-control {{ $errors->has('id_pasien') ? 'is-invalid':'' }}">
                                <option value="">Pilih</option>
                                @foreach ($pasien as $row)
                                <option value="{{ $row->id }}">{{ ucfirst($row->nama) }}</option>
                                @endforeach
                            </select>
                            <p class="text-danger">{{ $errors->first('id_pasien') }}</p>
                        </div>
                        <div class="form-group">
                            <label for="">Dokter</label>
                            <select name="id_dokter" id="id_dokter" required
                                class="form-control {{ $errors->has('id_dokter') ? 'is-invalid':'' }}">
                                <option value="">Pilih</option>
                                @foreach ($dokter as $row)
                                <option value="{{ $row->id }}">{{ ucfirst($row->nama) }}</option>
                                @endforeach
                            </select>
                            <p class="text-danger">{{ $errors->first('id_dokter') }}</p>
                        </div>
                        <div class="form-group">
                            <label for="">Diagnosa</label>
                            <input type="text" name="diagnosa_penyakit" required
                                value="{{ $riwayatPasien->diagnosa_penyakit }}"
                                class="form-control {{ $errors->has('diagnosa_penyakit') ? 'is-invalid':'' }}">
                            <p class="text-danger">{{ $errors->first('diagnosa_penyakit') }}</p>
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
                            <label for="">Kamar</label>
                            <select name="id_rawat_inap" id="id_rawat_inap" required
                                class="form-control {{ $errors->has('id_rawat_inap') ? 'is-invalid':'' }}">
                                <option value="">Pilih</option>
                                @foreach ($rawatInap as $row)
                                <option value="{{ $row->id }}">{{ ucfirst($row->no_kamar) }}</option>
                                @endforeach
                            </select>
                            <p class="text-danger">{{ $errors->first('id_rawat_inap') }}</p>
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
