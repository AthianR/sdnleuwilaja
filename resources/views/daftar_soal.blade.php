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
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Daftar Soal Quiz</h6>
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
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php 
                                    $no=1;
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