@extends('admin.index')
@section('main')
    <div class="container-fluid p-0">

        <div class="row justify-content-end">
            <div class="col-3 text-end">
                {{-- <a class="btn btn-success"><i data-feather="plus-circle"></i> Create</a> --}}
                <button class="btn btn-success"><i class="fas fa-plus-circle"></i> Create</button>
            </div>
        </div>

        <div class="row">
            <div class="col-8 col-xl-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Basic form</h5>
                        <h6 class="card-subtitle text-muted">Default Bootstrap form layout.</h6>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="mb-3">
                                <label class="form-label">Email address</label>
                                <input type="email" class="form-control" placeholder="Email">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control" placeholder="Password">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Textarea</label>
                                <textarea class="form-control" placeholder="Textarea" rows="1"></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label w-100">File input</label>
                                <input type="file">
                                <small class="form-text text-muted">Example block-level help text here.</small>
                            </div>
                            <div class="mb-3">
                                <label class="form-check m-0">
                                    <input type="checkbox" class="form-check-input">
                                    <span class="form-check-label">Check me out</span>
                                </label>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
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
                                    <th>Mata Pelajaran</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Wahyu Sakti</td>
                                    <td>1111111111</td>
                                    <td>Matematika</td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-primary"><i data-feather="edit-2"></i></a>
                                        <a href="#" class="btn btn-sm btn-danger btn-delete" data-id="#"><i
                                                data-feather="trash-2"></i></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Achmad Hamdan</td>
                                    <td>2222222222</td>
                                    <td>Biologi</td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-primary"><i data-feather="edit-2"></i></a>
                                        <a href="#" class="btn btn-sm btn-danger btn-delete" data-id="#"><i
                                                data-feather="trash-2"></i></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Shofiyah</td>
                                    <td>3333333333</td>
                                    <td>Bahasa Indonesia</td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-primary"><i data-feather="edit-2"></i></a>
                                        <a href="#" class="btn btn-sm btn-danger btn-delete" data-id="#"><i
                                                data-feather="trash-2"></i></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Hakkuk Elmunsyah</td>
                                    <td>4444444444</td>
                                    <td>Fisika</td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-primary"><i data-feather="edit-2"></i></a>
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
    </div>

    <script src="js/app.js"></script>

    <script src="js/datatables.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Datatables Responsive
            $("#datatables-reponsive").DataTable({
                responsive: true
            });
        });
    </script>
@endsection
