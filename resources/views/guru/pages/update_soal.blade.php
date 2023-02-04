@extends('guru.index')
@section('main')
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
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <div class="alert-message">
                <strong>Selamat</strong> {{ session('success') }}<br>
            </div>
        </div>
    @endif
    <form action="{{ route('guru.soal.update', ['soal' => $data->id]) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-12 text-center mb-3">
                <h2>Tambahkan Soal</h2>
            </div>
        </div>
        {{-- Soal --}}
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Soal</h5>
                    </div>
                    <div class="card-body">
                        <div class="clearfix">
                            <div id="quill-toolbar">
                                <span class="ql-formats">
                                    <select class="ql-font"></select>
                                    <select class="ql-size"></select>
                                </span>
                                <span class="ql-formats">
                                    <button class="ql-bold"></button>
                                    <button class="ql-italic"></button>
                                    <button class="ql-underline"></button>
                                    <button class="ql-strike"></button>
                                </span>
                                <span class="ql-formats">
                                    <select class="ql-color"></select>
                                    <select class="ql-background"></select>
                                </span>
                                <span class="ql-formats">
                                    <button class="ql-script" value="sub"></button>
                                    <button class="ql-script" value="super"></button>
                                </span>
                                <span class="ql-formats">
                                    <button class="ql-header" value="1"></button>
                                    <button class="ql-header" value="2"></button>
                                    <button class="ql-blockquote"></button>
                                    <button class="ql-code-block"></button>
                                </span>
                                <span class="ql-formats">
                                    <button class="ql-list" value="ordered"></button>
                                    <button class="ql-list" value="bullet"></button>
                                    <button class="ql-indent" value="-1"></button>
                                    <button class="ql-indent" value="+1"></button>
                                </span>
                                <span class="ql-formats">
                                    <button class="ql-direction" value="rtl"></button>
                                    <select class="ql-align"></select>
                                </span>
                                <span class="ql-formats">
                                    <button class="ql-link"></button>
                                    <button class="ql-image"></button>
                                    <button class="ql-video"></button>
                                </span>
                                <span class="ql-formats">
                                    <button class="ql-clean"></button>
                                </span>
                            </div>
                            <div id="soal">
                                {!! $data->soal !!}
                            </div>
                            <input type="hidden" id="soal_form" value="{!! $data->soal !!}"  name="soal" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Opsi 1 --}}
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Opsi Jawaban A</h5>
                    </div>
                    <div class="card-body">
                        <div class="clearfix">
                            <div id="quill-toolbar1">
                                <span class="ql-formats">
                                    <select class="ql-font"></select>
                                    <select class="ql-size"></select>
                                </span>
                                <span class="ql-formats">
                                    <button class="ql-bold"></button>
                                    <button class="ql-italic"></button>
                                    <button class="ql-underline"></button>
                                    <button class="ql-strike"></button>
                                </span>
                                <span class="ql-formats">
                                    <select class="ql-color"></select>
                                    <select class="ql-background"></select>
                                </span>
                                <span class="ql-formats">
                                    <button class="ql-script" value="sub"></button>
                                    <button class="ql-script" value="super"></button>
                                </span>
                                <span class="ql-formats">
                                    <button class="ql-header" value="1"></button>
                                    <button class="ql-header" value="2"></button>
                                    <button class="ql-blockquote"></button>
                                    <button class="ql-code-block"></button>
                                </span>
                                <span class="ql-formats">
                                    <button class="ql-list" value="ordered"></button>
                                    <button class="ql-list" value="bullet"></button>
                                    <button class="ql-indent" value="-1"></button>
                                    <button class="ql-indent" value="+1"></button>
                                </span>
                                <span class="ql-formats">
                                    <button class="ql-direction" value="rtl"></button>
                                    <select class="ql-align"></select>
                                </span>
                                <span class="ql-formats">
                                    <button class="ql-link"></button>
                                    <button class="ql-image"></button>
                                    <button class="ql-video"></button>
                                </span>
                                <span class="ql-formats">
                                    <button class="ql-clean"></button>
                                </span>
                            </div>
                            <div id="key1">
                                {!! $data->opsi_a !!}
                            </div>
                            <input type="hidden" id="opsi_a" value="{!! $data->opsi_a !!}"  name="opsi_a" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Opsi 2 --}}
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Opsi Jawaban B</h5>
                    </div>
                    <div class="card-body">
                        <div class="clearfix">
                            <div id="quill-toolbar2">
                                <span class="ql-formats">
                                    <select class="ql-font"></select>
                                    <select class="ql-size"></select>
                                </span>
                                <span class="ql-formats">
                                    <button class="ql-bold"></button>
                                    <button class="ql-italic"></button>
                                    <button class="ql-underline"></button>
                                    <button class="ql-strike"></button>
                                </span>
                                <span class="ql-formats">
                                    <select class="ql-color"></select>
                                    <select class="ql-background"></select>
                                </span>
                                <span class="ql-formats">
                                    <button class="ql-script" value="sub"></button>
                                    <button class="ql-script" value="super"></button>
                                </span>
                                <span class="ql-formats">
                                    <button class="ql-header" value="1"></button>
                                    <button class="ql-header" value="2"></button>
                                    <button class="ql-blockquote"></button>
                                    <button class="ql-code-block"></button>
                                </span>
                                <span class="ql-formats">
                                    <button class="ql-list" value="ordered"></button>
                                    <button class="ql-list" value="bullet"></button>
                                    <button class="ql-indent" value="-1"></button>
                                    <button class="ql-indent" value="+1"></button>
                                </span>
                                <span class="ql-formats">
                                    <button class="ql-direction" value="rtl"></button>
                                    <select class="ql-align"></select>
                                </span>
                                <span class="ql-formats">
                                    <button class="ql-link"></button>
                                    <button class="ql-image"></button>
                                    <button class="ql-video"></button>
                                </span>
                                <span class="ql-formats">
                                    <button class="ql-clean"></button>
                                </span>
                            </div>
                            <div id="key2">
                                {!! $data->opsi_b !!}
                            </div>
                            <input type="hidden" id="opsi_b" value="{!! $data->opsi_b!!}"  name="opsi_b" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Opsi 3 --}}
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Opsi Jawaban C</h5>
                    </div>
                    <div class="card-body">
                        <div class="clearfix">
                            <div id="quill-toolbar3">
                                <span class="ql-formats">
                                    <select class="ql-font"></select>
                                    <select class="ql-size"></select>
                                </span>
                                <span class="ql-formats">
                                    <button class="ql-bold"></button>
                                    <button class="ql-italic"></button>
                                    <button class="ql-underline"></button>
                                    <button class="ql-strike"></button>
                                </span>
                                <span class="ql-formats">
                                    <select class="ql-color"></select>
                                    <select class="ql-background"></select>
                                </span>
                                <span class="ql-formats">
                                    <button class="ql-script" value="sub"></button>
                                    <button class="ql-script" value="super"></button>
                                </span>
                                <span class="ql-formats">
                                    <button class="ql-header" value="1"></button>
                                    <button class="ql-header" value="2"></button>
                                    <button class="ql-blockquote"></button>
                                    <button class="ql-code-block"></button>
                                </span>
                                <span class="ql-formats">
                                    <button class="ql-list" value="ordered"></button>
                                    <button class="ql-list" value="bullet"></button>
                                    <button class="ql-indent" value="-1"></button>
                                    <button class="ql-indent" value="+1"></button>
                                </span>
                                <span class="ql-formats">
                                    <button class="ql-direction" value="rtl"></button>
                                    <select class="ql-align"></select>
                                </span>
                                <span class="ql-formats">
                                    <button class="ql-link"></button>
                                    <button class="ql-image"></button>
                                    <button class="ql-video"></button>
                                </span>
                                <span class="ql-formats">
                                    <button class="ql-clean"></button>
                                </span>
                            </div>
                            <div id="key3">
                                {!! $data->opsi_c !!}
                            </div>
                            <input type="hidden" value="{!! $data->opsi_c !!}"  id="opsi_c" name="opsi_c" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Opsi 4 --}}
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Opsi Jawaban D</h5>
                    </div>
                    <div class="card-body">
                        <div class="clearfix">
                            <div id="quill-toolbar4">
                                <span class="ql-formats">
                                    <select class="ql-font"></select>
                                    <select class="ql-size"></select>
                                </span>
                                <span class="ql-formats">
                                    <button class="ql-bold"></button>
                                    <button class="ql-italic"></button>
                                    <button class="ql-underline"></button>
                                    <button class="ql-strike"></button>
                                </span>
                                <span class="ql-formats">
                                    <select class="ql-color"></select>
                                    <select class="ql-background"></select>
                                </span>
                                <span class="ql-formats">
                                    <button class="ql-script" value="sub"></button>
                                    <button class="ql-script" value="super"></button>
                                </span>
                                <span class="ql-formats">
                                    <button class="ql-header" value="1"></button>
                                    <button class="ql-header" value="2"></button>
                                    <button class="ql-blockquote"></button>
                                    <button class="ql-code-block"></button>
                                </span>
                                <span class="ql-formats">
                                    <button class="ql-list" value="ordered"></button>
                                    <button class="ql-list" value="bullet"></button>
                                    <button class="ql-indent" value="-1"></button>
                                    <button class="ql-indent" value="+1"></button>
                                </span>
                                <span class="ql-formats">
                                    <button class="ql-direction" value="rtl"></button>
                                    <select class="ql-align"></select>
                                </span>
                                <span class="ql-formats">
                                    <button class="ql-link"></button>
                                    <button class="ql-image"></button>
                                    <button class="ql-video"></button>
                                </span>
                                <span class="ql-formats">
                                    <button class="ql-clean"></button>
                                </span>
                            </div>
                            <div id="key4">
                                {!! $data->opsi_d !!}
                            </div>
                            <input type="hidden" value="{!! $data->opsi_d !!}" id="opsi_d" name="opsi_d" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Opsi 5 --}}
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Opsi Jawaban E</h5>
                    </div>
                    <div class="card-body">
                        <div class="clearfix">
                            <div id="quill-toolbar5">
                                <span class="ql-formats">
                                    <select class="ql-font"></select>
                                    <select class="ql-size"></select>
                                </span>
                                <span class="ql-formats">
                                    <button class="ql-bold"></button>
                                    <button class="ql-italic"></button>
                                    <button class="ql-underline"></button>
                                    <button class="ql-strike"></button>
                                </span>
                                <span class="ql-formats">
                                    <select class="ql-color"></select>
                                    <select class="ql-background"></select>
                                </span>
                                <span class="ql-formats">
                                    <button class="ql-script" value="sub"></button>
                                    <button class="ql-script" value="super"></button>
                                </span>
                                <span class="ql-formats">
                                    <button class="ql-header" value="1"></button>
                                    <button class="ql-header" value="2"></button>
                                    <button class="ql-blockquote"></button>
                                    <button class="ql-code-block"></button>
                                </span>
                                <span class="ql-formats">
                                    <button class="ql-list" value="ordered"></button>
                                    <button class="ql-list" value="bullet"></button>
                                    <button class="ql-indent" value="-1"></button>
                                    <button class="ql-indent" value="+1"></button>
                                </span>
                                <span class="ql-formats">
                                    <button class="ql-direction" value="rtl"></button>
                                    <select class="ql-align"></select>
                                </span>
                                <span class="ql-formats">
                                    <button class="ql-link"></button>
                                    <button class="ql-image"></button>
                                    <button class="ql-video"></button>
                                </span>
                                <span class="ql-formats">
                                    <button class="ql-clean"></button>
                                </span>
                            </div>
                            <div id="key5">
                                {!! $data->opsi_e !!}
                            </div>
                            <input type="hidden" id="opsi_e" value="{!! $data->opsi_e !!}"  name="opsi_e" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Kunci Jawaban --}}
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Kunci Jawaban</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <select class="form-control choices-single" name="key" id="select_key">
                                <option value="A" {{ $data->key == 'A' ? 'selected' : '' }}>A</option>
                                <option value="B" {{ $data->key == 'B' ? 'selected' : '' }}>B</option>
                                <option value="C" {{ $data->key == 'C' ? 'selected' : '' }}>C</option>
                                <option value="D" {{ $data->key == 'D' ? 'selected' : '' }}>D</option>
                                <option value="E" {{ $data->key == 'E' ? 'selected' : '' }}>E</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Button --}}

        <div class="row">
            <div class="col-6">
                <a href="{{ route('guru.listSoal', ['id' => $data->id]) }}"><button
                        class="btn btn-primary">Kembali</button></a>
            </div>
            <div class="col-6 text-end">
                <input type="hidden" id="opsi_e" value="{{$data->mapel_id}}"  name="mapel_id" />
                <button type="submit" class="btn btn-success"><i class=""></i>
                    Update</button>
            </div>
        </div>
    </form>

    <script src="js/app.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Choices.js
            new Choices(document.querySelector(".choices-single"));
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var soal = new Quill("#soal", {
                modules: {
                    toolbar: "#quill-toolbar"
                },
                placeholder: "Ketik disini",
                theme: "snow"
            });
            soal.on('text-change', function(delta, oldDelta, source) {
                document.getElementById("soal_form").value = soal.root.innerHTML;
            });
            var opsi_a = new Quill("#key1", {
                modules: {
                    toolbar: "#quill-toolbar1"
                },
                placeholder: "Ketik disini",
                theme: "snow"
            });
            opsi_a.on('text-change', function(delta, oldDelta, source) {
                document.getElementById("opsi_a").value = opsi_a.root.innerHTML;
            });
            var opsi_b = new Quill("#key2", {
                modules: {
                    toolbar: "#quill-toolbar2"
                },
                placeholder: "Ketik disini",
                theme: "snow"
            });
            opsi_b.on('text-change', function(delta, oldDelta, source) {
                document.getElementById("opsi_b").value = opsi_b.root.innerHTML;
            });
            var opsi_c = new Quill("#key3", {
                modules: {
                    toolbar: "#quill-toolbar3"
                },
                placeholder: "Ketik disini",
                theme: "snow"
            });
            opsi_c.on('text-change', function(delta, oldDelta, source) {
                document.getElementById("opsi_c").value = opsi_c.root.innerHTML;
            });
            var opsi_d = new Quill("#key4", {
                modules: {
                    toolbar: "#quill-toolbar4"
                },
                placeholder: "Ketik disini",
                theme: "snow"
            });
            opsi_d.on('text-change', function(delta, oldDelta, source) {
                document.getElementById("opsi_d").value = opsi_d.root.innerHTML;
            });
            var opsi_e = new Quill("#key5", {
                modules: {
                    toolbar: "#quill-toolbar5"
                },
                placeholder: "Ketik disini",
                theme: "snow"
            });
            opsi_e.on('text-change', function(delta, oldDelta, source) {
                document.getElementById("opsi_e").value = opsi_e.root.innerHTML;
            });




        });
    </script>
@endsection
