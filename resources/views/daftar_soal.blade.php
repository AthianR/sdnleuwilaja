@extends('layouts.admin')
@section('content')
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                {{-- <h1 class="h3 mb-2 text-gray-800">Tables</h1>
                <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                    For more information about DataTables, please visit the <a target="_blank"
                        href="https://datatables.net">official DataTables documentation</a>.</p> --}}

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Daftar Soal Quiz</h6>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#addModal"><i class="fa fa-plus"
                                aria-hidden="true"></i></button>

                        <!-- Add Data Modal-->
                        <div class="modal fade" id="addModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Tambah Soal Quiz</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <label for="jenis_soal">Jenis Soal</label>
                                        <select name="jenis_soal" id="jenisSoal">
                                            <option value="1">Bahasa Indonesia</option>
                                        </select>
                                        <br>
                                        <label for="isi_soal">Isi Soal</label>
                                        <textarea name="isi_soal" id="isi_soal" cols="45" rows="5" placeholder="Masukan Soal..."></textarea>
                                        <label for="jawaban_benar">Jawaban Benar</label>
                                        <input type="text">
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
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Jenis Soal</th>
                                        <th>Soal Quiz</th>
                                        <th>Jawaban Benar</th>
                                        <th>Jawaban Opsional 1</th>
                                        <th>Jawaban Opsional 2</th>
                                        <th>Jawaban Opsional 3</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Jenis Soal</th>
                                        <th>Soal Quiz</th>
                                        <th>Jawaban Benar</th>
                                        <th>Jawaban Opsional 1</th>
                                        <th>Jawaban Opsional 2</th>
                                        <th>Jawaban Opsional 3</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    ?>
                                    @foreach ($soal as $item)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $item->jenis_soal }}</td>
                                            <td>{{ $item->soal_quiz }}</td>
                                            <td>{{ $item->jawaban_benar }}</td>
                                            <td>{{ $item->jawaban_1 }}</td>
                                            <td>{{ $item->jawaban_2 }}</td>
                                            <td>{{ $item->jawaban_3 }}</td>
                                            <td>
                                                <button class="btn btn-primary"><i class="fa fa-cog"
                                                        aria-hidden="true"></i></button>
                                                <button class="btn btn-danger"><i class="fa fa-trash"
                                                        aria-hidden="true"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{-- {{ $soal->links() }} --}}
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
