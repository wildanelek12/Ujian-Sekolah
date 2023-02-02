@extends('admin.index')
@section('main')

    <div class="container-fluid p-0">
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
                        <h3 class="card-title">Update Kelas</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.kelas.update',['kelas' => $data->id])}}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Nama Kelas</label>
                                <input type="text" value="{{$data->nama}}" class="form-control" rows="1" name="nama">
                            </div>
                            <button type="submit" class="btn btn-primary" id="tambahkan"
                                name="tambahkan">update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Datatables Responsive
            $("#datatables-reponsive").DataTable({
                responsive: true
            });
        });
    </script>
@endsection
