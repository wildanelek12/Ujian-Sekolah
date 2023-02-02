@extends('admin.index')
@section('main')

    <div class="container-fluid p-0">

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
                        <h3 class="card-title">Tambahkan Siswa</h3>
                    </div>
                    <div class="card-body">
                        <form action="/admin/siswa/{{ $data->id }}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Nama</label>
                                <input type="text" value="{{ $data->nama }}" class="form-control" rows="1"
                                    name="nama">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">NIS</label>
                                <input type="text" value="{{ $data->induk }}" class="form-control" rows="1"
                                    name="nis">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Kelas</label>
                                <select class="form-control choices-single" name="kelas">
                   
                                    @foreach ($kelas as $item)
                                        <option value="{{ $item->id }}"
                                            @if ($item->id == $data->kelas_id)
                                                selected
                                            @endif
                                            >
                                        {{ $item->nama }}
                                    
                                    </option>
                                    @endforeach

                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary" id="tambahkan"
                                name="tambahkan">Tambahkan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <script src="js/app.js"></script>

    <script src="js/datatables.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Choices.js
            new Choices(document.querySelector(".choices-single"));
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Datatables Responsive
            $("#datatables-reponsive").DataTable({
                responsive: true
            });
        });
    </script>
@endsection
