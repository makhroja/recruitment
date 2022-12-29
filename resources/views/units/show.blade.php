@extends('layout.master')
@section('title', 'Units Detail')
@push('plugin-styles')
    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
@endpush

@section('content')
    <div>
        <h4 class="mb-3 mb-md-0">Unit Detail</h4>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <dl class="dl-horizontal">
                        <dt>User</dt>
                        <dd>{{ optional($unit->user)->name }}</dd>
                        <dt>Nama</dt>
                        <dd>{{ $unit->nama }}</dd>
                        <dt>Status</dt>
                        <dd>{{ $unit->status }}</dd>

                    </dl>
                </div>
                <div class="card-footer">
                    <div class="pull-right">


                        <div class="btn-group" role="group">
                            <a href="{{ URL::previous() }}" class="btn btn-sm btn-outline-dark" title="Show All Unit">
                                <span class="feather icon-arrow-left" aria-hidden="true"></span>
                            </a>

                            <a href="{{ route('units.create') }}" class="btn btn-sm btn-outline-primary"
                                title="Create New Unit">
                                <span class="feather icon-plus" aria-hidden="true"></span>
                            </a>

                            <a href="{{ route('units.edit', $unit->uuid) }}" class="btn btn-sm btn-outline-warning"
                                title="Edit Unit">
                                <span class="feather icon-edit" aria-hidden="true"></span>
                            </a>

                            <a data-name="{{ $unit->name }}" data-id="{{ $unit->uuid }}"
                                class="btn btn-sm delete btn-outline-danger" title="Delete Unit">
                                <span class="feather icon-trash" aria-hidden="true"></span>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('plugin-scripts')
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


            $('body').on('click', '.delete', function() {
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
                            url: "{{ url('/units') }}" +
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
                                swal('Poof! unit berhasil dihapus!', {
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

            /*
             *End Document Ready
             */
        });
    </script>
@endpush
