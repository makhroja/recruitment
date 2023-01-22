@extends('layout.master')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}"
        rel="stylesheet" />
    <link href="{{ asset('assets/plugins/datatables/datatables.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/datatables/Select-1.2.4/css/select.bootstrap4.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <table id="dataTable" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Lowongan</th>
                                <th>Posisi</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Hasil Seleksi -->
    <div id="modalLowongan" class="modal fade modal-fullscreen" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    {{-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> --}}
                    {{-- <button type="button" class="close btn-icon" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button> --}}
                </div>
                <div class="modal-body">
                    <embed id="hasil-seleksi" src="" frameborder="0" width="100%" height="100%">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Tutup</button>
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
    <script>
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
                select: true,
                select: 'single',
                pagingType: 'simple',
                bPaginate: true,
                bLengthChange: false,
                bFilter: true,
                bInfo: false,
                ajax: "{{ url('/hasil-seleksi/getApplicationJson') }}",
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
                dom: 'lfprti',
                buttons: [
                    'excel', 'pdf', 'print'
                ],
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'job',
                        name: 'job'
                    },
                    {
                        data: 'posisi',
                        name: 'posisi'
                    },
                ],
            });

            $('body').on('click', '.hasil-seleksi', function() {
                $('#modalLowongan').modal('show');
            })

            $('body').on('click', '.hasil-seleksi', function() {
                var uuid = $(this).data("uuid");

                var embedElement = document.getElementById("hasil-seleksi");
                embedElement.setAttribute("src", "{{ url('/detail-seleksi/') }}" + '/' + uuid);

                $('#modalLampiran').modal('show');

            });
        });
    </script>
@endpush
