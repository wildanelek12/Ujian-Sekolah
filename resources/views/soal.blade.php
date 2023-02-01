@extends('admin.index')
@section('main')
    <div class="row">
        <div class="col-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Radios</h5>
                </div>
                <div class="card-body">
                    <div>
                        <h3 id="soal">Ini Soal lorem ipsum dolore</h3>
                        <label class="form-check mt-4">
                            <input class="form-check-input" type="radio" value="a" name="opsi">
                            <span class="form-check-label" id="opsi_a">
                                Opsi A
                            </span>
                        </label>
                        <label class="form-check">
                            <input class="form-check-input" type="radio" value="b" name="opsi">
                            <span class="form-check-label" id="opsi_b">
                                Opsi B
                            </span>
                        </label>
                        <label class="form-check">
                            <input class="form-check-input" type="radio" value="c" name="opsi">
                            <span class="form-check-label" id="opsi_c">
                                Opsi C
                            </span>
                        </label>
                        <label class="form-check">
                            <input class="form-check-input" type="radio" value="d" name="opsi">
                            <span class="form-check-label" id="opsi_d">
                                Opsi D
                            </span>
                        </label>
                        <label class="form-check">
                            <input class="form-check-input" type="radio" value="e" name="opsi">
                            <span class="form-check-label" id="opsi_e">
                                Opsi E
                            </span>
                        </label>
                        <button id="previous">Previous</button>
                        <button id="next">Next</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">No Soal</h5>
                </div>
                <div class="card-body">
                    <div class="row" id="nav_soal">
                        {{-- <div class="col-1 gx-5 gy-3">
                            <button class="btn btn-success"> 1</button>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            var index = 0;
            var soal = @json($soals);
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
                if (index >= soal.length - 1) {
                    answer[index] = $('input[name="opsi"]:checked').val();
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
                    console.log("ini kunci jawaban : " + soal[i].key);
                    console.log("ini jawaban anda : " + answer[i]);


                    if (soal[i].key == answer[i]) {
                        nilai += point;
                    } else if (answer[i]==null) {
                        nilai+=0
                    } else {
                        nilai += 0;
                    }
                }
                alert(nilai);
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




        })
    </script>
@endsection
