@extends('layouts.app')

@section('title', 'Edit Point Check')

@push('style')
<!-- CSS Libraries -->
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Point Check</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Master</a></div>
                <div class="breadcrumb-item active"><a href="{{ route('point_check.index') }}">Point check</a></div>
                <div class="breadcrumb-item">Edit Point Check</div>
            </div>
        </div>

        <div class="section-body">
            <form action="{{route('point_check.update', $pointCheck)}}" method="post">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama_point_check">Point Check<span class="font-weight-normal text-danger">*</label>
                                    <input type="text" class="form-control  @error('nama_point_check') is-invalid @enderror"
                                        id="nama_point_check" placeholder="Masukan Point Check" name="nama_point_check"
                                        value="{{$pointCheck->nama_point_check ?? old('nama_point_check')}}" autocomplete="off">
                                    @error('nama_point_check') <span class="text-danger">{{ $message}}</span> @enderror
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="{{ route('point_check.index') }}" class="btn btn-danger">Batal</a>
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