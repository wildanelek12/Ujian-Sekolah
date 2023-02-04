@extends('siswa.index')
@section('main')
    <div class="row">
        @foreach ($datas as $item)
            <div class="col-12 col-md-6 col-lg-3">
                <div class="card">
                    <div class="card-header px-4 pt-4">
                        {{-- Title dan Status Ujian --}}
                        <h5 class="card-title mb-0">{{ $item->mapel }}</h5>
                        <div class="badge bg-warning my-2">Sedang Berlangsung</div>
                    </div>
                    {{-- Deskripsi Ujian --}}
                    <div class="card-body px-4 pt-2">
                        <p>{!! $item->deskripsi !!}</p>

                        <div class="text-end">

                            <p>{{ $durasi[$item->id] }} Menit</p>
                        </div>

                        {{-- Button --}}
                        <div class="text-end">
                            <a href="{{ route('siswa.ujian', ['id' => $item->id]) }}"><button
                                    class="btn btn-pill btn-primary">Kerjakan</button></a>
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
                    <h5 class="card-title mb-0">Bahasa Indonesia</h5>
                    <div class="badge bg-success my-2">Selesai</div>
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
                        <button class="btn btn-pill btn-primary" disabled>Kerjakan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
