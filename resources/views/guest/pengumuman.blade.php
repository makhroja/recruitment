@extends('layout.guest')
@push('css')
    <style>
        .responsive-iframe {
            position: absolute;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            width: 100%;
            height: 100%;
            border: none;
        }

        .container-169iframe {
            position: relative;
            width: 100%;
            overflow: hidden;
            padding-top: 56.25%;
            /* 16:9 Aspect Ratio */
        }
    </style>
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
            @if (count($announcements) == 0)
                <div class="panel-body text-center">
                    <h4>Tidak Ada Pengumuman</h4>
                </div>
            @else
                @foreach ($announcements as $n)
                    <div class="col-md-12 mb-3">
                        <!-- start single blog archive -->
                        <div class="card wow fadeInRight col-lg-12 col-12 col-sm-12">
                            <div class="card-header bg-white">
                                <h5 class=" mt-1" style="text-align: justify;">
                                    {{ $n->judul }}
                                </h5>
                                <small>{{ $n->job->judul }}</small>
                            </div>
                            <div class="card-body">
                                <small>{{ $n->keterangan }}</small>
                            </div>
                            <div class="card-footer bg-white">
                                <button data-pdf="{{ $n->pdf }}" data-uuid="{{ $n->uuid }}"
                                    class="btn btn-sm rounded-pill py-1 px-4 btn-info text-white badge readMore"
                                    data-toggle="modal" data-target="#exampleModal">Lihat
                                    Detail</button>
                            </div>
                        </div>
                        <!-- End single blog archive -->
                    </div>
                    <!-- Modal Hasil Seleksi -->
                    <div id="modalPengumuman" class="modal fade modal-fullscreen" tabindex="-1" role="dialog"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="badge btn btn-sm close bg-dark text-white closeModal"
                                        data-dismiss="modal">
                                        Tutup</button>
                                    <h5 class="modal-title">Detail Pengumuman</h5>
                                </div>
                                <div class="modal-body">
                                    <div class="container-169iframe">
                                        <iframe class="responsive-iframe" id="detailPengumuman"
                                            src="{{ url('/assets/uploads/announcement') }}/{{ $n->pdf }}"
                                            frameborder="0"></iframe>
                                    </div>
                                </div>
                                <div class="modal-footer">

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="wow fadeInLeft">
                    {!! $announcements->render() !!}
                </div>
            @endif
        </div>
    </div>
    <!-- Appointment End -->
@endsection


@push('js')
    <script>
        $(function() {
            $('body').on('click', '.readMore', function() {
                var pdf = $(this).data("pdf");
                var uuid = $(this).data("uuid");

                var embedElement = document.getElementById("detailPengumuman");
                embedElement.setAttribute("src", "{{ url('/assets/uploads/announcement') }}" + '/' +
                    pdf);


                $('#modalPengumuman').modal('show');
            })

            $('body').on('click', '.closeModal', function() {
                $('#modalPengumuman').modal('hide');
            })
        });
    </script>
@endpush
