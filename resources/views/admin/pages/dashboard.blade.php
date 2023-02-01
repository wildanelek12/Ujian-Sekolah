@extends('admin.index')
@section('main')

<div class="container-fluid p-0">
    <div class="container-fluid p-0">

        <div class="row mb-2 mb-xl-3">
            <div class="col-auto d-none d-sm-block">
                <h3><strong>E-Commerce</strong> Dashboard</h3>
            </div>

            <div class="col-auto ms-auto text-end mt-n1">
                <a href="#" class="btn btn-light bg-white me-2">Invite a Friend</a>
                <a href="#" class="btn btn-primary">New Project</a>
            </div>
        </div>

        {{-- Data --}}
        <div class="row">
            {{-- Data Guru --}}
            <div class="col-sm-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col mt-0">
                                <h5 class="card-title">Guru</h5>
                            </div>

                            <div class="col-auto">
                                <div class="stat text-primary">
                                    <i class="align-middle" data-feather="user"></i>
                                </div>
                            </div>
                        </div>
                        <h1 class="mt-1 mb-3">62</h1>
                        <div class="mb-0">
                            <span class="badge badge-success-light"> <i class="mdi mdi-arrow-bottom-right"></i> Orang </span>
                            <span class="text-muted">Pengajar Aktif</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Siswa --}}
            <div class="col-sm-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col mt-0">
                                <h5 class="card-title">Siswa</h5>
                            </div>

                            <div class="col-auto">
                                <div class="stat text-primary">
                                    <i class="align-middle" data-feather="users"></i>
                                </div>
                            </div>
                        </div>
                        <h1 class="mt-1 mb-3">1053</h1>
                        <div class="mb-0">
                            <span class="badge badge-success-light"> <i class="mdi mdi-arrow-bottom-right"></i> Orang </span>
                            <span class="text-muted">Siswa Aktif</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Mapel --}}
            <div class="col-sm-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col mt-0">
                                <h5 class="card-title">Mata Pelajaran</h5>
                            </div>

                            <div class="col-auto">
                                <div class="stat text-primary">
                                    <i class="align-middle" data-feather=""></i>
                                </div>
                            </div>
                        </div>
                        <h1 class="mt-1 mb-3">29</h1>
                        <div class="mb-0">
                            <span class="badge badge-success-light"> <i class="mdi mdi-arrow-bottom-right"></i>Mata</span>
                            <span class="text-muted">Pelajaran</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Ujian --}}
            <div class="col-sm-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col mt-0">
                                <h5 class="card-title">Ujian</h5>
                            </div>

                            <div class="col-auto">
                                <div class="stat text-primary">
                                    <i class="align-middle" data-feather="user"></i>
                                </div>
                            </div>
                        </div>
                        <h1 class="mt-1 mb-3">29</h1>
                        <div class="mb-0">
                            <span class="badge badge-success-light"> <i class="mdi mdi-arrow-bottom-right"></i>Ujian</span>
                            <span class="text-muted">Diselenggarakan</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Ujian Aktif Saat ini --}}
        <div class="row">
            <div class="col-12 col-lg-12 col-xxl-12 d-flex">
                <div class="card flex-fill">
                    <div class="card-header">
                        <div class="card-actions float-end">
                            <div class="dropdown show">
                                <a href="#" data-bs-toggle="dropdown" data-bs-display="static">
                                    <i class="align-middle" data-feather="more-horizontal"></i>
                                </a>

                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                        </div>
                        <h5 class="card-title mb-0">Ujian Aktif Saat Ini</h5>
                    </div>
                    <table class="table table-borderless my-0">
                        
                        <thead>
                            <tr>
                                <th>Kode Ujian</th>
                                <th class="d-none d-xxl-table-cell">Mata Pelajaran</th>
                                <th class="d-none d-xl-table-cell">Kelas</th>
                                <th class="d-none d-xl-table-cell text-end">Peserta</th>
                                <th>Waktu</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>
                                    <div class="d-flex">
                                        FCA311
                                    </div>
                                </td>
                                <td class="d-none d-xxl-table-cell">
                                    Bahasa Indonesia
                                </td>
                                <td class="d-none d-xl-table-cell">
                                    X
                                </td>
                                <td class="d-none d-xl-table-cell text-end">
                                    520
                                </td>
                                <td>
                                    07.00 - 08.30
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex">
                                        14213d
                                    </div>
                                </td>
                                <td class="d-none d-xxl-table-cell">
                                    Bahasa Indonesia
                                </td>
                                <td class="d-none d-xl-table-cell">
                                    XI
                                </td>
                                <td class="d-none d-xl-table-cell text-end">
                                    390
                                </td>
                                <td>
                                    07.00 - 08.30
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex">
                                        da253c
                                    </div>
                                </td>
                                <td class="d-none d-xxl-table-cell">
                                    Bahasa Indonesia
                                </td>
                                <td class="d-none d-xl-table-cell">
                                    XII
                                </td>
                                <td class="d-none d-xl-table-cell text-end">
                                    489
                                </td>
                                <td>
                                    07.00 - 08.30
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection