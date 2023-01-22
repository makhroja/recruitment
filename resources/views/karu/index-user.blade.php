@extends('layout.master')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}"
        rel="stylesheet" />
    <link href="{{ asset('assets/plugins/datatables/datatables.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/datatables/Select-1.2.4/css/select.bootstrap4.min.css') }}" rel="stylesheet" />
@endpush

@section('title', 'Users List')

@section('content')
    <div>
        <h4 class="mb-3 mb-md-0">List User</h4>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="dataTable" style="width:100%" class="table table-bordered nowrap">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Nama Lengkap</th>
                                    <th>Email</th>
                                    <th>Lowongan</th>
                                    <th>Posisi</th>
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
    <div id="userDetailModal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
        aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <iframe id="userDetail" src="" frameborder="0" width="100%" height="600px"></iframe>
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
                ajax: "{{ url('/karu/getUserJson') }}",
                order: [
                    [1, 'asc']
                ],
                columnDefs: [{
                    targets: "_all",
                    orderable: false
                }, {
                    width: "2%",
                    targets: [0, 5]
                }, {
                    //buat wrap text
                    render: function(data, type, full, meta) {
                        return "<div class='text-wrap width-200'>" + data + "</div>";
                    },
                    targets: [4]
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
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'nama_lengkap',
                        name: 'nama_lengkap'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'lowongan',
                        name: 'lowongan'
                    },
                    {
                        data: 'posisi',
                        name: 'posisi'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ],
            });

            table.on('click', '.show', function() {
                var uuid = $(this).data("id");

                var embedElement = document.getElementById("userDetail");
                embedElement.setAttribute("src", "{{ url('/show-users') }}" + '/' +
                    uuid);

                $('#userDetailModal').modal('show');
            });

            /*
             *End Document Ready
             */
        });
    </script>
@endpush
