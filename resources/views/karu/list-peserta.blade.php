@extends('layout.master')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}"
        rel="stylesheet" />
    <link href="{{ asset('assets/plugins/datatables/datatables.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/datatables/Select-1.2.4/css/select.bootstrap4.min.css') }}" rel="stylesheet" />
@endpush

@section('content')

    @if (count($check_app->get()) == 0)
        <div class="text-center alert alert-danger" role="alert">
            Belum ada peserta mendaftar di Lowongan ini
        </div>
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <tbody>
                        <tr class="text-center">
                            <td>{{ $jobs->judul }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    @else
        <div class="row">
            <div class="col-12 col-xl-12 stretch-card">
                <div class="card">
                    <div class="card-header">
                        <h5>
                            {{ $jobs->judul }}
                        </h5>
                    </div>
                    <div class="card-body">
                        <h5 class="text-center color-primary">{{ \Str::upper(phaseName($phase)) }}</h5><br>
                        <form action="{{ route('post.inputNilai') }}" method="post">
                            @csrf
                            <input type="hidden" name="phase" value="{{ $phase }}">
                            <input type="hidden" name="job_id" value="{{ $jobs->uuid }}">
                            <button type="submit" class="btn btn-success text-white"><i
                                    class="feather icon-refresh-ccw"></i></button>
                        </form>
                        <table class="table table-bordered table-hover  mt-1">
                            <thead>
                                <tr>
                                    <th style="width: 0%">No</th>
                                    <th>Nama Lengkap</th>
                                    <th style="width: 0%">Nilai</th>
                                    <th style="width: 0%">Input</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($apps as $ap)
                                    @if (phaseStatus($phase, $ap->uuid))
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $ap->user->userDetail->nama_lengkap }}
                                            </td>
                                            <td>
                                                @if (phaseStatus($phase, $ap->uuid)->nilai_akhir != null)
                                                    <h5>
                                                        <span
                                                            class="badge bg-success text-white">{{ phaseStatus($phase, $ap->uuid)->nilai_akhir }}
                                                        </span>
                                                    </h5>
                                                    <i class="feather icon-check text-white"></i>
                                                @endif
                                            </td>
                                            <td>
                                                <a data-phase="{{ $phase }}" data-id="{{ $ap->uuid }}"
                                                    class="btn btn-sm btn-warning mt-1 mb-2 text-white inputNilai"
                                                    value="">Input</a>
                                            </td>
                                        </tr>
                                    @else
                                    @endif
                                @endforeach
                                @if (is_null(phaseStatus($phase, $apps->first()->uuid)))
                                    <tr class="table-info">
                                        <td colspan="3" class="text-center">
                                            Input Nilai belum diperbolehkan, nilai tes sebelumnya belum diinputkan.
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- row -->
            <!-- Modal -->
            <div class="modal fade modal-fullscreen" id="modalInputNilai" tabindex="-1" role="dialog"
                aria-labelledby="modalInputNilaiLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalInputNilaiLabel">Modal title</h5>
                            <button type="button" class="btn btn-warning text-white" data-dismiss="modal">Tutup</button>
                        </div>
                        <div class="modal-body">
                            <embed id="frameInputNilai" src="" frameborder="0" width="100%" height="600px">
                        </div>
                        <div class="modal-footer">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection

@push('plugin-scripts')
    <script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/Select-1.2.4/js/dataTables.select.min.js') }}"></script>
@endpush

@push('custom-scripts')
    <script>
        $(function() {

            //ajax setup
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta [name="csrf-token"]').attr('content')
                }
            });

            $('.inputNilai').on('click', function() {
                var uuid = $(this).data('id');
                var phase = $(this).data('phase');

                var token = $("meta[name='csrf-token']").attr("content");

                $.ajax({
                    url: "{{ route('jsonInputNilai') }}",
                    type: 'post',
                    dataType: "JSON",
                    data: {
                        "phase": phase,
                        "uuid": uuid,
                        "_token": token,
                    },
                    success: function(data) {
                        $('#modalInputNilaiLabel').text('INPUT NILAI ' + data.test + ' ' +
                            data.judul);

                        var url = "{{ url('/input-nilai/') }}" + '/' + phase + '/' + data.phase
                            .uuid

                        console.log(data);
                        var embedElement = document.getElementById("frameInputNilai");
                        embedElement.setAttribute("src", url);

                        $('#modalInputNilai').modal('show');
                    },
                    error: function(data) {
                        console.log('Error:', data);
                    }
                });
            })
            /*
             *End Document Ready
             */
        });

        $(function() {
            'use strict'

            if ($(".select2").length) {
                $(".select2").select2();
            }
        });

        function reset() {
            $('#selectPeserta').prop('disabled', false);
            $('.inputNilai').prop('disabled', true);
        }
    </script>
@endpush
