@extends('layout.master')
@section('title', 'Application Detail')
@push('plugin-styles')
@endpush

@section('content')
    <div>
        <h4 class="mb-3 mb-md-0">Detail Lamaran</h4>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-header">
                    <div class="pull-right">
                        <div class="btn-group" role="group">
                            <a href="{{ URL::previous() }}" class="btn btn-sm btn-outline-dark" title="Show All Application">
                                <span class="feather icon-arrow-left" aria-hidden="true"></span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <dl class="dl-horizontal">
                        <dt>Lowowngan</dt>
                        <dd>{{ optional($application->job)->judul }}</dd>
                        <dt>User</dt>
                        <dd>{{ optional($application->user->userDetail)->nama_lengkap }}</dd>
                        <dt>Unit</dt>
                        <dd>{{ optional($application->unit)->nama }}</dd>
                        <dt>Posisi Dilamar</dt>
                        <dd>{{ optional($application->position)->nama }}</dd>
                        <dt>Hasil Administrasi</dt>
                        <dd>{{ $application->administrasi }}</dd>
                        <dt>Hasil Tertulis</dt>
                        <dd>{{ $application->phase2s }}</dd>
                        <dt>Hasil Wawancara Unit</dt>
                        <dd>{{ $application->phase3s }}</dd>
                        <dt>Hasil Praktek</dt>
                        <dd>{{ $application->phase4s }}</dd>
                        <dt>Hasil Wawancara Hrd</dt>
                        <dd>{{ $application->phase5s }}</dd>
                        <dt>Hasil Psikotes</dt>
                        <dd>{{ $application->phase6s }}</dd>
                        <dt>Hasil Wawancara Performance</dt>
                        <dd>{{ $application->phase7s }}</dd>
                        <dt>Hasil Kesehatan</dt>
                        <dd>{{ $application->phase8s }}</dd>
                        <dt>Hasil Tahap Akhir</dt>
                        <dd>{{ $application->phase9s }}</dd>
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
