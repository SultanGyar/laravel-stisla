@extends('layouts.app')

@section('title', 'Penjadwalan')

@push('style')
<!-- CSS Libraries -->
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Penjadwalan</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Master</a></div>
                <div class="breadcrumb-item">Penjadwalan</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{route('penjadwalan.create')}}" class="btn btn-primary mb-3">Tambah</a>
                            <div class="table-responsive">
                                <table class="table table-striped table-md">
                                    <thead>
                                        <tr  class="text-small">
                                            <th>#</th>
                                            <th>Id Jadwal</th>
                                            <th>Tanggal</th>
                                            <th>Nama Alat</th>
                                            <th>kategori Alat</th>
                                            <th>ID Alat</th>
                                            <th>Point Check</th>
                                            <th>Ruangan</th>
                                            <th>Tanggal Jadwal</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($penjadwalan as $key => $data)
                                        <tr class="text-small">
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $data->id_penjadwalan }}</td>
                                            <td>{{ $data->tanggal }}</td>
                                            <td>{{ $data->nama_alat }}</td>
                                            <td>{{ $data->kategori_alat }}</td>
                                            <td>{{ $data->fperalatan->id_alat }}</td>
                                            <td>{{ $data->fpointCheck->nama_point_check }}</td>
                                            <td>{{ $data->ruangan }}</td>
                                            <td>{{ $data->tanggal_jadwal }}</td>
                                            <td>
                                                <div class="badge badge-success">Open</div>
                                            </td>
                                            <td>
                                                <a href="{{route('penjadwalan.edit',$data)}}"
                                                    class="btn btn-info btn-sm">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                                <form action="{{ route('penjadwalan.destroy', $data->id) }}" method="POST"
                                                    style="display: inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Anda yakin ingin menghapus?')">
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