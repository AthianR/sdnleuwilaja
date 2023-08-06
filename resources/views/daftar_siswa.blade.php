@extends('layouts.admin')
@section('content')
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
                        <h6 class="m-0 font-weight-bold text-primary">Daftar Siswa</h6>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#addModal"><i class="fa fa-plus"
                                aria-hidden="true"></i></button>

                        <!-- Add Data Modal-->
                        <div class="modal fade" id="addModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Siswa</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <form action="{{ route('add.siswa') }}" method="post">
                                        @csrf
                                        @method('POST')
                                        <div class="modal-body">
                                            <div class="form-group d-flex justify-content-between">
                                                <label for="NIK">NIS</label>
                                                <input type="number" name="NIK" id="NIK" style="width: 70%"
                                                    placeholder="NIS Siswa" value="{{ old('NIK') }}" required>
                                            </div>
                                            @if ($errors->has('NIK'))
                                                <div class="alert alert-danger">
                                                    {{ $errors->first('NIK') }}
                                                </div>
                                            @endif

                                            <div class="form-group d-flex justify-content-between">
                                                <label for="nama">Nama Siswa</label>
                                                <input type="text" name="nama" id="nama" style="width: 70%"
                                                    placeholder="Nama Siswa" value="{{ old('nama') }}" required>
                                            </div>

                                            <div class="form-group d-flex justify-content-between">
                                                <label for="password">Password</label>
                                                <input type="password" name="password" id="password" style="width: 70%"
                                                    placeholder="Password" required>
                                            </div>
                                            @if ($errors->has('password'))
                                                <div class="alert alert-danger">
                                                    {{ $errors->first('password') }}
                                                </div>
                                            @endif
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
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIS</th>
                                        <th>Nama Siswa</th>
                                        <th>Password</th>
                                        <th>Aksi</th>
                                        {{-- <th>Age</th>
                                <th>Start date</th>
                                <th>Salary</th> --}}
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>NIS</th>
                                        <th>Nama Siswa</th>
                                        <th>Password</th>
                                        <th>Aksi</th>
                                        {{-- <th>Age</th>
                                <th>Start date</th>
                                <th>Salary</th> --}}
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    ?>
                                    @foreach ($siswa as $item)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $item->NIK }}</td>
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->password }}</td>
                                            <td>
                                                <a href="" class="btn btn-primary"><i class="fa fa-cog"
                                                        aria-hidden="true"></i></a>
                                                <form action="{{ route('destroy.siswa', $item->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"
                                                            aria-hidden="true"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $siswa->links() }}
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
    </div>
@endsection
