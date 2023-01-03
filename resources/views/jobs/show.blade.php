@extends('layout.master')
@section('title', 'Job Detail')
@push('plugin-styles')
    <link href="{{ asset('assets/plugins/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}"
        rel="stylesheet" />
    <link href="{{ asset('assets/plugins/datatables/DataTables-1.10.16/css/styling-dataTables.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/datatables/datatables.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/datatables/Select-1.2.4/css/select.bootstrap4.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <div>
        <h4 class="mb-3 mb-md-0">Job Detail</h4>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <dt>Pembuat Lowongan</dt>
                    <dd class="text-muted">{{ optional($job->user)->name }}</dd>
                    <div class="row">

                        <div class="col-md-6">
                            <dt>No Surat</dt>
                            <dd class="text-muted">{{ $job->no_surat }}</dd>
                            <dt>Informasi</dt>
                            <dd class="text-muted">{{ $job->informasi }}</dd>
                        </div>
                        <div class="col-md-6">
                            <dt>Judul</dt>
                            <dd class="text-muted">{{ $job->judul }}</dd>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <dt>Tgl Mulai</dt>
                            <dd class="text-muted">{{ $job->tgl_mulai }}</dd>
                        </div>
                        <div class="col-md-6">
                            <dt>Tgl Akhir</dt>
                            <dd class="text-muted">{{ $job->tgl_akhir }}</dd>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <dt>Status</dt>
                            <dd class="text-muted">{{ $job->status }}</dd>
                        </div>
                        <div class="col-md-6">
                            <dt>Is Aktif</dt>
                            <dd class="text-muted">{{ $job->is_aktif ? 'Yes' : 'No' }}</dd>
                        </div>
                    </div>

                    <dt>Lampiran</dt>
                    <dd class="text-muted"><button data-pdf="{{ $job->lampiran }}"
                            class="btn btn-sm btn-outline-warning srcLampiran">Lihat</button></dd>
                    <hr>
                    <div class="row">
                        <div class="form-group ml-3">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target=".bd-example-modal-lg"> Tambah Detail
                                Lowongan</button>
                        </div>
                        <div class="table-responsive">
                            <table id="dataTable" style="width:100%" class="table table-bordered nowrap">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Unit</th>
                                        <th>Position</th>
                                        <th>Pendidikan</th>
                                        <th>Jurusan</th>
                                        <th>JK</th>
                                        <th>Umur</th>
                                        <th>Jumlah</th>
                                        <th>Syarat</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="pull-right">
                        <div class="btn-group" role="group">
                            <a href="{{ route('jobs.index') }}" class="btn btn-sm btn-outline-dark" title="Show All Job">
                                <span class="feather icon-arrow-left" aria-hidden="true"></span>
                            </a>

                            <a href="{{ route('jobs.create') }}" class="btn btn-sm btn-outline-primary"
                                title="Create New Job">
                                <span class="feather icon-plus" aria-hidden="true"></span>
                            </a>

                            <a href="{{ route('jobs.edit', $job->uuid) }}" class="btn btn-sm btn-outline-warning"
                                title="Edit Job">
                                <span class="feather icon-edit" aria-hidden="true"></span>
                            </a>

                            <a data-name="{{ $job->name }}" data-id="{{ $job->uuid }}"
                                class="btn btn-sm deleteShow btn-outline-danger" title="Delete Job">
                                <span class="feather icon-trash" aria-hidden="true"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Detail</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('jobDetails.store') }}" accept-charset="UTF-8"
                    id="create_job_detail_form" name="create_job_detail_form" class="form-horizontal">
                    {{ csrf_field() }}
                    <div class="modal-body">

                        @include('jobs.formJobDetails')

                    </div>
                    <div class="modal-footer">
                        <div class="form-group">
                            <div class="col-md-offset-2 col-md-10">
                                <input class="btn btn-sm btn-outline-primary" type="submit" value="Tambah">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Lampiran -->
    <div id="modalLampiran" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title">Lampiran Surat Keputusan</h5>
                </div>
                <div class="modal-body">

                    <embed id="srcLampiran" src="" frameborder="0" width="100%" height="400px">

                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Tutup</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@push('plugin-scripts')
    <script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/Select-1.2.4/js/dataTables.select.min.js') }}"></script>
@endpush

