@extends('admin.index')
@section('main')

<div class="container-fluid p-0">

     {{-- Form Input --}}
     <div class="row">
        <div class="col-8 col-xl-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Tambahkan Kelas</h3>
                </div>
                <div class="card-body">
                    <form>
                        <div class="mb-3">
                            <label class="form-label">Nama Kelas</label>
                            <input type = "text" class="form-control" rows="1" name="nama">
                        </div>
                        <button type="submit" class="btn btn-primary" id="tambahkan" name="tambahkan">Tambahkan</button>
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
                                <th>Kelas</th>
                                <th>Peserta</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>X MIPA 1</td>
                                <td>30</td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-primary"><i data-feather="edit-2"></i></a>
                                    <a href="#" class="btn btn-sm btn-danger btn-delete" data-id="#"><i data-feather="trash-2"></i></i></a> 
                                </td>
                            </tr>
                            <tr>
                                <td>X MIPA 5</td>
                                <td>32</td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-primary"><i data-feather="edit-2"></i></a>
                                    <a href="#" class="btn btn-sm btn-danger btn-delete" data-id="#"><i data-feather="trash-2"></i></i></a> 
                                </td>
                            </tr>
                            <tr>
                                <td>X IPS 3</td>
                                <td>29</td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-primary"><i data-feather="edit-2"></i></a>
                                    <a href="#" class="btn btn-sm btn-danger btn-delete" data-id="#"><i data-feather="trash-2"></i></i></a> 
                                </td>
                            </tr>
                            <tr>
                                <td>XI IPS 3</td>
                                <td>32</td>
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