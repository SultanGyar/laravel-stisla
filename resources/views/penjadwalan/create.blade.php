@extends('layouts.app')

@section('title', 'Tambah Penjadwalan')

@push('style')
<link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Penjadwalan</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item active"><a href="{{ route('penjadwalan.index') }}">Penjadwalan</a></div>
                <div class="breadcrumb-item">Tambah Penjadwalan</div>
            </div>
        </div>

        <div class="section-body">
            <form action="{{ route('penjadwalan.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="id_penjadwalan">ID Penjadwalan</label>
                                    <input id="id_penjadwalan" type="text"
                                        class="form-control @error('id_penjadwalan') is-invalid @enderror"
                                        name="id_penjadwalan" value="{{ $idPenjadwalan }}" required readonly>

                                    @error('id_penjadwalan')
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
                                        readonly placeholder="Masukan nama alat" value="{{ old('nama_alat') }}"
                                        required>

                                    @error('nama_alat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="kategori_alat">Kategori Alat</label>
                                    <input id="kategori_alat" type="text"
                                        class="form-control @error('kategori_alat') is-invalid @enderror"
                                        name="kategori_alat" readonly placeholder="Masukan kategori alat"
                                        value="{{ old('kategori_alat') }}" required>

                                    @error('kategori_alat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="id_nama_alat">ID Alat</label>
                                    <select id="id_nama_alat"
                                        class="form-control select2 @error('id_nama_alat') is-invalid @enderror"
                                        name="id_nama_alat" required>
                                        <option disabled selected>Masukan ID Alat</option>
                                        @foreach($peralatan as $peralat)
                                        <option value="{{ $peralat->id }}">{{ $peralat->id_alat }}</option>
                                        @endforeach
                                    </select>

                                    @error('id_nama_alat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="id_point_check">Point Check</label>
                                    <select id="id_point_check"
                                        class="form-control select2 @error('id_point_check') is-invalid @enderror"
                                        aria-placeholder="Masukan Point Pengecekan" name="id_point_check" required>
                                        <option disabled selected>Masukan Point Pengecekan</option>
                                        @foreach($pointCheck as $point)
                                        <option value="{{ $point->id }}">{{ $point->nama_point_check }}</option>
                                        @endforeach
                                    </select>

                                    @error('id_point_check')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="ruangan">Ruangan</label>
                                    <input id="ruangan" type="text"
                                        class="form-control @error('ruangan') is-invalid @enderror" name="ruangan"
                                        placeholder="Opsional" value="{{ old('ruangan') }}" required>

                                    @error('ruangan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="tanggal_jadwal">Tanggal Rencana Perbaikan</label>
                                    <input id="tanggal_jadwal" type="date"
                                        class="form-control @error('tanggal_jadwal') is-invalid @enderror"
                                        name="tanggal_jadwal" value="{{ old('tanggal_jadwal') }}" required>

                                    @error('tanggal_jadwal')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="{{ route('penjadwalan.index') }}" class="btn btn-danger"> Batal</a>
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
        $('#id_nama_alat').on('change', function() {
            var id_nama_alat = $(this).val();
            var peralatan = @json($peralatan); // Mengonversi data peralatan menjadi objek JavaScript

            // Cari objek peralatan yang sesuai dengan id_nama_alat yang dipilih
            var selectedPeralatan = peralatan.find(function(alat) {
                return alat.id == id_nama_alat;
            });

            // Set nilai nama_alat dan kategori_alat sesuai dengan objek peralatan yang ditemukan
            $('#nama_alat').val(selectedPeralatan ? selectedPeralatan.nama_alat : '');
            $('#kategori_alat').val(selectedPeralatan ? selectedPeralatan.id_kategori_alat : '');
        });
    });


</script>
@endpush