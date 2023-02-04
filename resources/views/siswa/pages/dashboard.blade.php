@extends('siswa.index')
@section('main')
    <div class="row">
        @foreach ($datas as $item)
            <div class="col-12 col-md-6 col-lg-3">
                <div class="card">
                    <div class="card-header px-4 pt-4">
                        {{-- Title dan Status Ujian --}}
                        <h5 class="card-title mb-0">{{ $item->mapel }}</h5>
                        {{-- <div class="badge bg-warning my-2">Sedang Berlangsung</div> --}}
                    </div>
                    {{-- Deskripsi Ujian --}}
                    <div class="card-body px-4 pt-2">
                        <p>{!! $item->deskripsi !!}</p>

                        <div class="text-end">

                            <p>{{ $durasi[$item->id] }} Menit</p>
                        </div>

                        {{-- Button --}}
                        <div class="text-end">
                            <form action="{{ route('siswa.ujian', ['url' => $item->url]) }}">
                                @csrf
                                <input type="hidden" value="{{ $item->mapel_id }}" name="id" />
                                <input type="hidden" value="{{ $item->waktu_mulai }}" name="waktu_mulai" />
                                <input type="hidden" value="{{ $item->waktu_selesai }}" name="waktu_selesai" />
                                <input type="hidden" value="{{ $item->id }}" name="ujian_id" />

                                @php($date_selesai = \Carbon\Carbon::parse($item->waktu_selesai))
                                @if ($date_selesai->isPast())
                                    <button class="btn btn-pill btn-secondary" disabled>Waktu Ujian Habis</button>
                                @else
                                    @if (\App\Models\Result::where('user_id', Auth::user()->id)->where('ujian_id', $item->id)->count() >= 0)
                                        <button class="btn btn-pill btn-danger" disabled>Ujian Selesai</button>
                                    @else
                                        <button class="btn btn-pill btn-primary">Kerjakan</button>
                                    @endif
                                @endif



                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
    <hr>
@endsection
