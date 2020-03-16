@extends('layouts.master')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Perawat</h1>
                    </div>
                </div>
            </div>
        </div>
​
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">

                            <a href="{{('perawat/create') }}"
                                class="btn btn-primary btn-sm">
                                 Tambah
                            </a>

                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Dokter</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($perawat as $row)
                                        <tr>
                                        <td>{{$row->nama}}</td>
                                            <td>{{$row->jenis_kelamin}}</td>
                                            <td>{{$row->getDoctor($row->id_dokter)->nama}}</td>
                                            <td>
                                                @if(Auth::user()->id_role == '1')
                                                <a href="/admin/perawat/{{$row->id}}/edit" class="btn btn-success btn-sm">Edit</a>
                                                <a href="/admin/perawat/{{$row->id}}/destroy" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Yakin Akun Ini Dihapus?')">Delete</a>
                                                    @endif

                                                    @if(Auth::user()->id_role =='2')
                                                <a href="/dokter/perawat/{{$row->id}}/edit" class="btn btn-success btn-sm">Edit</a>
                                                <a href="/dokter/perawat/{{$row->id}}/destroy" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Yakin Akun Ini Dihapus?')">Delete</a>
                                                    @endif
                                                @csrf
                                                @method('DELETE')
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <div class="float-right">
                                    {!! $perawat->links() !!}
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
