@extends('layouts.app')

@section('title', 'Edit User')

@push('style')
<!-- CSS Libraries -->
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit User</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route("dashboard") }}">Master</a></div>
                <div class="breadcrumb-item active"><a href="{{ route("user.index") }}">User</a></div>
                <div class="breadcrumb-item">Edit User</div>
            </div>
        </div>

        <div class="section-body">
            <form action="{{route('user.update', $users)}}" method="post">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="username">Username<span class="font-weight-normal text-danger">*</label>
                                    <input type="text" class="form-control  @error('username') is-invalid @enderror"
                                        id="username" placeholder="Masukan Username" name="username" value="{{$users->username ?? old('username')}}" autocomplete="off">
                                    @error('username') <span class="text-danger">{{ $message}}</span> @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password">Password<span class="font-weight-normal text-danger">*</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        id="password" placeholder="Masukan Password" name="password" >
                                    @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password_confirmation">Konfirmasi Password<span
                                            class="font-weight-normal text-danger">*</label>
                                    <input type="password" class="form-control" id="password_confirmation"
                                        placeholder="Konfirmasi Password" name="password_confirmation">
                                </div>
                                <div class="form-group">
                                    <label for="level">Level<span class="font-weight-normal text-danger">*</label>
                                    <select class="form-control @error('level') is-invalid @enderror" id="level"
                                        name="level">
                                        <option disabled selected>Pilih Level</option>
                                        <option value="Admin" @if($users->level == 'Admin' || old('level')=='Admin' )selected @endif>Admin</option>
                                        <option value="Teknisi" @if($users->level == 'Teknisi' || old('level')=='Teknisi' )selected @endif>Teknisi</option>
                                        <option value="Guru" @if($users->level == 'Guru' || old('level')=='Guru' )selected @endif>Guru</option>
                                        <option value="Siswa" @if($users->level == 'Siswa' || old('level')=='Siswa' )selected @endif>Siswa</option>
                                    </select>
                                    @error('level') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="{{ route('user.index') }}" class="btn btn-danger">Batal</a>
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