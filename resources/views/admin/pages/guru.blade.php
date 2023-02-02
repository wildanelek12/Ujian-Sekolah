@extends('admin.index')
@section('main')
    <div class="container-fluid p-0">

        {{-- <div class="row justify-content-end">
            <div class="col-3 text-end">
                <a class="btn btn-success"><i data-feather="plus-circle"></i> Create</a>
                <button class="btn btn-success"><i class="fas fa-plus-circle"></i> Create</button>
            </div>
        </div> --}}

        {{-- Form Input --}}
        <div class="row">

            <div class="col-8 col-xl-8">
                <div class="card">
                    <div class="card-header">
                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                <div class="alert-message">
                                    @foreach ($errors->all() as $error)
                                        <strong>Warning</strong> {{ $error }} <br>
                                    @endforeach

                                </div>
                            </div>
                        @endif
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                                <div class="alert-message">
                                    <strong>Selamat</strong> {{ session('success') }}<br>
                                </div>
                            </div>
                        @endif

                        <h3 class="card-title">Tambahkan Guru</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.guru.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Nama</label>
                                <input type="text" class="form-control" rows="1" name="nama">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">NIP</label>
                                <input type="text" class="form-control" rows="1" name="nip">
                            </div>
                            <button type="submit" class="btn btn-primary">Tambahkan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table id="datatables-reponsive" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>NIP</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datas as $item)
                                    <tr>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->induk }}</td>
                                        <td>
                                            <a href="{{ route('admin.guru.edit', ['id' => $item->id]) }}"
                                                class="btn btn-sm btn-primary"><i data-feather="edit-2"></i></a>
                                            <a data-bs-toggle="modal" data-bs-target="#defaultModalDanger   "
                                                class="btn btn-sm btn-danger btn-delete" data-id="{{$item->id}}"><i
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
    </div>

    <div class="modal fade" id="defaultModalDanger" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="" id="delete" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Perhatian</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <div class="modal-body m-3">
                        <p class="mb-0">Apakah anda yakin ingin menghapus data?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Save changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Datatables Responsive
            $("#datatables-reponsive").DataTable({
                responsive: true
            });

            $(".btn-delete").click(function() {
                var id = $(this).data("id") ;
                $("#delete").attr('action','/admin/guru/'+id)
            });
        });
    </script>
@endsection
