@extends('daftar_siswa')
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
                <div class="card shadow p-2">
                    <div class="head m-2 " style="text-align: center; font-size: 1.5rem; font-weight: 700;">
                        Detail Progres Siswa
                    </div>
                    <div class="table m-4" style="color: black">
                        @if ($siswa_id)
                            <div class="grid"
                                style="display: grid; gap: 4px; grid-template-columns: 2fr 9fr; font-size: 1rem; font-weight: 600">
                                <div class="grid-item">Nama</div>
                                <div class="grid-item">: {{ $siswa_id->nama }}</div>
                                <div class="grid-item">NIS</div>
                                <div class="grid-item">: {{ $siswa_id->NIK }}</div>
                            </div>
                        @endif
                        @if ($progress->isEmpty())
                            <div class="message mt-4" style="font-weight: 800; font-size: 1rem">
                                <div class=" btn-warning btn-circle btn-sm mr-2"
                                    style="display: inline-flex; justify-content: center; align-items: center;">
                                    <i class="fas fa-exclamation-triangle"
                                        style="background-color: transparent; color: black"></i>
                                </div>
                                Data Progres Siswa Masih Kosong
                            </div>
                        @else
                            <div class="progres mt-4 mb-2" style="font-weight: 800">
                                Data Detail Progres Siswa
                            </div>
                            <table class="siswa" style="min-width: 90%;">
                                <thead>
                                    <tr style="font-size: 1rem; font-weight: 700">
                                        <td>
                                            Jenis Soal
                                        </td>
                                        <td>
                                            Progress Pemain
                                        </td>
                                        <td>
                                            Nilai Quiz
                                        </td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($progress as $item)
                                        <tr style="font-weight: 600">
                                            <td>
                                                {{ $item->nama_jenis_soal }}
                                            </td>
                                            <td>
                                                {{ $item->progress_pemain }}
                                            </td>
                                            <td>
                                                @foreach ($nilai as $data)
                                                    @if ($item->id_jenis_soal == $data->id_jenis_soal)
                                                        {{ $data->nilai_quiz_pemain }}
                                                    @endif
                                                @endforeach
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{-- <div class="grid" style="display: grid; gap: 4px; grid-template-columns: 4fr 4fr 9fr;">
                                <div class="grid-item" style="font-weight: 700">Jenis Soal</div>
                                <div class="grid-item" style="font-weight: 700">Progres Pemain</div>
                                <div class="grid-item" style="font-weight: 700">Nilai Quiz</div>
                                @foreach ($progress as $item)
                                    <div class="grid-item" style="font-weight: 600">{{ $item->nama_jenis_soal }}</div>
                                    <div class="grid-item" style="font-weight: 600">{{ $item->progress_pemain }}</div>
                                    @if ($progres)
                                        @foreach ($progres as $item)
                                            <div class="grid-item" style="font-weight: 600">{{ $item }}
                                            </div>
                                        @endforeach
                                    @endif
                                @endforeach
                            </div> --}}
                        @endif
                    </div>
                    <div class="row">
                        <div class="modal-footer mt-4 me-4 mb-4">
                            <a href="{{ route('daftar.siswa') }}" class="btn btn-danger me-4" type="button">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
