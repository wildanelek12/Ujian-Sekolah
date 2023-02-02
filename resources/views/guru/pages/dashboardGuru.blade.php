@extends('guru.index')
@section('main')
    <div class="row mt-2">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table id="datatables-reponsive" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Mata Pelajaran</th>
                                <th>Kode Ujian</th>
                                <th>Kelas</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Matematika</td>
                                <td>fca311</td>
                                <td>X</td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-primary"><i data-feather="eye"></i> Lihat</a>
                                </td>
                            </tr>
                            <tr>
                                <td>Matematika</td>
                                <td>da2531</td>
                                <td>XI</td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-primary"><i data-feather="eye"></i> Lihat</a>
                                </td>
                            </tr>
                            <tr>
                                <td>Matematika</td>
                                <td>14213d</td>
                                <td>XII</td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-primary"><i data-feather="eye"></i> Lihat</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<hr>
    <div class="row">
        
    </div>

    
@endsection