@push('custom-scripts')
    <script type="text/javascript">
        $(function() {
            //ajax setup
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta [name="csrf-token"]').attr('content')
                }
            });

            // datatable
            var table = $('#dataTable').DataTable({
                processing: true,
                serverSide: true,
                scrollY: true,
                scrollX: true,
                // select: true,
                // select: 'single',
                ajax: "{{ url('/jobs/getJobDetailJson') }}" + '/' + '' + '{{ $job->uuid }}',
                order: [
                    [1, 'asc']
                ],
                columnDefs: [{
                    targets: "_all",
                    orderable: false
                }, {
                    width: "2%",
                    targets: [0]
                }, {
                    //buat wrap text
                    render: function(data, type, full, meta) {
                        return "<div class='text-wrap width-200'>" + data + "</div>";
                    },
                    targets: [1]
                }, ],
                dom: 'lBfrtip',
                buttons: [
                    'excel', 'pdf', 'print'
                ],
                columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                }, {
                    data: 'unit_id',
                    name: 'unit_id'
                }, {
                    data: 'position_id',
                    name: 'position_id'
                }, {
                    data: 'pendidikan',
                    name: 'pendidikan'
                }, {
                    data: 'jurusan',
                    name: 'jurusan'
                }, {
                    data: 'jk',
                    name: 'jk'
                }, {
                    data: 'umur',
                    name: 'umur'
                }, {
                    data: 'jumlah',
                    name: 'jumlah'
                }, {
                    data: 'catatan',
                    name: 'catatan'
                }, {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                }, ],
            });

            table.on('click', '.edit', function() {
                var uuid = $(this).data("id");
                var url = "{{ url('/jobDetails') }}" + '/' + 'uuid' + '=' + uuid + '/edit/';
                window.open(url, "_self")
            });

            table.on('click', '.show', function() {
                var uuid = $(this).data("id");
                var url = "{{ url('/jobDetails') }}" + '/' + '' + uuid;
                window.open(url, "_self")
            });

            table.on('click', '.delete', function() {
                var name = $(this).data("name");
                swal({
                    title: 'Anda Yakin?',
                    text: "Menghapus Data " + name,
                    icon: 'warning',
                    buttons: true,
                    dangerMode: true,
                    reverseButtons: false,
                    buttons: {
                        confirm: 'Ya',
                        cancel: 'Tidak'
                    },
                }).then((willDelete) => {
                    if (willDelete) {
                        var uuid = $(this).data("id");
                        var token = $("meta[name='csrf-token']").attr("content");
                        $.ajax({
                            url: "{{ url('/jobDetails') }}" +
                                '/' +
                                uuid,
                            type: 'delete',
                            dataType: "JSON",
                            data: {
                                "uuid": uuid,
                                "_token": token,
                            },
                            success: function(data) {
                                table.draw();
                                console.log('Success:', data);
                                swal({
                                    icon: 'info',
                                    title: data.Success
                                });
                            },
                            error: function(data) {
                                // window.location.reload()
                                console.log('Error:', data);
                                swal({
                                    icon: 'info',
                                    title: 'Something went wrong!'
                                });
                            }
                        });
                    } else {
                        // 
                    }
                });
            });

            /*
             *End Document Ready
             */
        });
    </script>
    <script type="text/javascript">
        $(function() {
            //ajax setup
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta [name="csrf-token"]').attr('content')
                }
            });


            $('body').on('click', '.deleteShow', function() {
                var name = $(this).data("name");
                swal({
                    title: 'Anda Yakin?',
                    text: "Menghapus Data " + name,
                    icon: 'warning',
                    buttons: true,
                    dangerMode: true,
                    reverseButtons: false,
                    buttons: {
                        confirm: 'Ya',
                        cancel: 'Tidak'
                    },
                }).then((willDelete) => {
                    if (willDelete) {
                        var uuid = $(this).data("id");
                        var token = $("meta[name='csrf-token']").attr("content");
                        var url = "{{ URL::previous() }}";
                        $.ajax({
                            url: "{{ url('/jobDetails') }}" +
                                '/' +
                                uuid,
                            type: 'delete',
                            dataType: "JSON",
                            data: {
                                "uuid": uuid,
                                "_token": token,
                            },
                            success: function(data) {
                                console.log('Success:', data);
                                swal('Poof! Lowongan berhasil dihapus!', {
                                    icon: 'info',
                                }).then(ok => {
                                    if (ok) {
                                        window.location.href = url;
                                    }
                                });
                            },
                            error: function(data) {
                                // window.location.reload()
                                console.log('Error:', data);
                                swal({
                                    icon: 'info',
                                    title: 'Something went wrong!'
                                });
                            }
                        });
                    } else {
                        // 
                    }
                });
            });

            $('body').on('click', '.srcLampiran', function() {
                var pdf = $(this).data("pdf");

                var embedElement = document.getElementById("srcLampiran");
                embedElement.setAttribute("src", "{{ url('/assets/uploads/job-attachment') }}" + '/' +
                    pdf);

                $('#modalLampiran').modal('show');

            });
            /*
             *End Document Ready
             */
        });
    </script>
    <script>
        $(function() {
            'use strict'

            if ($(".select2").length) {
                $(".select2").select2();
            }
        });
    </script>
@endpush
