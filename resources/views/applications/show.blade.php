@extends('layout.master')
@section('title', 'Application Detail')
@push('plugin-styles')

@endpush

@section('content')
    <div>
        <h4 class="mb-3 mb-md-0">Application Detail</h4>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-header">
                    <div class="pull-right">
                        <div class="btn-group" role="group">
                            <a href="{{ URL::previous() }}"
                                class="btn btn-sm btn-outline-dark" title="Show All Application">
                                <span class="feather icon-arrow-left" aria-hidden="true"></span>
                            </a>

                            <a href="{{ route('applications.create') }}"
                                class="btn btn-sm btn-outline-primary" title="Create New Application">
                                <span class="feather icon-plus" aria-hidden="true"></span>
                            </a>

                            <a href="{{ route('applications.edit', $application->uuid) }}"
                                class="btn btn-sm btn-outline-warning" title="Edit Application">
                                <span class="feather icon-edit" aria-hidden="true"></span>
                            </a>

                            <a data-name="{{ $application->name }}" data-id="{{ $application->uuid }}"
                                class="btn btn-sm delete btn-outline-danger" title="Delete Application">
                                <span class="feather icon-trash" aria-hidden="true"></span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <dl class="dl-horizontal">
                                    <dt>Uuid</dt>
            <dd>{{ $application->uuid }}</dd>
            <dt>Job</dt>
            <dd>{{ optional($application->job)->uuid }}</dd>
            <dt>User</dt>
            <dd>{{ optional($application->user)->name }}</dd>
            <dt>Unit</dt>
            <dd>{{ optional($application->unit)->uuid }}</dd>
            <dt>Position</dt>
            <dd>{{ optional($application->position)->uuid }}</dd>
            <dt>Administrasi</dt>
            <dd>{{ $application->administrasi }}</dd>
            <dt>Tertulis</dt>
            <dd>{{ $application->tertulis }}</dd>
            <dt>Wawancara Unit</dt>
            <dd>{{ $application->wawancara_unit }}</dd>
            <dt>Praktek</dt>
            <dd>{{ $application->praktek }}</dd>
            <dt>Wawancara Hrd</dt>
            <dd>{{ $application->wawancara_hrd }}</dd>
            <dt>Psikotes</dt>
            <dd>{{ $application->psikotes }}</dd>
            <dt>Wawancara Performance</dt>
            <dd>{{ $application->wawancara_performance }}</dd>
            <dt>Kesehatan</dt>
            <dd>{{ $application->kesehatan }}</dd>
            <dt>Tahap Akhir</dt>
            <dd>{{ $application->tahap_akhir }}</dd>
            <dt>Status</dt>
            <dd>{{ $application->status }}</dd>

                    </dl>
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
                            url: "{{ url('/applications') }}" +
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
                                swal('Poof! application berhasil dihapus!', {
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
