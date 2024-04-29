@extends('layouts.app')

@section('title', 'Tambah Peralatan')

@push('style')
<!-- CSS Libraries -->
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Peralatan</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Master</a></div>
                <div class="breadcrumb-item active"><a href="{{ route('peralatan.index') }}">Peralatan</a></div>
                <div class="breadcrumb-item">Tambah Peralatan</div>
            </div>
        </div>

        <div class="section-body">
            <form action="{{ route('peralatan.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="id_alat">ID Alat</label>
                                    <input id="id_alat" type="text"
                                        class="form-control @error('id_alat') is-invalid @enderror" name="id_alat"
                                        value="{{ $idAlat }}" required autofocus readonly>

                                    @error('id_alat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="nama_alat">Nama Alat</label>
                                    <input id="nama_alat" type="text"
                                        class="form-control @error('nama_alat') is-invalid @enderror" name="nama_alat"
                                        value="{{ old('nama_alat') }}" required>

                                    @error('nama_alat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="id_kategori_alat">Kategori Alat</label>
                                    <select id="id_kategori_alat"
                                        class="form-control @error('id_kategori_alat') is-invalid @enderror"
                                        name="id_kategori_alat" required>
                                        <option disabled selected>Pilih Kategori Alat</option>
                                        @foreach($kategoriPeralatan as $kategori)
                                        <option value="{{ $kategori->id }}">{{ $kategori->kategori_alat }}</option>
                                        @endforeach
                                    </select>

                                    @error('id_kategori_alat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="{{ route('peralatan.index') }}" class="btn btn-danger"> Batal</a>
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
<script>
    
</script>

@endpush