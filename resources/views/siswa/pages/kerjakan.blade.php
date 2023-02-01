@extends('siswa.index')
@section('main')
    
<div class="container-fluid p-0">

    <div class="row mt-2">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table id="datatables-reponsive" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Mata Pelajaran</th>
                                <th>Durasi</th>
                                <th>Tanggal</th>
                                <th>Waktu</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Fisika</td>
                                <td>90 Menit</td>
                                <td>21 Februari</td>
                                <td>08.00 - 09.30</td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-primary"><i data-feather="edit-2"></i> Mulai</a>
                                </td>
                            </tr>
                            <tr>
                                <td>Bahasa Indonesia</td>
                                <td>60 Menit</td>
                                <td>21 Februari</td>
                                <td>10.00 - 11.00</td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-primary"><i data-feather="edit-2"></i> Mulai</a>
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