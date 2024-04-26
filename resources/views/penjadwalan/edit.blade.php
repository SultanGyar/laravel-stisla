@extends('layouts.app')

@section('title', 'Edit Penjadwalan')

@push('style')
<link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Penjadwalan</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item active"><a href="{{ route('penjadwalan.index') }}">Penjadwalan</a></div>
                <div class="breadcrumb-item">Edit Penjadwalan</div>
            </div>
        </div>

        <div class="section-body">
            <form action="{{ route('penjadwalan.update', $penjadwalan->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="id_penjadwalan">ID Penjadwalan</label>
                                    <input id="id_penjadwalan" type="text" class="form-control" name="id_penjadwalan"
                                        value="{{ $penjadwalan->id_penjadwalan ?? old('id_penjadwalan') }}" required
                                        readonly>
                                </div>

                                <div class="form-group">
                                    <label for="tanggal">Tanggal</label>
                                    <input id="tanggal" type="date" class="form-control" name="tanggal"
                                        value="{{ $penjadwalan->tanggal ?? old('tanggal') }}" required readonly>
                                </div>

                                <div class="form-group">
                                    <label for="nama_alat">Nama Alat</label>
                                    <input id="nama_alat" type="text" class="form-control" name="nama_alat"
                                        value="{{ $penjadwalan->nama_alat ?? old('nama_alat') }}" required readonly>
                                </div>

                                <div class="form-group">
                                    <label for="id_nama_alat">ID Alat</label>
                                    <select id="id_nama_alat" class="form-control select2" name="id_nama_alat" required>
                                        <option disabled>Pilih ID Alat</option>
                                        @foreach($peralatan as $alat)
                                        <option value="{{ $alat->id }}" {{ $alat->id == $penjadwalan->id_nama_alat ?
                                            'selected' : '' }}>{{ $alat->id_alat }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="id_point_check">ID Point Check</label>
                                    <select id="id_point_check" class="form-control select2" name="id_point_check"
                                        required>
                                        <option disabled>Pilih ID Point Check</option>
                                        @foreach($pointCheck as $point)
                                        <option value="{{ $point->id }}" {{ $point->id == $penjadwalan->id_point_check ?
                                            'selected' : '' }}>{{ $point->nama_point_check }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="ruangan">Ruangan</label>
                                    <input id="ruangan" type="text" class="form-control" name="ruangan"
                                        value="{{ $penjadwalan->ruangan ?? old('ruangan') }}">
                                </div>

                                <div class="form-group">
                                    <label for="tanggal_jadwal">Tanggal Rencana Perbaikan</label>
                                    <input id="tanggal_jadwal" type="date" class="form-control" name="tanggal_jadwal"
                                        value="{{ $penjadwalan->tanggal_jadwal ?? old('tanggal_jadwal') }}" required>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
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
            var penjadwalan = @json($peralatan); // Mengonversi data peralatan menjadi objek JavaScript

            // Cari objek peralatan yang sesuai dengan id_alat_form yang dipilih
            var selectedPenjadwalan = penjadwalan.find(function(penjadwalan) {
                return penjadwalan.id == id_nama_alat;
            });

            // Set nilai nama_alat sesuai dengan objek peralatan yang ditemukan
            $('#nama_alat').val(selectedPenjadwalan ? selectedPenjadwalan.nama_alat : '');
        });
    });
</script>
@endpush