@extends('layouts.app')

@section('title', 'Laporan Perbaikan')

@push('style')
<!-- CSS Libraries -->
@endpush
{{-- ini halaman laporan_perbaikan --}}
@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Laporan Perbaikan</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Laporan</a></div>
                <div class="breadcrumb-item">Laporan Perbaikan</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <form action="{{ route('cetakPdfPerbaikan') }}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Tanggal Awal</label>
                                    <input type="date" class="form-control" name="start_date" required>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Akhir</label>
                                    <input type="date" class="form-control" name="end_date" required>
                                </div>
                                <button type="submit" class="btn btn-danger mb-3">Export PDF</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection

@push('scripts')


@endpush