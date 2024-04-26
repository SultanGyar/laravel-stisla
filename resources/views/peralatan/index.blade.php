@extends('layouts.app')

@section('title', 'Peralatan')

@push('style')
<!-- CSS Libraries -->
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Peralatan</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Master</a></div>
                <div class="breadcrumb-item">Peralatan</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            
                            <a href="{{ route('peralatan.create') }}" class="btn btn-primary mb-3">Tambah</a>
                            <div class="table-responsive">
                                <table class="table table-striped table-md">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Id Alat</th>
                                            <th>Nama Alat</th>
                                            <th>Kategori Alat</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($peralatan as $key => $data)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $data->id_alat }}</td>
                                            <td>{{ $data->nama_alat }}</td>
                                            <td>{{ $data->fkategori->kategori_alat }}</td> <!-- Menggunakan relasi dengan model KategoriPeralatan -->
                                            <td>
                                                <a href="{{ route('peralatan.edit', $data->id) }}" class="btn btn-info btn-xs btn-sm"> <!-- Perbaikan URL -->
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                                <form action="{{ route('peralatan.destroy', $data->id) }}" method="POST" style="display: inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus?')">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>                                                                  
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection

@push('scripts')



<form action="" id="delete-form" method="post">
    @method('delete')
    @csrf
</form>

@endpush