@extends('layouts.app')

@section('title', 'Edit Data Perbaikan')

@push('style')
<link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Data Perbaikan</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Master</a></div>
                <div class="breadcrumb-item active"><a href="{{ route('perbaikan.index') }}">Perbaikan</a></div>
                <div class="breadcrumb-item">Edit Data Perbaikan</div>
            </div>
        </div>

        <div class="section-body">
            <form action="{{ route('perbaikan.update', $perbaikan->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="id_perbaikan">ID Perbaikan</label>
                                    <input id="id_perbaikan" type="text" class="form-control" name="id_perbaikan"
                                        value="{{ $perbaikan->id_perbaikan ?? old('id_perbaikan') }}" required readonly>
                                </div>

                                <div class="form-group">
                                    <label for="id_user">Level</label>
                                    <input id="id_user" type="text" class="form-control" name="id_user"
                                        value="{{ $perbaikan->id_user }}" required readonly>
                                </div>

                                <div class="form-group">
                                    <label for="tanggal">Tanggal</label>
                                    <input id="tanggal" type="date" class="form-control" name="tanggal"
                                        value="{{ $perbaikan->tanggal ?? old('tanggal') }}" required readonly>
                                </div>

                                <div class="form-group">
                                    <label for="nama_alat">Nama Alat</label>
                                    <input id="nama_alat" type="text" class="form-control" name="nama_alat"
                                        value="{{ $perbaikan->nama_alat ?? old('nama_alat') }}" required readonly>
                                </div>

                                <div class="form-group">
                                    <label for="id_alat_form">ID Alat<span
                                            class="font-weight-normal text-danger">*</label>
                                    <select id="id_alat_form" class="form-control select2" name="id_alat_form" required>
                                        <option disabled selected>Pilih ID Alat</option>
                                        @foreach($peralatan as $peralat)
                                        <option value="{{ $peralat->id }}" {{ $peralat->id == $perbaikan->id_alat_form ?
                                            'selected' : '' }}>{{ $peralat->id_alat }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="nama_pelapor">Nama Pelapor<span
                                            class="font-weight-normal text-danger">*</label>
                                    <input id="nama_pelapor" type="text" class="form-control" name="nama_pelapor"
                                        value="{{ $perbaikan->nama_pelapor ?? old('nama_pelapor') }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="kelas">Kelas<span class="font-weight-normal text-danger">*</label>
                                    <input id="kelas" type="text" class="form-control" name="kelas"
                                        value="{{ $perbaikan->kelas ?? old('kelas') }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="keterangan">Keterangan<span
                                            class="font-weight-normal text-danger">*</label>
                                    <textarea id="keterangan" class="form-control" name="keterangan"
                                        required>{{ $perbaikan->keterangan ?? old('keterangan') }}</textarea>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{ route('perbaikan.index') }}" class="btn btn-danger"> Batal</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>

@endsection

@push('scripts')
<script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
<script>
    var today = new Date().toISOString().slice(0, 10);
    document.getElementById("tanggal").value = today;

    $(document).ready(function() {
        // Inisialisasi select2 pada elemen <select> dengan class "select2"
        $('.select2').select2();

        // Menambahkan event listener untuk menangani perubahan pada elemen <select>
        $('#id_alat_form').on('change', function() {
            var id_alat_form = $(this).val();
            var peralatan = @json($peralatan); // Mengonversi data peralatan menjadi objek JavaScript

            // Cari objek peralatan yang sesuai dengan id_alat_form yang dipilih
            var selectedPeralatan = peralatan.find(function(peralat) {
                return peralat.id == id_alat_form;
            });

            // Set nilai nama_alat sesuai dengan objek peralatan yang ditemukan
            $('#nama_alat').val(selectedPeralatan ? selectedPeralatan.nama_alat : '');
        });
    });
</script>

@endpush