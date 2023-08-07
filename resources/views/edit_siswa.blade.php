@extends('layouts.admin')
@section('content')
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Begin Page Content -->
            <div class="container-fluid">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <form action="{{ route('update.siswa', $siswa->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="container">
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="nama">Nama Siswa</label>
                                        <input type="text" name="nama" id="nama" class="form-control"
                                            value="{{ $siswa->nama }}" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="password">Password Baru</label>
                                        <input type="password" name="password" id="password" class="form-control" placeholder="********" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="konfirmasi_password">Konfirmasi Password Baru</label>
                                        <input type="password" name="konfirmasi_password" id="konfirmasi_password"
                                            class="form-control" placeholder="********" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="modal-footer mt-4 me-4">
                                        <a href="{{ route('daftar.siswa') }}" class="btn btn-danger me-4"
                                            type="button">Kembali</a>
                                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
