@extends('layouts.admin')
@section('content')
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Progres Siswa</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="dataProgres" class="display" style="width:100%">
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
                                        <th>Progres</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    ?>
                                    @foreach ($progres as $item)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $item->nis}}</td>
                                            <td>{{ $item->nama_siswa }}</td>
                                            <td>{{ $item->jenis_soal }}</td>
                                            <td>{{ $item->progres }}</td>
                                        </tr>
                                    @endforeach
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
