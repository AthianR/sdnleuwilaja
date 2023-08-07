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
                                    <form action="{{ route('add.soal') }}" method="post">
                                        @csrf
                                        @method('post')
                                        <div class="modal-body">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label for="jenis_soal">Jenis Soal</label>
                                                        <select name="jenis_soal" id="jenisSoal" class="form-control">
                                                            @foreach ($jenis as $item)
                                                                <option value="{{ $item->id }}">
                                                                    {{ $item->nama_jenis_soal }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="row mt-3">
                                                    <div class="col-md-12">
                                                        <label for="isi_soal">Isi Soal</label>
                                                        <textarea name="isi_soal" id="isi_soal" cols="45" rows="5" class="form-control"
                                                            placeholder="Masukan Soal..."></textarea>
                                                    </div>
                                                </div>

                                                <div class="row mt-3">
                                                    <div class="col-md-12">
                                                        <label for="jawaban_benar">Jawaban Benar</label>
                                                        <input type="text" name="jawaban_benar" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="row mt-3">
                                                    <div class="col-md-12">
                                                        <label for="jawaban_opsional_1">Jawaban Opsional 1</label>
                                                        <input type="text" name="jawaban_opsional_1"
                                                            class="form-control">
                                                    </div>
                                                </div>

                                                <div class="row mt-3">
                                                    <div class="col-md-12">
                                                        <label for="jawaban_opsional_2">Jawaban Opsional 2</label>
                                                        <input type="text" name="jawaban_opsional_2"
                                                            class="form-control">
                                                    </div>
                                                </div>

                                                <div class="row mt-3">
                                                    <div class="col-md-12">
                                                        <label for="jawaban_opsional_3">Jawaban Opsional 3</label>
                                                        <input type="text" name="jawaban_opsional_3"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-danger" type="button"
                                                data-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataSoal" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th class="rounded-lg">Jenis Soal</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
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
                                            <td class="d-flex align-items-center">
                                                <a href="{{ route('edit.soal', $item->id) }}" class="btn btn-sm btn-primary me-2"><i class="fa fa-cog fa-sm"
                                                    aria-hidden="true"></i></a>
                                                <form action="{{ route('destroy.soal', $item->id) }}" method="POST"
                                                    id="deleteFormSoal">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-sm btn-danger"
                                                        onclick="confirmDelete('soal')"><i class="fa fa-trash fa-sm"
                                                            aria-hidden="true"></i></button>
                                                </form>
                                            </td>
                                        </tr>


                                        <div class="modal fade" id="modalDelete" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi
                                                            Hapus</h5>
                                                        <button class="close" type="button" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">Apakah yakin ingin menghapus data soal?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-secondary" type="button"
                                                            data-dismiss="modal">Batal</button>
                                                        <form action="{{ route('destroy.soal', $item->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
