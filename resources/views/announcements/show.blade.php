@extends('layout.master')
@section('title', 'Announcement Detail')
@push('plugin-styles')
@endpush

@section('content')
    <div>
        <h4 class="mb-3 mb-md-0">Detail Pengumuman</h4>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-header">
                    <div class="pull-right">
                        <div class="btn-group" role="group">
                            <a href="{{ URL::previous() }}" class="btn btn-sm btn-outline-dark" title="Show All Announcement">
                                <span class="feather icon-arrow-left" aria-hidden="true"></span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <dl class="dl-horizontal">
                        <dt>Lowongan</dt>
                        <dd>{{ optional($announcement->job)->uuid }}</dd>
                        <dt>Keterangan</dt>
                        <dd>{{ $announcement->keterangan }}</dd>
                        <dt>Pdf</dt>
                        <dd>{{ asset('storage/' . $announcement->pdf) }}</dd>
                        <dt>Status</dt>
                        <dd>{{ $announcement->status }}</dd>

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
                            url: "{{ url('/announcements') }}" +
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
                                swal('Poof! announcement berhasil dihapus!', {
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
