@extends('layout.master')
@section('title', 'Job Lists')
@push('plugin-styles')
    <link href="{{ asset('assets/plugins/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}"
        rel="stylesheet" />
    <link href="{{ asset('assets/plugins/datatables/datatables.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/datatables/Select-1.2.4/css/select.bootstrap4.min.css') }}" rel="stylesheet" />
@endpush


@section('content')
    <div>
        <h4 class="mb-3 mb-md-0">Job List</h4>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <a href="{{ route('jobs.create') }}" class="btn btn-ico btn-success" title="Create New User">
                            <span class="feather icon-plus" aria-hidden="true"></span>
                        </a>
                    </div>
                    <div class="table-responsive">
                        <table id="dataTable" style="width:100%" class="table table-bordered nowrap">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No Surat</th>
                                    <th>Judul</th>
                                    <th>Tgl Mulai</th>
                                    <th>Tgl Akhir</th>
                                    <th>Lampiran</th>
                                    <th>isAktif</th>
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
    <!-- Modal -->
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
                        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
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
                ajax: "{{ url('/jobs/getJobJson') }}",
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
                    targets: [1, 2]
                }, ],
                dom: 'lBfrtip',
                buttons: [
                    'excel', 'pdf', 'print'
                ],
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'no_surat',
                        name: 'no_surat'
                    },
                    {
                        data: 'judul',
                        name: 'judul'
                    },
                    {
                        data: 'tgl_mulai',
                        name: 'tgl_mulai'
                    },
                    {
                        data: 'tgl_akhir',
                        name: 'tgl_akhir'
                    },
                    {
                        data: 'lampiran',
                        name: 'lampiran'
                    },
                    {
                        data: 'is_aktif',
                        name: 'is_aktif'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ],
            });

            table.on('click', '.edit', function() {
                var uuid = $(this).data("id");
                var url = "{{ url('/jobs') }}" + '/' + uuid + '/edit/';
                window.open(url, "_self")
            });

            table.on('click', '.show', function() {
                var uuid = $(this).data("id");
                var url = "{{ url('/jobs') }}" + '/' + '' + uuid;
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
                            url: "{{ url('/jobs') }}" +
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


            table.on('click', '.srcLampiran', function() {
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
@endpush
