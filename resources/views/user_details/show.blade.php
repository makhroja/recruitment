@extends('layout.master')
@section('title', 'UserDetail Detail')
@push('plugin-styles')
@endpush

@section('content')
    <div>
        <h4 class="mb-3 mb-md-0">User Detail</h4>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    <body>
                        <table style="width: 100%" class="table table-bordered">
                            <tbody>
                                <tr>
                                    {{-- <td width="25%">
                                        <img src="https://www.rsuharapanibu.co.id/wp-content/uploads/2022/05/logo.png">
                                    </td> --}}
                                    <td style="width: 75%" class="text-center">
                                        <h4 style="color: rgb(14, 142, 247)">RUMAH SAKIT UMUM HARAPAN IBU PURBALINGGA
                                        </h4>
                                        <p>JL. May. Jend. Soengkono KM.1, JL. Soekarno-Hatta No.2, Telp. (0281) 892222 /
                                            892277 Fax (0281) 893031 </p>
                                        <p>Email : rsuhipbg@yahoo.co.id Website : <a
                                                href="http://www.rsuharapanibu.co.id/">www.rsuharapanibu.co.id</a></p>
                                        <p>PURBALINGGA</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <br>
                        <br>
                        <h4 style="text-align:center;">BIODATA</h4>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tr height="30px !important;">
                                    <td class="bg-secondary text-white" width="25%">Nama</td>
                                    <td> {{ $userDetail->nama_lengkap == '' ? 'belum diisi' : $userDetail->nama_lengkap }}
                                    </td>
                                </tr>
                                <tr height="30px !important;">
                                    <td class="bg-secondary text-white">Jenis Kelamin</td>
                                    <td>
                                        {{ ($userDetail->jk == '' ? 'belum diisi' : $userDetail->jk == 1) ? 'Laki-laki' : 'Perempuan' }}
                                    </td>
                                </tr>
                                <tr height="30px !important;">
                                    <td class="bg-secondary text-white">Tempat, Tanggal lahir</td>
                                    <td>
                                        {{ $userDetail->tempat_lahir }},{{ $userDetail->tgl_lahir == '' ? 'belum diisi' : $userDetail->tgl_lahir }}
                                    </td>
                                </tr>
                                <tr height="30px !important;">
                                    <td class="bg-secondary text-white">Agama</td>
                                    <td> {{ $userDetail->agama == '' ? 'belum diisi' : $userDetail->agama }}</td>
                                </tr>
                                <tr height="30px !important;">
                                    <td class="bg-secondary text-white">Alamat KTP</td>
                                    <td> {{ $userDetail->alamat_ktp == '' ? 'belum diisi' : $userDetail->alamat_ktp }}</td>
                                </tr>
                                <tr height="30px !important;">
                                    <td class="bg-secondary text-white">Alamat Sekarang</td>
                                    <td> {{ $userDetail->alamat_sekarang == '' ? 'belum diisi' : $userDetail->alamat_sekarang }}
                                    </td>
                                </tr>
                                <tr height="30px !important;">
                                    <td class="bg-secondary text-white">Nomor hp</td>
                                    <td> {{ $userDetail->no_hp == '' ? 'belum diisi' : $userDetail->no_hp }}</td>
                                </tr>
                                <tr height="30px !important;">
                                    <td class="bg-secondary text-white">email</td>
                                    <td> {{ $userDetail->user->email == '' ? 'belum diisi' : $userDetail->user->email }}
                                    </td>
                                </tr>
                                <tr height="30px !important;">
                                    <td class="bg-secondary text-white">Ijazah Terakhir</td>
                                    <td> {{ $userDetail->pendidikan == '' ? 'belum diisi' : $userDetail->pendidikan }}</td>
                                </tr>
                                <tr height="30px !important;">
                                    <td class="bg-secondary text-white">Nama Sekolah / Universitas</td>
                                    <td> {{ $userDetail->instansi == '' ? 'belum diisi' : $userDetail->instansi }}</td>
                                </tr>
                                <tr height="30px !important;">
                                    <td class="bg-secondary text-white">Jurusan / Prodi</td>
                                    <td> {{ $userDetail->jurusan == '' ? 'belum diisi' : $userDetail->jurusan }}</td>
                                </tr>
                                <tr height="30px !important;">
                                    <td class="bg-secondary text-white">Tahun Lulus</td>
                                    <td> {{ $userDetail->tahun_lulus == '' ? 'belum diisi' : $userDetail->tahun_lulus }}
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </body>
                </div>
                @hasrole('administrator|sdm')
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
                @endhasrole
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
