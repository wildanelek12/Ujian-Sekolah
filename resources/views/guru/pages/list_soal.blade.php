@extends('guru.index')
@section('main')
    <div class="row justify-content-end">
        <div class="col-3 text-end">
            {{-- <a class="btn btn-success"><i data-feather="plus-circle"></i> Create</a> --}}
            <a href="{{ route('guru.create', ['id' => $id]) }}"><button class="btn btn-success"><i
                        class="fas fa-plus-circle"></i>
                    Tambahkan</button></a>
            <a href="#"><button class="btn btn-success" data-bs-target="#modalUploadSoal" data-bs-toggle="modal"><i
                        class="fas fa-plus-circle"></i>
                    Import Soal</button></a>
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table id="datatables-reponsive" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
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
                            @foreach ($datas as $item)
                                <tr>
                                    <div class="div">

                                    </div>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td> {!! $item->soal !!}</td>
                                    <td>{!! $item->opsi_a !!}</td>
                                    <td>{!! $item->opsi_b !!}</td>
                                    <td>{!! $item->opsi_c !!}</td>
                                    <td>{!! $item->opsi_d !!}</td>
                                    <td>{!! $item->opsi_e !!}</td>
                                    <td>{ $item->key }}</td>
                                    <td>
                                        <a href="{{ route('guru.update') }}" class="btn btn-sm btn-primary"><i
                                                data-feather="edit-2"></i></a>
                                        <a href="#" class="btn btn-sm btn-danger btn-delete" data-id="#"><i
                                                data-feather="trash-2"></i></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-3">
            <a href="{{ route('guru.dashboard') }}"><button class="btn btn-primary">Kembali</button></a>
        </div>
    </div>
    <div class="modal fade" id="modalUploadSoal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{ route('guru.soal.storeExcel') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Perhatian</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>

                    <input type="hidden" value="{{ $id }}" name="mapel_id">
                    <div class="modal-body m-3">
                        <div class="mb-3">
                            <label class="form-label w-100">Upload Data Soal</label>
                            <input class="form-control" name="file" type="file" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        $("#datatables-reponsive").DataTable({
            responsive: true
        });
    </script>
@endsection
