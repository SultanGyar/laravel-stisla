@extends('layouts.app')

@section('title', 'Tambah Data Perbaikan')

@push('style')
<link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Data Perbaikan</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Master</a></div>
                <div class="breadcrumb-item active"><a href="{{ route('perbaikan.index') }}">Perbaikan</a></div>
                <div class="breadcrumb-item">Tambah Data Perbaikan</div>
            </div>
        </div>

        <div class="section-body">
            <form action="{{ route('perbaikan.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="id_perbaikan">ID Perbaikan</label>
                                    <input id="id_perbaikan" type="text"
                                        class="form-control @error('id_perbaikan') is-invalid @enderror"
                                        name="id_perbaikan" value="{{ $idPerbaikan }}" required readonly>
                                    @error('id_perbaikan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group" hidden>
                                    <label for="id_user">Level</label>
                                    <input id="id_user" type="text"
                                        class="form-control @error('id_user') is-invalid @enderror" name="id_user"
                                        value="{{ auth()->user()->id }}" required readonly>
                                    @error('id_user')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="tanggal">Tanggal</label>
                                    <input id="tanggal" type="date"
                                        class="form-control @error('tanggal') is-invalid @enderror" name="tanggal"
                                        value="{{ old('tanggal') }}" required readonly>
                                    @error('tanggal')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="nama_alat">Nama Alat</label>
                                    <input id="nama_alat" type="text"
                                        class="form-control @error('nama_alat') is-invalid @enderror" name="nama_alat"
                                        value="{{ old('nama_alat') }}" required readonly>
                                    @error('nama_alat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="id_alat_form">ID Alat<span
                                            class="font-weight-normal text-danger">*</label>
                                    <select id="id_alat_form"
                                        class="form-control select2 @error('id_alat_form') is-invalid @enderror"
                                        name="id_alat_form" required>
                                        <option disabled selected>Pilih ID Alat</option>
                                        @foreach($peralatan as $peralat)
                                        <option value="{{ $peralat->id }}">{{ $peralat->id_alat }}</option>
                                        @endforeach
                                    </select>
                                    @error('id_alat_form')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="nama_pelapor">Nama Pelapor<span
                                            class="font-weight-normal text-danger">*</label>
                                    <input id="nama_pelapor" type="text"
                                        class="form-control @error('nama_pelapor') is-invalid @enderror"
                                        name="nama_pelapor" value="{{ old('nama_pelapor') }}" required>
                                    @error('nama_pelapor')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="kelas">Kelas<span class="font-weight-normal text-danger">*</label>
                                    <input id="kelas" type="text"
                                        class="form-control @error('kelas') is-invalid @enderror" name="kelas"
                                        value="{{ old('kelas') }}" required>
                                    @error('kelas')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="keterangan">Keterangan<span
                                            class="font-weight-normal text-danger">*</label>
                                    <textarea id="keterangan"
                                        class="form-control @error('keterangan') is-invalid @enderror" name="keterangan"
                                        required>{{ old('keterangan') }}</textarea>
                                    @error('keterangan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
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