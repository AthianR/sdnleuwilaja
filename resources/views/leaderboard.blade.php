@extends('layouts.admin')
@section('content')
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                {{-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Siswa</h1>
                    <!-- users/index.blade.php -->
                    <a href="{{ route('data.download', ['format' => 'csv']) }}" class="btn btn-primary">Download as CSV</a>
                    <a href="{{ route('data.download', ['format' => 'excel']) }}" class="btn btn-success">Download as
                        Excel</a>
                    <a href="{{ route('data.download', ['format' => 'pdf']) }}" class="btn btn-danger">Download as PDF</a>

                    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                            class="fas fa-download fa-sm text-white-50"></i>Download</a>
                </div> --}}

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Leaderboard Siswa</h6>
                        {{-- <button class="btn btn-primary" data-toggle="modal" data-target="#addModal"><i class="fa fa-plus"
                                aria-hidden="true"></i></button> --}}

                        <!-- Add Data Modal-->
                        <div class="modal fade" id="addModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Tambah Progres</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Isi Form Disini
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-danger" type="button" data-dismiss="modal">Batal</button>
                                        <form action="#">
                                            {{-- @csrf
                                        @method('post') --}}
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </form>
                                        {{-- <a class="btn btn-primary" href="{{ route('logout') }}">Logout</a> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataLeaderboard" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th>Jenis Soal</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIS</th>
                                        <th>Nama Siswa</th>
                                        <th>Jenis Soal</th>
                                        <th>Nilai Quiz</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>NIS</th>
                                        <th>Nama Siswa</th>
                                        <th>Jenis Soal</th>
                                        <th>Nilai Quiz</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    ?>
                                    @foreach ($leaderboard as $item)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $item->nis }}</td>
                                            <td>{{ $item->nama_siswa }}</td>
                                            <td>{{ $item->jenis_soal }}</td>
                                            <td>{{ $item->nilai_pemain }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

    </div>
    <!-- End of Content Wrapper -->
@endsection
