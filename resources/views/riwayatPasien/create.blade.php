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
                    <form action="{{route('createRiwayat')}}" method="post" enctype="multipart/form-data">
                        @csrf
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
                            <label for="id-rawat_inap">Kamar</label>
                            <select name="id_rawat_inap" id="id_rawat_inap"
                                class="form-control {{ $errors->has('id_rawat_inap') ? 'is-invalid':'' }}">
                                <option value="">Pilih</option>
                                @foreach ($rawatInap as $row)
                                <option value="{{ $row->id }}">{{ ucfirst($row->no_kamar) }}</option>
                                @endforeach
                            </select>
                            <p class="text-danger">{{ $errors->first('id_rawat_inap') }}</p>
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

@section('script')
<script>
    $(document).ready(function () {
        $('#id_status').change(function () {
            var close = $(this).closest('form');
            var status = $(this).val();
            var _token = $(this).closest('form').find('[name="_token"]').val();

            //alert(_token);
            if (status == '2') {
                $('#id_rawat_inap').closest('.form-group').show();
                $.ajax({
                    method: 'GET',
                    url: "{{ route('select_kamar') }}?status=" + status,
                    success: function (result) {
                        console.log(result);
                        if (result) {
                            $('#id_rawat_inap').empty();
                            $('#id_rawat_inap').append('<option>==pilih==</option>');
                            $.each(result, function (key, value) {
                                $('#id_rawat_inap').append('<option value="' +
                                    value + '">' + value + '</option>');
                            });

                        }
                    }
                })
            } else if (status == '1') {
                $('#id_rawat_inap').closest('.form-group').hide();
            }
        })
    })

</script>
@endsection
