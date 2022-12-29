@extends('layout.master')
@section('title', 'UserDetail Detail')
@push('plugin-styles')
    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
@endpush

@section('content')
    <div>
        <h4 class="mb-3 mb-md-0">UserDetail Detail</h4>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <dl class="dl-horizontal">
                        <dt>Uuid</dt>
                        <dd>{{ $userDetail->uuid }}</dd>
                        <dt>User</dt>
                        <dd>{{ optional($userDetail->user)->name }}</dd>
                        <dt>Nama Lengkap</dt>
                        <dd>{{ $userDetail->nama_lengkap }}</dd>
                        <dt>Jk</dt>
                        <dd>{{ $userDetail->jk }}</dd>
                        <dt>Tgl Lahir</dt>
                        <dd>{{ $userDetail->tgl_lahir }}</dd>
                        <dt>Tempat Lahir</dt>
                        <dd>{{ $userDetail->tempat_lahir }}</dd>
                        <dt>Agama</dt>
                        <dd>{{ $userDetail->agama }}</dd>
                        <dt>Alamat</dt>
                        <dd>{{ $userDetail->alamat }}</dd>
                        <dt>No Hp</dt>
                        <dd>{{ $userDetail->no_hp }}</dd>
                        <dt>Pendidikan</dt>
                        <dd>{{ $userDetail->pendidikan }}</dd>
                        <dt>Instansi</dt>
                        <dd>{{ $userDetail->instansi }}</dd>
                        <dt>Jurusan</dt>
                        <dd>{{ $userDetail->jurusan }}</dd>
                        <dt>Foto</dt>
                        <dd>{{ $userDetail->foto }}</dd>
                        <dt>Status</dt>
                        <dd>{{ $userDetail->status }}</dd>
                        <dt>Is Aktif</dt>
                        <dd>{{ $userDetail->is_aktif ? 'Yes' : 'No' }}</dd>

                    </dl>
                </div>
                <div class="card-footer">
                    <div class="pull-right">


                        <div class="btn-group" role="group">
                            <a href="{{ URL::previous() }}" class="btn btn-sm btn-outline-dark"
                                title="Show All User Detail">
                                <span class="feather icon-arrow-left" aria-hidden="true"></span>
                            </a>

                            <a href="{{ route('userDetails.create') }}" class="btn btn-sm btn-outline-primary"
                                title="Create New User Detail">
                                <span class="feather icon-plus" aria-hidden="true"></span>
                            </a>

                            <a href="{{ route('userDetails.edit', $userDetail->uuid) }}"
                                class="btn btn-sm btn-outline-warning" title="Edit User Detail">
                                <span class="feather icon-edit" aria-hidden="true"></span>
                            </a>

                            <a data-name="{{ $userDetail->name }}" data-id="{{ $userDetail->uuid }}"
                                class="btn btn-sm delete btn-outline-danger" title="Delete User Detail">
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
                            url: "{{ url('/userDetails') }}" +
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
                                swal('Poof! userDetail berhasil dihapus!', {
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
