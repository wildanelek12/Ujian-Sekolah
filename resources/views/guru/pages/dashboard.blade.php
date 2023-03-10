@extends('guru.index')
@section('main')
    <div class="row">
        @foreach ($datas as $item)
            <div class="col-12 col-md-6 col-lg-3">
                <div class="card">
                    <div class="card-header px-4 pt-4">
                        {{-- Title dan Status Ujian --}}
                        <h5 class="card-title mb-0">{{ $item->nama }}</h5>
                        <div class="badge bg-warning my-2">Soal Terupload</div>
                    </div>
                    {{-- Deskripsi Ujian --}}
                    <div class="card-body px-4 pt-2">
                        <p>{{ $item->deskripsi }}
                        <p>
                            {{-- Button --}}
                        <div class="text-end">
                            <a href="{{ route('guru.listSoal', ['id' => $item->id]) }}"><button
                                    class="btn btn-pill btn-primary">Unggah
                                    Soal</button></a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <hr>
    <div class="row">
        <div class="col-12 col-md-6 col-lg-3">
            <div class="card">
                <div class="card-header px-4 pt-4">
                    {{-- Title dan Status Ujian --}}
                    <h5 class="card-title mb-0">Matematika XII</h5>
                    <div class="badge bg-success my-2">Ujian Selesai</div>
                </div>
                {{-- Deskripsi Ujian --}}
                <div class="card-body px-4 pt-2">
                    <p>Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet
                        adipiscing sem neque
                        sed ipsum.</p>

                    <div class="text-end">
                        <p>60 menit</p>
                    </div>

                    {{-- Button --}}
                    <div class="text-end">
                        <button class="btn btn-pill btn-primary" disabled>Unggah Soal</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
