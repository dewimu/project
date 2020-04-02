@extends('layouts.master')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Rawat Inap</h1>
                </div>
            </div>
        </div>
    </div>
    ​
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <a href="{{('rawatInap/create') }}" class="btn btn-primary btn-sm">
                        Tambah
                    </a>

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No Kamar</th>
                                    <th>Nama Perawat</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rawatInap as $row)
                                <tr>
                                    <td>{{ $row->no_kamar }}</td>
                                    <td>{{$row->getPerawat($row->id_perawat)->nama}}</td>
                                    <td>{{$row->getStatus($row->id_status)->nama}}</td>
                                    <td>

                                        <a href="/rawatInap/{{$row->id}}/edit" class="btn btn-success btn-sm">Edit</a>
                                        <a href="/rawatInap/{{$row->id}}/destroy" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Yakin Akun Ini Dihapus?')">Delete</a>

                                        @csrf
                                        @method('DELETE')
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="float-right">
                            {!! $rawatInap->links() !!}
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
