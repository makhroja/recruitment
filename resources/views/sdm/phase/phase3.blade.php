@extends('layout.master')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/datatables-net/dataTables.bootstrap4.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/jquery-tags-input/jquery.tagsinput.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('sdm') }}" type="button" title="Back" class="btn btn-dark btn-icon-text">
                        <i class="btn-icon-prepend" data-feather="arrow-left"></i>
                        Back
                    </a>
                    <br>
                    <br>
                    <h4 class="card-title"></h4>
                    <p class="card-description">Pilih lowongan untuk melakukan seleksi bagi calon
                        karyawan. </p>

                    <div class="form-group col-md-12">
                        <select required name="job_uuid" class="select2">
                            <option value="" style="display: none;" disabled selected>Pilih Lowongan</option>
                            @foreach ($jobs as $key => $job)
                                <option value="{{ $key }}">
                                    {{ $job }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" id="jobSelect" class="float-right btn btn-primary btn-icon-text">
                        Ok <i class="btn-icon-prepend" data-feather="arrow-right"></i>
                    </button>
                    <div class="card-body">

                        <h6 class="card-title mb-2">Data Tes Tertulis Calon Karyawan RSU HI</h6>

                        <div class="table-responsive">
                            <table id="dataTable" style="width:100%"
                                class="table table-bordered table-hover display nowrap">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Lengkap</th>
                                        <th>Nilai</th>
                                        <th colspan="2" class="text-center">Lolos</th>
                                        <th>Lamaran</th>
                                    </tr>
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        {{-- Beda --}}
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div id="modalLampiran" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title">Surat lamaran</h5>
                </div>
                <div class="modal-body">

                    <embed id="srcLampiran" src="" frameborder="0" width="100%" height="400px">

                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@push('plugin-scripts')
    <script src="{{ asset('assets/plugins/select2/select2.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery-tags-input/jquery.tagsinput.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-net-bs4/dataTables.bootstrap4.js') }}"></script>
@endpush

@push('custom-scripts')
    <script src="{{ asset('assets/js/select2.js') }}"></script>
    <script src="{{ asset('assets/js/tags-input.js') }}"></script>
    <script src="{{ asset('assets/js/datepicker.js') }}"></script>
    <script type="text/javascript">
        $(function() {
            //ajax setup
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta [name="csrf-token"]').attr('content')
                }
            });

            var table = $('#dataTable').DataTable({
                processing: true,
                serverSide: true,
                scrollY: true,
                scrollX: true,
                deferLoading: 0,
                select: true,
                select: 'single',
                ajax: "{{ url('/getPhase3Json') }}",
                order: [
                    [1, 'asc']
                ],
                columnDefs: [{
                    targets: "_all",
                    orderable: false
                }, {
                    width: "2%",
                    targets: [0, 2, 3, 4, 5]
                }],
                dom: 'Bfrtip',
                buttons: [
                    'excel', 'pdf', 'print'
                ],
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'user',
                        name: 'user'
                    },
                    {
                        data: 'nilai',
                        name: 'nilai'
                    },
                    {
                        data: 'lolos',
                        name: 'lolos'
                    },
                    {
                        data: 'tidak_lolos',
                        name: 'tidak_lolos'
                    },
                    {
                        data: 'lampiran',
                        name: 'lampiran'
                    },
                ],
            });

            table.on('change', '.status', function() {
                var name = $(this).data("name");
                var status = $(this).data("status");

                if (status == 1) {
                    var message = "Lolos Wawancara Unit.?";
                }
                if (status == 2) {
                    var message = "Tidak Lolos Wawancara Unit.?";
                }
                swal({
                    title: 'Anda Yakin?',
                    text: name + message,
                    icon: 'warning',
                    buttons: true,
                    dangerMode: true,
                    reverseButtons: false,
                    buttons: {
                        confirm: 'Ya',
                        cancel: 'Tidak'
                    },
                }).then((willUpdate) => {
                    if (willUpdate) {
                        var uuid = $(this).data("id");
                        var token = $("meta[name='csrf-token']").attr("content");
                        $.ajax({
                            url: "{{ url('/getPhase3Json/status') }}" +
                                '/' + uuid,
                            type: 'put',
                            dataType: "JSON",
                            data: {
                                "status": status,
                                "uuid": uuid,
                                "_token": token,
                            },
                            success: function(data) {
                                console.log('Success:', data);
                                swal('Status berhasil diubah', {
                                    icon: 'success',
                                });
                                table.draw();
                            },
                            error: function(data) {
                                console.log('Error:', data);
                            }
                        });
                    } else {
                        table.draw();
                    }
                });
            });

            $("#jobSelect").on("click", function() {
                var uuid = $('select[name="job_uuid"]').val();
                if (uuid == null) {
                    swal({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Silahkan pilih lowongan',
                    })
                    console.log('Uuid Is Null')
                } else {
                    var url = "{{ url('/getPhase3Json') }}" + '/' + uuid;
                    table.ajax.url(url).load();
                }
            });

            $(function() {
                'use strict'

                if ($(".select2").length) {
                    $(".select2").select2();
                }
            });


            table.on('click', '.srcLampiran', function() {
                var pdf = $(this).data("pdf");

                var embedElement = document.getElementById("srcLampiran");
                embedElement.setAttribute("src", "{{ url('/assets/uploads/attachment') }}" + '/' +
                    pdf);

                $('#modalLampiran').modal('show');

            });

            function reDraw() {
                table.draw();
            }
            /*
             *End Document Ready
             */
        });
    </script>
@endpush
