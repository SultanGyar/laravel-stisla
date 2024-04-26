@extends('layouts.app')

@section('title', 'Edit Peralatan')

@push('style')
<!-- CSS Libraries -->
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Peralatan</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Master</a></div>
                <div class="breadcrumb-item active"><a href="{{ route('peralatan.index') }}">Peralatan</a></div>
                <div class="breadcrumb-item">Edit Peralatan</div>
            </div>
        </div>

        <div class="section-body">
            <form action="{{ route('peralatan.update', $peralatan->id) }}" method="post">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="id_alat">ID Alat<span class="font-weight-normal text-danger">*</span></label>
                                    <input type="text" class="form-control @error('id_alat') is-invalid @enderror"
                                        id="id_alat" placeholder="Enter id_alat" name="id_alat"
                                        value="{{ $peralatan->id_alat ?? old('id_alat') }}" autocomplete="off" readonly>
                                    @error('id_alat') 
                                        <span class="text-danger">{{ $message }}</span> 
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="nama_alat">Nama Alat<span class="font-weight-normal text-danger">*</span></label>
                                    <input type="text" class="form-control @error('nama_alat') is-invalid @enderror"
                                        id="nama_alat" placeholder="Enter nama_alat" name="nama_alat"
                                        value="{{ $peralatan->nama_alat ?? old('nama_alat') }}" autocomplete="off">
                                    @error('nama_alat') 
                                        <span class="text-danger">{{ $message }}</span> 
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="id_kategori_alat">Kategori Alat</label>
                                    <select id="id_kategori_alat"
                                        class="form-control @error('id_kategori_alat') is-invalid @enderror"
                                        name="id_kategori_alat" required>
                                        <option disabled selected>Pilih Kategori Alat</option>
                                        @foreach($kategoriPeralatan as $kategori)
                                            <option value="{{ $kategori->id }}" {{ $kategori->id == $peralatan->id_kategori_alat ? 'selected' : '' }}>
                                                {{ $kategori->kategori_alat }}
                                            </option>
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
                                <button type="submit" class="btn btn-primary">Save</button>
                                <a href="{{ route('peralatan.index') }}" class="btn btn-danger">Cancel</a>
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