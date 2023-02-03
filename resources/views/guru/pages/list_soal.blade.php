@extends('guru.index')
@section('main')

    <div class="row justify-content-end">
        <div class="col-3 text-end">
            {{-- <a class="btn btn-success"><i data-feather="plus-circle"></i> Create</a> --}}
            <a href="{{route('guru.create')}}"><button class="btn btn-success"><i class="fas fa-plus-circle"></i> Tambahkan</button></a>
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table id="datatables-reponsive" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Mata Pelajaran</th>
                                <th>ID</th>
                                <th>Soal</th>
                                <th>Opsi A</th>
                                <th>Opsi B</th>
                                <th>Opsi C</th>
                                <th>Opsi D</th>
                                <th>Opsi E</th>
                                <th>Kunci Jawaban</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Matematika</td>
                                <td>fca311</td>
                                <td>Berapa Ukuran Rumah Pak Tri?</td>
                                <td>Gedhe</td>
                                <td>Biasa Aja</td>
                                <td>Gedhe Banget</td>
                                <td>Kecil</td>
                                <td>Agak Gedhe</td>
                                <td>C</td>
                                <td>
                                    <a href="{{route('guru.update')}}" class="btn btn-sm btn-primary"><i data-feather="edit-2"></i></a>
                                        <a href="#" class="btn btn-sm btn-danger btn-delete" data-id="#"><i
                                                data-feather="trash-2"></i></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-3">
            <a href="{{route('guru.dashboard')}}"><button class="btn btn-primary">Kembali</button></a>
        </div>
    </div>

    
@endsection