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
            @if (count($jobs) == 0)
                <div class="panel-body text-center">
                    <h4>Tidak ada lowongan</h4>
                </div>
            @else
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
                                        <small style="font-size: 10pt">Tanggal Mulai : <i
                                                class="fa fa-calendar"></i>&nbsp;{{ carbon\carbon::parse($n->tgl_mulai)->translatedFormat('d F Y') }}
                                        </small> |
                                        <small style="font-size: 10pt">Berakhir s.d : <i
                                                class="fa fa-calendar"></i>&nbsp;{{ carbon\carbon::parse($n->tgl_akhir)->translatedFormat('d F Y') }}
                                        </small>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <small style="text-align: justify;font-size: 11pt">
                                    {!! substr(strip_tags($n->informasi), 0, 150) !!}...
                                </small>
                            </div>
                            <div class="card-footer bg-white">
                                <button data-pdf="{{ $n->lampiran }}" data-uuid="{{ $n->uuid }}"
                                    class="btn badge btn-sm rounded-pill py-1 px-4 btn-primary text-white readMore"
                                    data-toggle="modal" data-target="#exampleModal">Lihat
                                    Detail</button>
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
                                    <button type="button" class="btn badge btn-sm close bg-dark text-white closeModal"
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
            @endif
        </div>
    </div>
    <!-- Appointment End -->
@endsection

@push('js')
    {{-- @if (count($jobs) == 0)
        <script>
            console.log('nothing happen')
        </script>
    @else
        @if (berkasLamar($n->uuid)) --}}
    <script>
        $(function() {
            $('body').on('click', '.readMore', function() {
                var pdf = $(this).data("pdf");
                var uuid = $(this).data("uuid");

                var embedElement = document.getElementById("detailLowongan");
                embedElement.setAttribute("src", "{{ url('/detail-lowongan') }}" + '/' +
                    uuid);

                $('#modalLowongan').modal('show');
            })

            $('body').on('click', '.closeModal', function() {
                $('#modalLowongan').modal('hide');
            })
        });
    </script>
    {{-- @else
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
    @endif --}}
@endpush
