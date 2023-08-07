@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
        </div>

        <!-- Content Row -->
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center p-2">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Jumlah Siswa</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $countSiswa }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fa fa-users fa-2x text-gray-300" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center p-2">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Jumlah Soal</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $countSoal }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fa fa-book fa-2x text-gray-300" aria-hidden="true"></i>
                                {{-- <i class="fas fa-dollar-sign fa-2x text-gray-300"></i> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center p-2">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Jenis Soal</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $countJenisSoal }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fa fa-tags fa-2x text-gray-300" aria-hidden="true"></i>
                                {{-- <i class="fas fa-comments fa-2x text-gray-300"></i> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Earnings (Monthly) Card Example -->
            {{-- <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center p-2">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                                    </div>
                                    <div class="col">
                                        <div class="progress progress-sm mr-2">
                                            <div class="progress-bar bg-info" role="progressbar" style="width: 50%"
                                                aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}

        </div>

        <!-- Content Row -->

        <div class="row">

            <!-- Area Chart -->
            {{-- <div class="col-xl-8 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                aria-labelledby="dropdownMenuLink">
                                <div class="dropdown-header">Dropdown Header:</div>
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-area">
                            <canvas id="myAreaChart"></canvas>
                        </div>
                    </div>
                </div>
            </div> --}}

            <!-- Pie Chart -->
            {{-- <div class="col-xl-4 col-lg-5">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                aria-labelledby="dropdownMenuLink">
                                <div class="dropdown-header">Dropdown Header:</div>
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-pie pt-4 pb-2">
                            <canvas id="myPieChart"></canvas>
                        </div>
                        <div class="mt-4 text-center small">
                            <span class="mr-2">
                                <i class="fas fa-circle text-primary"></i> Direct
                            </span>
                            <span class="mr-2">
                                <i class="fas fa-circle text-success"></i> Social
                            </span>
                            <span class="mr-2">
                                <i class="fas fa-circle text-info"></i> Referral
                            </span>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>

        <!-- Content Row -->
        <div class="row">

            <!-- Content Column -->
            <div class="col-lg-12 mb-4">

                <!-- Project Card Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Progres Siswa</h6>
                    </div>
                    <div class="card-body">
                        @foreach ($progresIpa as $ipa)
                            <h4 class="small font-weight-bold">
                                IPA
                                <span class="float-right">

                                    {{ number_format(($ipa->total_progres / ($countSiswa * 6)) * 100, 0) }}%

                                </span>
                            </h4>
                            <div class="progress mb-4">
                                <div class="progress-bar bg-danger" role="progressbar"
                                    style="width: {{ number_format(($ipa->total_progres / ($countSiswa * 6)) * 100, 0) }}%"
                                    aria-valuenow="{{ number_format(($ipa->total_progres / ($countSiswa * 6)) * 100, 0) }}%"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        @endforeach

                        @foreach ($progresIps as $ips)
                            <h4 class="small font-weight-bold">
                                IPS
                                <span class="float-right">

                                    {{ number_format(($ips->total_progres / ($countSiswa * 6)) * 100, 0) }}%

                                </span>
                            </h4>
                            <div class="progress mb-4">
                                <div class="progress-bar bg-warning" role="progressbar"
                                    style="width: {{ number_format(($ips->total_progres / ($countSiswa * 6)) * 100, 0) }}%"
                                    aria-valuenow="{{ number_format(($ips->total_progres / ($countSiswa * 6)) * 100, 0) }}"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        @endforeach

                        @foreach ($progresBi as $bi)
                            <h4 class="small font-weight-bold">
                                Bahasa Indonesia
                                <span class="float-right">

                                    {{ number_format(($bi->total_progres / ($countSiswa * 6)) * 100, 0) }}%

                                </span>
                            </h4>
                            <div class="progress mb-4">
                                <div class="progress-bar" role="progressbar"
                                    style="width: {{ number_format(($bi->total_progres / ($countSiswa * 6)) * 100, 0) }}%"
                                    aria-valuenow="{{ number_format(($bi->total_progres / ($countSiswa * 6)) * 100, 0) }}"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        @endforeach

                        @foreach ($progresSb as $sb)
                            <h4 class="small font-weight-bold">
                                Seni Budaya
                                <span class="float-right">

                                    {{ number_format(($sb->total_progres / ($countSiswa * 6)) * 100, 0) }}%

                                </span>
                            </h4>
                            <div class="progress mb-4">
                                <div class="progress-bar bg-info" role="progressbar"
                                    style="width: {{ number_format(($sb->total_progres / ($countSiswa * 6)) * 100, 0) }}%"
                                    aria-valuenow="{{ number_format(($sb->total_progres / ($countSiswa * 6)) * 100, 0) }}"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        @endforeach

                        @foreach ($progresPk as $pk)
                            <h4 class="small font-weight-bold">
                                PPKN
                                <span class="float-right">

                                    {{ number_format(($pk->total_progres / ($countSiswa * 6)) * 100, 0) }}%

                                </span>
                            </h4>
                            <div class="progress">
                                <div class="progress-bar bg-success" role="progressbar"
                                    style="width: {{ number_format(($pk->total_progres / ($countSiswa * 6)) * 100, 0) }}%"
                                    aria-valuenow="{{ number_format(($pk->total_progres / ($countSiswa * 6)) * 100, 0) }}"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection
