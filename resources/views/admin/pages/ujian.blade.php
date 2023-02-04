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
                        <h3 class="card-title">Tambahkan Ujian</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('ujian.store') }}" method="POST">
                            @csrf
                            {{-- Nama Mapel --}}
                            <div class="mb-3">
                                <label class="form-label">Mata Pelajaran</label>
                                <select class="form-control choices-single" name="mapel_id">
                                    @foreach ($mapel as $item)

                                        <option value="{!!$item->id !!}">{!!$item->nama !!}</option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- Kelas --}}
                            <div class="mb-3">
                                <label class="form-label">Kelas</label>
                                <select class="form-control choices-single" name="kelas_id">
                                    @foreach ($kelas as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @endforeach
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
                                    name="waktu_selesai" readonly />
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
                                    <th>Token</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datas as $item)
                                    <tr>
                                        <td>{{ $item->mapel }}</td>
                                        <td>{{ $item->kelas }}</td>
                                        <td>{{ $item->token }}</td>
                                        <td>
                                            <a data-bs-toggle="modal" data-bs-target="#defaultModalDanger   "
                                                class="btn btn-sm btn-danger btn-delete" data-id="{{ $item->id }}"><i
                                                    data-feather="trash-2"></i></i></a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="defaultModalDanger" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="" id="delete" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Perhatian</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <div class="modal-body m-3">
                        <p class="mb-0">Apakah anda yakin ingin menghapus data?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Save changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
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
                var newDateObj = moment(date).add(durasi, 'm').toDate();
    
                flatpickr("#waktu_selesai", {
                    enableTime: true,
                    dateFormat: "Y-m-d H:i",
                    time_24hr: true,
                    defaultDate: newDateObj
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
            $(".btn-delete").click(function() {
                var id = $(this).data("id");
                $("#delete").attr('action', '/admin/ujian/' + id)
            });
        });
    </script>
@endsection
