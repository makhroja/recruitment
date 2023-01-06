@extends('layout.master')

@push('plugin-styles')
@endpush

@section('content')
    <div class="row">
        @foreach ($jobs as $job)
            <div class="col-md-12 mb-3">
                <!-- start single blog archive -->
                <div class="card">
                    <div class="card-header mt-2">
                        <h5>
                            {{ $job->judul }}
                        </h5>
                        <span class="text-dark" style="font-size: 10pt">Tanggal Mulai : <i
                                class="fa fa-calendar"></i>&nbsp;{{ carbon\carbon::parse($job->tgl_mulai)->translatedFormat('d F Y') }}
                        </span> |
                        <span class="text-dark" style="font-size: 10pt">Berakhir s.d : <i
                                class="fa fa-calendar"></i>&nbsp;{{ carbon\carbon::parse($job->tgl_akhir)->translatedFormat('d F Y') }}
                        </span> |
                        <span>Posisi dibutuhkan : </span>
                        @foreach ($job->jobDetail as $jobD)
                            <span style="font-size: 10pt">- {{ posNama($jobD->position_id) }}</span>
                        @endforeach
                    </div>
                    <div class="card-body">
                        <p class="text-dark" style="text-align: justify;font-size: 11pt">
                            {{-- {!! substr(strip_tags($p->information), 0, 150) !!} --}}
                            {{ \Str::limit($job->informasi, 150) }}
                        </p>
                        </br>
                        <a href="{{ url('/lowongan-detail') }}/{{ $job->uuid }}"
                            class="btn rounded-pill btn-primary text-white readMore float-right">Lihat
                            Detail</a>
                    </div>
                </div>
                <!-- End single blog archive -->
            </div>
        @endforeach
        <div class="wow fadeInLeft">
            {!! $jobs->render() !!}
        </div>
    </div>
@endsection

@push('plugin-scripts')
@endpush

@push('custom-scripts')
@endpush
