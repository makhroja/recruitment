@extends('layout.guest')
@push('css')
@endpush
@section('content')
    <!-- Header Start -->
    <div class="container-fluid header bg-primary p-0 mb-0">
        <div class="row g-0 align-items-center flex-column-reverse flex-lg-row">
            <div class="col-lg-12 p-2 wow fadeIn" data-wow-delay="0.1s">
            </div>
        </div>
    </div>
    <!-- Header End -->

    <!-- Appointment Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-12 wow fadeInDown" data-wow-delay="0.1s">
                    <p class="d-inline-block border bg-dark text-white rounded-pill py-1 px-4">Lowongan
                    </p>
                </div>
            </div>
            @foreach ($jobs as $n)
                <div class="col-md-12 mb-3">
                    <!-- start single blog archive -->
                    <div class="card wow fadeInRight col-lg-12 col-12 col-sm-12">
                        <div class="card-header bg-white">
                            <h5 class=" mt-1" style="text-align: justify;">
                                {{ $n->judul }}
                            </h5>
                        </div>
                        <div class="card-header bg-white">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="text-dark" style="font-size: 10pt">Tanggal Mulai : <i
                                            class="fa fa-calendar"></i>&nbsp;{{ carbon\carbon::parse($n->tgl_mulai)->translatedFormat('d F Y') }}
                                    </label> |
                                    <label class="text-dark" style="font-size: 10pt">Berakhir s.d : <i
                                            class="fa fa-calendar"></i>&nbsp;{{ carbon\carbon::parse($n->tgl_akhir)->translatedFormat('d F Y') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <p class="text-dark" style="text-align: justify;font-size: 11pt">
                                {!! substr(strip_tags($n->informasi), 0, 150) !!}...
                            </p>
                            <button data-pdf="{{ $n->lampiran }}" data-uuid="{{ $n->uuid }}"
                                class="btn btn-sm rounded-pill py-1 px-4 btn-warning text-white readMore"
                                data-toggle="modal" data-target="#exampleModal">Lihat
                                Detail</button>

                        </div>
                        <div class="card-footer">

                        </div>
                    </div>
                    <!-- End single blog archive -->
                </div>
                <!-- Modal Hasil Seleksi -->
                <div id="modalLowongan" class="modal fade modal-fullscreen" tabindex="-1" role="dialog"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="btn btn-sm close bg-dark text-white closeModal"
                                    data-dismiss="modal">
                                    Tutup</button>
                                <h5 class="modal-title">Detail Lowongan</h5>
                            </div>
                            <div class="modal-body">

                                <iframe id="detailLowongan" src="" frameborder="0" width="100%"
                                    height="100%"></iframe>
                                {{-- <iframe id="lowongan" src="" frameborder="0" width="100%"
                                    height="800px"></iframe> --}}
                            </div>
                            <div class="modal-footer">

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="wow fadeInLeft">
                {!! $jobs->render() !!}
            </div>
        </div>
    </div>
    <!-- Appointment End -->
@endsection

@push('js')
    @if (berkasLamar($n->uuid))
        <script>
            $(function() {
                $('body').on('click', '.readMore', function() {
                    var pdf = $(this).data("pdf");
                    var uuid = $(this).data("uuid");


                    var embedElement = document.getElementById("detailLowongan");
                    embedElement.setAttribute("src", "{{ url('/detail-lowongan') }}" + '/' +
                        uuid);

                    // var embedElement = document.getElementById("lowongan");
                    // embedElement.setAttribute("src", "{{ url('/assets/uploads/job-attachment') }}" + '/' +
                    //     pdf);


                    $('#modalLowongan').modal('show');
                })

                $('body').on('click', '.closeModal', function() {
                    $('#modalLowongan').modal('hide');
                })
            });
        </script>
    @else
        <script>
            $(function() {
                $('body').on('click', '.readMore', function() {
                    var pdf = $(this).data("pdf");
                    var uuid = $(this).data("uuid");

                    $('#modalLowongan').modal('show');
                })

                $('body').on('click', '.closeModal', function() {
                    $('#modalLowongan').modal('hide');
                })
            });
        </script>
    @endif

@endpush
