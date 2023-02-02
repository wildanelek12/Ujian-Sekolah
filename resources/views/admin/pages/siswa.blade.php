@extends('admin.index')
@section('main')

<div class="container-fluid p-0">

    {{-- Form Input --}}
    <div class="row">
        <div class="col-8 col-xl-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Tambahkan Siswa</h3>
                </div>
                <div class="card-body">
                    <form>
                        <div class="mb-3">
                            <label class="form-label">Nama</label>
                            <input type = "text" class="form-control" rows="1">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">NIS</label>
                            <input type = "text" class="form-control" rows="1">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Kelas</label>
                            <select class="form-control choices-single">
                                <optgroup label="Kelas X">
                                    <option value="">X MIPA 1</option>
                                    <option value="">X MIPA 2</option>
                                    <option value="">X MIPA 3</option>
                                    <option value="">X MIPA 4</option>
                                    <option value="">X MIPA 5</option>
                                    <option value="">X IPS 1</option>
                                    <option value="">X IPS 2</option>
                                    <option value="">X IPS 3</option>
                                </optgroup>
                                <optgroup label="Kelas XI">
                                    <option value="">XI MIPA 1</option>
                                    <option value="">XI MIPA 2</option>
                                    <option value="">XI MIPA 3</option>
                                    <option value="">XI MIPA 4</option>
                                    <option value="">XI MIPA 5</option>
                                    <option value="">XI IPS 1</option>
                                    <option value="">XI IPS 2</option>
                                    <option value="">XI IPS 3</option>
                                </optgroup>
                                <optgroup label="Kelas XII">
                                    <option value="">XII MIPA 1</option>
                                    <option value="">XII MIPA 2</option>
                                    <option value="">XII MIPA 3</option>
                                    <option value="">XII MIPA 4</option>
                                    <option value="">XII MIPA 5</option>
                                    <option value="">XII IPS 1</option>
                                    <option value="">XII IPS 2</option>
                                    <option value="">XII IPS 3</option>
                                </optgroup>
                            </select>
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
                                <th>NIS</th>
                                <th>Kelas</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Solichul N</td>
                                <td>16601</td>
                                <td>X MIPA 1</td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-primary"><i data-feather="edit-2"></i></a>
                                    <a href="#" class="btn btn-sm btn-danger btn-delete" data-id="#"><i data-feather="trash-2"></i></i></a> 
                                </td>
                            </tr>
                            <tr>
                                <td>M Asadi</td>
                                <td>16602</td>
                                <td>XI MIPA 1</td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-primary"><i data-feather="edit-2"></i></a>
                                    <a href="#" class="btn btn-sm btn-danger btn-delete" data-id="#"><i data-feather="trash-2"></i></i></a> 
                                </td>
                            </tr>
                            <tr>
                                <td>Kenny V</td>
                                <td>16620</td>
                                <td>X IPS 1</td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-primary"><i data-feather="edit-2"></i></a>
                                    <a href="#" class="btn btn-sm btn-danger btn-delete" data-id="#"><i data-feather="trash-2"></i></i></a> 
                                </td>
                            </tr>
                            <tr>
                                <td>Maulana</td>
                                <td>16621</td>
                                <td>X IPS 2</td>
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