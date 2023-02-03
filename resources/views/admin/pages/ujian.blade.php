@extends('admin.index')
@section('main')
    <div class="container-fluid p-0">

        <div class="row">
            <div class="col-8 col-xl-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tambahkan Ujian</h3>
                    </div>
                    <div class="card-body">
                        <form>
                            {{-- Nama Mapel --}}
                            <div class="mb-3">
                                <label class="form-label">Nama Mata Pelajaran</label>
                                <input type="text" class="form-control" rows="1" name="nama">
                            </div>
                            {{-- Kelas --}}
                            <div class="mb-3">
                                <label class="form-label">Kelas</label>
                                <select class="form-control choices-single" name="kelas">
                                    <option value="">X</option>
                                    <option value="">XI</option>
                                    <option value="">XII</option>
                                </select>
                            </div>
                            {{-- Waktu Mulai Ujian --}}
                            <div class="mb-3">
                                <label class="form-label">Waktu Mulai Ujian</label>
                                <input type="text" class="form-control " id="waktu_mulai" placeholder="pilih tanggal"
                                    name="waktu_mulai" />
                            </div>
                            {{-- Waktu Berakhir Ujian --}}

                            <div class="mb-3">
                                <label class="form-label">Durasi</label>
                                <input type="number" id="duration" class="form-control" rows="1" name="nama">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Waktu Berakhir Ujian</label>
                                <input type="text" class="form-control " id="waktu_selesai" placeholder="pilih tanggal"
                                    name="waktu_selesai" disabled />
                            </div>
                            <button type="submit" class="btn btn-primary" name="tambahkan">Tambahkan</button>
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
                                    <th>Kelas</th>
                                    <th>Peserta</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Fisika</td>
                                    <td>XII</td>
                                    <td>210</td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-primary"><i data-feather="edit-2"></i></a>
                                        <a href="#" class="btn btn-sm btn-danger btn-delete" data-id="#"><i
                                                data-feather="trash-2"></i></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Fisika</td>
                                    <td>X</td>
                                    <td>311</td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-primary"><i data-feather="edit-2"></i></a>
                                        <a href="#" class="btn btn-sm btn-danger btn-delete" data-id="#"><i
                                                data-feather="trash-2"></i></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Ekonomi</td>
                                    <td>XI</td>
                                    <td>140</td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-primary"><i data-feather="edit-2"></i></a>
                                        <a href="#" class="btn btn-sm btn-danger btn-delete" data-id="#"><i
                                                data-feather="trash-2"></i></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Geografi</td>
                                    <td>X</td>
                                    <td>150</td>
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
            new Choices(document.querySelector(".choices-single"));

            var waktu_mulai, durasi;
            flatpickr("#waktu_mulai", {
                enableTime: true,
                dateFormat: "Y-m-d H:i",
                time_24hr: true,
                onChange: function(selectedDates, dateStr, instance) {
                    waktu_mulai = dateStr;
                },

            });
            $("#duration").on("input", function() {
                durasi = $("#duration").val();
                var date = new Date(waktu_mulai);
                date.setMinutes(date.getMinutes()+durasi); 
                flatpickr("#waktu_selesai", {
                    enableTime: true,
                    dateFormat: "Y-m-d H:i",
                    time_24hr: true,
                    defaultDate : date
                });
            });


            // Flatpickr



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
