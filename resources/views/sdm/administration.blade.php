@extends('layout.master')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/datatables-net/dataTables.bootstrap4.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    <h6 class="card-title mb-2">Data Administrasi Calon Karyawan RSU HI</h6>
                    <div class="table-responsive">
                        <table id="dataTable" style="width:100%" class="table display nowrap">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Ka. Ruang</th>
                                    <th>Nama Unit</th>
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
@endsection

@push('plugin-scripts')
    <script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-net-bs4/dataTables.bootstrap4.js') }}"></script>
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
                ajax: "{{ url('/admin/units/getUnitJson') }}",
                order: [
                    [1, 'asc']
                ],
                columnDefs: [{
                    targets: "_all",
                    orderable: false
                }, {
                    width: "2%",
                    targets: 0
                }, {
                    width: "2%",
                    targets: 3
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
                        data: 'karu',
                        name: 'karu'
                    },
                    {
                        data: 'name',
                        name: 'name'
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
                var url = "{{ url('/admin/units') }}" + '/' + uuid + '/edit/';
                window.open(url, "_self")
            });

            table.on('click', '.show', function() {
                var uuid = $(this).data("id");
                var url = "{{ url('/admin/units') }}" + '/show/' + '' + uuid;
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
                            url: "{{ url('/admin/units/unit') }}" + '/' +
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
                                swal('Poof! unit berhasil dihapus!', {
                                    icon: 'info',
                                });
                            },
                            error: function(data) {
                                window.location.reload()
                                console.log('Error:', data);
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
@endpush
