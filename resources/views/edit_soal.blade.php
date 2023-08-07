@extends('layouts.admin')
@section('content')
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Begin Page Content -->
            <div class="container-fluid">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <form action="{{ route('update.soal', $soalfull->id_soal) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="modal-body">
                                <div class="container">
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="jenis_soal">Jenis Soal</label>
                                                <input type="text" class="form-control" placeholder="{{ $soalfull->jenis_soal }}" disabled>
                                                <div class="alert-message" id="jenisSoalAlert"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-md-12">
                                            <label for="isi_soal">Isi Soal</label>
                                            <textarea name="isi_soal" id="isi_soal" cols="45" rows="5" class="form-control">{{ $soal->isi_soal_quiz }}</textarea>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-md-12">
                                            <label for="jawaban_benar">Jawaban
                                                Benar</label>
                                            <input type="text" name="jawaban_benar" value="{{ $soal->jawaban_benar }}"
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-md-12">
                                            <label for="jawaban_opsional_1">Jawaban
                                                Opsional 1</label>
                                            <input type="text" name="jawaban_opsional_1"
                                                value="{{ $soal->jawaban_opsional_1 }}" class="form-control">
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-md-12">
                                            <label for="jawaban_opsional_2">Jawaban
                                                Opsional 2</label>
                                            <input type="text" name="jawaban_opsional_2"
                                                value="{{ $soal->jawaban_opsional_2 }}" class="form-control">
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-md-12">
                                            <label for="jawaban_opsional_3">Jawaban
                                                Opsional 3</label>
                                            <input type="text" name="jawaban_opsional_3"
                                                value="{{ $soal->jawaban_opsional_3 }}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer mt-4 me-4">
                                <a href="{{ route('daftar.soal') }}" class="btn btn-danger me-4" type="button">Kembali</a>
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

    </div>
    <!-- End of Content Wrapper -->
@endsection
