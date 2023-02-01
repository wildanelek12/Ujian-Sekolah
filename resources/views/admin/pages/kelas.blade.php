@extends('admin.index')
@section('main')

Ini Kelas

<div class="container-fluid p-0">

    <div class="row justify-content-end">
        <div class="col-3 text-end">
            {{-- <a class="btn btn-success"><i data-feather="plus-circle"></i> Create</a> --}}
            <button class="btn btn-success"><i class="fas fa-plus-circle"></i> Create</button>
        </div>
    </div>
    
    <div class="row mt-2">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table id="datatables-reponsive" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Kelas</th>
                                <th>Peserta</th>
                                <th>Jurusan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>X MIPA 1</td>
                                <td>30</td>
                                <td>MIPA</td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-primary"><i data-feather="edit-2"></i></a>
                                    <a href="#" class="btn btn-sm btn-danger btn-delete" data-id="#"><i data-feather="trash-2"></i></i></a> 
                                </td>
                            </tr>
                            <tr>
                                <td>X MIPA 5</td>
                                <td>32</td>
                                <td>MIPA</td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-primary"><i data-feather="edit-2"></i></a>
                                    <a href="#" class="btn btn-sm btn-danger btn-delete" data-id="#"><i data-feather="trash-2"></i></i></a> 
                                </td>
                            </tr>
                            <tr>
                                <td>X IPS 3</td>
                                <td>29</td>
                                <td>IPS</td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-primary"><i data-feather="edit-2"></i></a>
                                    <a href="#" class="btn btn-sm btn-danger btn-delete" data-id="#"><i data-feather="trash-2"></i></i></a> 
                                </td>
                            </tr>
                            <tr>
                                <td>XI IPS 3</td>
                                <td>32</td>
                                <td>IPS</td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-primary"><i data-feather="edit-2"></i></a>
                                    <a href="#" class="btn btn-sm btn-danger btn-delete" data-id="#"><i data-feather="trash-2"></i></i></a> 
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