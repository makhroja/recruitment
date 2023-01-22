@extends('layout.master2')
@section('title', 'Detail User')
@push('plugin-styles')
@endpush

@section('content')
    <div>
        <h4 class="mb-3 mb-md-0">Biodata</h4>
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
                            <div class="row">
                                <div class="col-md-4">
                                    @if ($user->userDetail->foto == '')
                                        <img src="https://via.placeholder.com/200x300.png" alt="" srcset=""
                                            style="border: 5px solid #7987A1;" width="200px" height="300px">
                                    @else
                                        <img src="{{ url('assets/uploads/foto') }}/{{ $user->userDetail->foto }}"
                                            alt="" srcset="" style="border: 5px solid #7987A1;" width="200px"
                                            height="300px">
                                    @endif
                                </div>
                                <div class="col-md-8">
                                    <table class="table table-bordered">
                                        <tr height="30px !important;">
                                            <td class="bg-secondary text-white" width="25%">Nama</td>
                                            <td> {{ $user->userDetail->nama_lengkap == '' ? 'belum diisi' : $user->userDetail->nama_lengkap }}
                                            </td>
                                        </tr>
                                        <tr height="30px !important;">
                                            <td class="bg-secondary text-white">Jenis Kelamin</td>
                                            <td>
                                                {{ ($user->userDetail->jk == '' ? 'belum diisi' : $user->userDetail->jk == 1) ? 'Laki-laki' : 'Perempuan' }}
                                            </td>
                                        </tr>
                                        <tr height="30px !important;">
                                            <td class="bg-secondary text-white">Tempat, Tanggal lahir</td>
                                            <td>
                                                {{ $user->userDetail->tempat_lahir }},{{ $user->userDetail->tgl_lahir == '' ? 'belum diisi' : $user->userDetail->tgl_lahir }}
                                            </td>
                                        </tr>
                                        <tr height="30px !important;">
                                            <td class="bg-secondary text-white">Agama</td>
                                            <td> {{ $user->userDetail->agama == '' ? 'belum diisi' : $user->userDetail->agama }}
                                            </td>
                                        </tr>
                                        <tr height="30px !important;">
                                            <td class="bg-secondary text-white">Alamat KTP</td>
                                            <td> {{ $user->userDetail->alamat_ktp == '' ? 'belum diisi' : $user->userDetail->alamat_ktp }}
                                            </td>
                                        </tr>
                                        <tr height="30px !important;">
                                            <td class="bg-secondary text-white">Alamat Sekarang</td>
                                            <td> {{ $user->userDetail->alamat_sekarang == '' ? 'belum diisi' : $user->userDetail->alamat_sekarang }}
                                            </td>
                                        </tr>
                                        <tr height="30px !important;">
                                            <td class="bg-secondary text-white">Nomor hp</td>
                                            <td> {{ $user->userDetail->no_hp == '' ? 'belum diisi' : $user->userDetail->no_hp }}
                                            </td>
                                        </tr>
                                        <tr height="30px !important;">
                                            <td class="bg-secondary text-white">email</td>
                                            <td> {{ $user->email == '' ? 'belum diisi' : $user->email }}
                                            </td>
                                        </tr>
                                        <tr height="30px !important;">
                                            <td class="bg-secondary text-white">Ijazah Terakhir</td>
                                            <td> {{ $user->userDetail->pendidikan == '' ? 'belum diisi' : $user->userDetail->pendidikan }}
                                            </td>
                                        </tr>
                                        <tr height="30px !important;">
                                            <td class="bg-secondary text-white">Nama Sekolah / Universitas</td>
                                            <td> {{ $user->userDetail->instansi == '' ? 'belum diisi' : $user->userDetail->instansi }}
                                            </td>
                                        </tr>
                                        <tr height="30px !important;">
                                            <td class="bg-secondary text-white">Jurusan / Prodi</td>
                                            <td> {{ $user->userDetail->jurusan == '' ? 'belum diisi' : $user->userDetail->jurusan }}
                                            </td>
                                        </tr>
                                        <tr height="30px !important;">
                                            <td class="bg-secondary text-white">Tahun Lulus</td>
                                            <td> {{ $user->userDetail->tahun_lulus == '' ? 'belum diisi' : $user->userDetail->tahun_lulus }}
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </body>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('plugin-scripts')
@endpush

@push('custom-scripts')
@endpush
