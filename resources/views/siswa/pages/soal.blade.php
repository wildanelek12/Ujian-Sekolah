@extends('siswa.index')
@section('main')
    <div class="row">
        <div class="col-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">No. ...</h5>
                </div>
                <div class="card-body mb-3">
                    <div>
                        <h3 id="soal">Soal akan dimunculkan pada bagian ini</h3>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <label class="form-check">
                        <input class="form-check-input" type="radio" value="a" name="opsi">
                        <span class="form-check-label" id="opsi_a">
                            Opsi A
                        </span>
                    </label>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <label class="form-check">
                        <input class="form-check-input" type="radio" value="b" name="opsi">
                        <span class="form-check-label" id="opsi_b">
                            Opsi B
                        </span>
                    </label>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <label class="form-check">
                        <input class="form-check-input" type="radio" value="c" name="opsi">
                        <span class="form-check-label" id="opsi_c">
                            Opsi C
                        </span>
                    </label>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <label class="form-check">
                        <input class="form-check-input" type="radio" value="d" name="opsi">
                        <span class="form-check-label" id="opsi_d">
                            Opsi D
                        </span>
                    </label>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <label class="form-check">
                        <input class="form-check-input" type="radio" value="e" name="opsi">
                        <span class="form-check-label" id="opsi_e">
                            Opsi E
                        </span>
                    </label>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0 ">No Soal</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <button class="btn btn-primary" id="hari">90:00</button>

                        </div>
                        <div class="col-3">
                            <button class="btn btn-primary" id="jam">90:00</button>

                        </div>
                        <div class="col-3">
                            <button class="btn btn-primary" id="menit">90:00</button>
                        </div>
                        <div class="col-3">
                            <button class="btn btn-primary" id="detik">90:00</button>
                        </div>

                    </div>
                    <div class="row" id="nav_soal">
                        {{-- <div class="col-1 gx-5 gy-3">
                            <button class="btn btn-success"> 1</button>
                        </div> --}}
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <button class="btn btn-success">Submit</button>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            <button id="previous" class="btn btn-primary">Previous</button>
        </div>
        <div class="col-4 text-end">
            <button id="next" class="btn btn-primary">Next</button>
        </div>
    </div>
    <div class="modal fade" id="modalFinish" tabindex="-1" role="dialog" aria-hidden="true" data-bs-keyboard="false"
        data-bs-backdrop="static">
        <form action="{{ route('siswa.result.store') }}" id="submitResult" method="POST">
            <div class="modal-dialog modal-dialog-centered" role="document">

                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Perhatian</h5>
                    </div>
                    <div class="modal-body m-3">
                        <p class="mb-0">Apakah anda yakin ingin menyelesaikan ujian ?</p>
                        <input type="hidden" value="{{ Auth::user()->id }}" name="user_id" />
                        <input type="hidden" value="{{ $ujian_id }}"name="ujian_id" />
                        <input type="hidden" id="nilai" name="nilai" />
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="closeModal" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>

            </div>
        </form>
    </div>

    <script>
        $(document).ready(function() {
            var index = 0;
            var soal = @json($datas);
            console.log(soal);
            let containerNavSoal = "";
            let answer = [];

            setSoal();
            setNavSoal();



            $(".btn_soal").click(function() {
                if ($('input[name="opsi"]').is(':checked')) {
                    answer[index] = $('input[name="opsi"]:checked').val();
                    $("#btn_soal_" + index).removeClass("btn-secondary").addClass("btn-success")
                }

                if (answer[index] != null) {
                    $("#btn_soal_" + index).removeClass("btn-primary").addClass("btn-success")
                } else {
                    $("#btn_soal_" + index).removeClass("btn-primary").addClass("btn-secondary")
                }

                index = $(this).data('id')
                if (answer[index] != null) {
                    $("#btn_soal_" + index).removeClass("btn-success").addClass("btn-primary")
                } else {
                    $("#btn_soal_" + index).removeClass("btn-secondary").addClass("btn-primary")
                }

                setSoal()
            });


            $("#next").click(function() {
                if (index == soal.length - 1) {
                    answer[index] = $('input[name="opsi"]:checked').val();
                    $('#modalFinish').modal('toggle');
                    onFinishSoal();

                } else {
                    if ($('input[name="opsi"]').is(':checked')) {
                        answer[index] = $('input[name="opsi"]:checked').val();
                        $("#btn_soal_" + index).removeClass("btn-secondary").addClass("btn-success")
                    }
                    if (answer[index] != null) {
                        $("#btn_soal_" + index).removeClass("btn-primary").addClass("btn-success")
                    } else {
                        $("#btn_soal_" + index).removeClass("btn-primary").addClass("btn-secondary")
                    }
                    index++
                    if (answer[index] != null) {
                        $("#btn_soal_" + index).removeClass("btn-success").addClass("btn-primary")
                    } else {
                        $("#btn_soal_" + index).removeClass("btn-secondary").addClass("btn-primary")
                    }
                    setSoal()
                }




            });

            function onFinishSoal() {
                var nilai = 0;
                var point = 100 / answer.length;

                for (let i = 0; i < answer.length; i++) {
                    if (soal[i].key.toLowerCase() == answer[i]) {
                        nilai += point;
                    } else if (answer[i] == null) {
                        nilai += 0
                    } else {
                        nilai += 0;
                    }
                }
                $('#nilai').val(nilai);
            }


            $("#previous").click(function() {
                if (index == 0) {
                    answer[index] = $('input[name="opsi"]:checked').val();
                } else {
                    if ($('input[name="opsi"]').is(':checked')) {
                        answer[index] = $('input[name="opsi"]:checked').val();
                        $("#btn_soal_" + index).removeClass("btn-secondary").addClass("btn-success")
                    }
                    if (answer[index] != null) {
                        $("#btn_soal_" + index).removeClass("btn-primary").addClass("btn-success")
                    } else {
                        $("#btn_soal_" + index).removeClass("btn-primary").addClass("btn-secondary")
                    }
                    index--
                    if (answer[index] != null) {
                        $("#btn_soal_" + index).removeClass("btn-success").addClass("btn-primary")
                    } else {
                        $("#btn_soal_" + index).removeClass("btn-secondary").addClass("btn-primary")
                    }
                    setSoal()
                }
            });

            function setSoal() {
                if (index == soal.length - 1) {
                    $("#next").html('Selesai')
                    $("#next").removeClass('btn-primary').addClass("btn-success")
                } else {
                    $("#next").html('next')
                    $("#next").addClass('btn-primary').removeClass("btn-success")
                }

                $('input[type="radio"]').prop('checked', false);
                if (answer[index] != null) {
                    $('input[type="radio"][value="' + answer[index] + '"]').prop('checked', true);
                }
                $('#soal').html(soal[index].soal)
                $('#opsi_a').html(soal[index].opsi_a)
                $('#opsi_b').html(soal[index].opsi_b)
                $('#opsi_c').html(soal[index].opsi_c)
                $('#opsi_d').html(soal[index].opsi_d)
                $('#opsi_e').html(soal[index].opsi_e)
            }

            function setNavSoal() {
                for (var i = 0; i < soal.length; i++) {
                    if (i == index) {
                        containerNavSoal += " <div class='col-1 gx-5 gy-3'>" +
                            " <button class='btn btn-primary btn_soal'  id='btn_soal_" + i + "' data-id=" + (i) +
                            ">" +
                            (i + 1) + " </button>" +
                            " </div> ";
                        $("#nav_soal").html(containerNavSoal);
                    } else {
                        containerNavSoal += " <div class='col-1 gx-5 gy-3'>" +
                            " <button class='btn btn-secondary btn_soal'  id='btn_soal_" + i + "' data-id=" + (i) +
                            ">" +
                            (i + 1) + " </button>" +
                            " </div> ";
                        $("#nav_soal").html(containerNavSoal);
                    }

                }

            }

            console.log();
            var waktu_mulai = {!! json_encode($waktu_mulai) !!};
            var waktu_selesai = {!! json_encode($waktu_selesai) !!};


            var countDownDate = new Date(waktu_selesai).getTime();

            function timePart(val, text, color = "black") {
                return `<p style="color:${color};">${val}<div>${text}</div></p>`
            }

            // Update the count down every 1 second
            var x = setInterval(function() {

                // Get todays date and time
                var now = new Date().getTime();

                // Find the distance between now and the count down date
                var distance = countDownDate - now;

                // Time calculations for days, hours, minutes and seconds
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);



                // Display the result in the element with id="demo"

                let res = timePart(days, 'days') + timePart(hours, 'hours') + timePart(minutes, 'Mins') +
                    timePart(seconds, 'Seconds', 'red');

                document.getElementById("hari").innerHTML = days + " Hari"
                document.getElementById("jam").innerHTML = hours + " Jam"
                document.getElementById("menit").innerHTML = minutes + " Menit"
                document.getElementById("detik").innerHTML = seconds + " Detik"
                // document.getElementById("timer").innerHTML = res

                // If the count down is finished, write some text 
                if (distance < 0) {
                    clearInterval(x);
                    answer[index] = $('input[name="opsi"]:checked').val();
                    $('#modalFinish').modal('toggle');
                    $('#closeModal').hide();
                    onFinishSoal();



                    // document.getElementById("timer").innerHTML = "EXPIRED";
                }
            }, 1000);




        })
    </script>
@endsection
