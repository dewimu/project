@extends('layouts.master')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Riwayat Pasien</h1>
                </div>
            </div>
        </div>
    </div>
    ​
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <a href="{{('riwayatPasien/create') }}" class="btn btn-primary btn-sm">
                        Tambah
                    </a>

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Pasien</th>
                                    <th>Dokter</th>
                                    <th>Diagnosa</th>
                                    <th>Status</th>
                                    <th>Kamar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($riwayatPasien as $row)
                                <tr>
                                    <td>{{$row->getPasien($row->id_pasien)->nama}}</td>
                                    <td>{{$row->getDoctor($row->id_dokter)->nama}}</td>
                                    <td>{{$row->diagnosa_penyakit}}</td>
                                    <td>{{$row->getStatus($row->id_status)->nama}}</td>
                                    <td>{{$row->getRawat($row->id_rawat_inap)->no_kamar ?? ''}}</td>
                                    <td>

                                        <a href="/riwayatPasien/{{$row->id}}/edit"
                                            class="btn btn-success btn-sm">Edit</a>
                                        <a href="/riwayatPasien/{{$row->id}}/destroy" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Yakin Akun Ini Dihapus?')">Delete</a>

                                        @csrf
                                        @method('DELETE')
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="float-right">
                            {!! $riwayatPasien->links() !!}
                        </div>
                    </div>
                    @slot('footer')
                    ​
                    @endslot

                </div>
            </div>
        </div>
    </section>
</div>
@endsection
