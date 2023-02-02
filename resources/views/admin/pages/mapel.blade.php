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
                    <h3 class="card-title">Tambahkan Mata Pelajaran</h3>
                </div>
                <div class="card-body">
                    <form>
                        <div class="mb-3">
                            <label class="form-label">Nama Mata Pelajaran</label>
                            <input type = "text" class="form-control" rows="1">
                        </div>
                        {{-- Kelas --}}
                        <div class="mb-3">
                            <label class="form-label">Kelas</label>
                            <select class="form-control choices-single">
                                <option value="">X</option>
                                <option value="">XI</option>
                                <option value="">XII</option>
                            </select>
                        </div>
                        {{-- Guru Pengampu --}}
                        <div class="mb-3">
                            <label class="form-label">Guru Pengampu</label>
                            <select class="form-control choices-single">
                                <optgroup label="Kelas X">
                                    <option value="">Dr. Sholikin M.Pd</option>
                                    <option value="">Ahmad Syahroni M.Ag</option>
                                    <option value="">Khusnul Khatimah S.T, M.Pd</option>
                                </optgroup>
                                <optgroup label="Kelas XI">
                                    <option value="">Tono M.Pd</option>
                                    <option value="">Drs. Hj. Ilham Nurudin M.Ag</option>
                                    <option value="">Saifuddin M.T</option>
                                </optgroup>
                                <optgroup label="Kelas XII">
                                    <option value="">Hj. M. Syaifullah M.Pd</option>
                                    <option value="">Kevin De Bruyne M.Pd</option>
                                    <option value="">Rossy Valentinudin S.T, M.Pd</option>
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
                                <th>Mata Pelajaran</th>
                                <th>Kode</th>
                                <th>Jurusan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Matematika</td>
                                <td>0001</td>
                                <td>MIPA</td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-primary"><i data-feather="edit-2"></i></a>
                                    <a href="#" class="btn btn-sm btn-danger btn-delete" data-id="#"><i data-feather="trash-2"></i></i></a> 
                                </td>
                            </tr>
                            <tr>
                                <td>Fisika</td>
                                <td>0002</td>
                                <td>MIPA</td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-primary"><i data-feather="edit-2"></i></a>
                                    <a href="#" class="btn btn-sm btn-danger btn-delete" data-id="#"><i data-feather="trash-2"></i></i></a> 
                                </td>
                            </tr>
                            <tr>
                                <td>Sejarah</td>
                                <td>0021</td>
                                <td>IPS</td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-primary"><i data-feather="edit-2"></i></a>
                                    <a href="#" class="btn btn-sm btn-danger btn-delete" data-id="#"><i data-feather="trash-2"></i></i></a> 
                                </td>
                            </tr>
                            <tr>
                                <td>Ekonomi</td>
                                <td>0022</td>
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