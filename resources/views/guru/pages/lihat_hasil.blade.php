@extends('guru.index')
@section('main')

<div class="row">
    <div class="col-12">
        <h3>Hasil Ujian - MATEMATIKA X</h3>
    </div>
</div>

<div class="row">
    <div class="row mt-2">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table id="datatables-reponsive" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Kelas</th>
                                <th>Nilai</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Tomen</td>
                                <td>X MIPA 7</td>
                                <td>90</td>
                            </tr>
                            <tr>
                                <td>Felix</td>
                                <td>X MIPA 6</td>
                                <td>70</td>
                            </tr>
                            <tr>
                                <td>Yapi</td>
                                <td>X MIPA 1</td>
                                <td>75</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-3">
        <a href="{{route('guru.hasil')}}"><button class="btn btn-success"><i></i> Kembali</button></a>
        <button class="btn btn-danger"><i></i> Print</button>
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