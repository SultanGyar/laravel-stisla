@extends('layouts.app')

@section('title', 'Tambah Kategori Alat')

@push('style')
<!-- CSS Libraries -->
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Kategori Alat</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Master</a></div>
                <div class="breadcrumb-item active"><a href="{{ route('kategori_peralatan.index') }}">Kategori Alat</a>
                </div>
                <div class="breadcrumb-item">Tambah Kategori Alat</div>
            </div>
        </div>

        <div class="section-body">
            <form method="POST" action="{{ route('kategori_peralatan.store') }}">
                @csrf

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="kategori_alat">Kategori Alat<span
                                            class="font-weight-normal text-danger">*</label>
                                    <input type="text"
                                        class="form-control  @error('kategori_alat') is-invalid @enderror"
                                        id="kategori_alat" placeholder="Masukan Kategori" name="kategori_alat"
                                        value="{{ old('kategori_alat') }}" autocomplete="off">
                                    @error('kategori_alat') <span class="text-danger">{{ $message}}</span> @enderror
                                </div>

                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="{{ route('kategori_peralatan.index') }}" class="btn btn-danger"> Batal</a>
                                </div>
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

@endpush