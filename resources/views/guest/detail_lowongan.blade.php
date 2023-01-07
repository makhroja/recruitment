@extends('layout.master2')
@section('title', 'Detail lowongan')
@push('plugin-styles')
@endpush

@section('content')
    @if (berkasLamar($jobs->uuid))
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-header bg-primary">
                    </div>
                    <div class="card-body">
                        <p>
                            {!! $jobs->informasi !!}
                        </p>
                        <br>
                        <table class="table table-bordered">
                            <tr>
                                <td class="bg-secondary text-white">
                                    Judul :
                                </td>
                                <td>
                                    <strong>{{ $jobs->judul }}</strong>
                                </td>
                            </tr>
                            <tr>
                                <td class="bg-secondary text-white">
                                    No Surat :
                                </td>
                                <td>
                                    <strong>{{ $jobs->no_surat }}</strong>
                                </td>
                            </tr>
                            <tr>
                                <td class="bg-secondary text-white">
                                    Pengumpulan Berkas :
                                </td>
                                <td>
                                    <strong>
                                        {{ Carbon\Carbon::parse($jobs->tgl_mulai)->translatedFormat('d F Y') }}</strong>
                                    -
                                    <strong>
                                        {{ Carbon\Carbon::parse($jobs->tgl_akhir)->translatedFormat('d F Y') }}</strong>
                                </td>
                            </tr>
                        </table>
                        <br>
                        <table class="table table-bordered">
                            <tr class="bg-secondary text-white">
                                <th>
                                    Posisi
                                </th>
                                <th>
                                    Pendidikan
                                </th>
                                <th>
                                    Jenis Kelamin
                                </th>
                                <th>
                                    Umur
                                </th>
                                <th>
                                    Jumlah
                                </th>
                                <th>
                                    Syarat lain
                                </th>
                            </tr>
                            @foreach ($jobs->jobDetail as $jobD)
                                <tr>
                                    <td style="vertical-align: top">
                                        {{ posNama($jobD->position_id) }}
                                    </td>
                                    <td style="vertical-align: top">
                                        {{ $jobD->pendidikan }} {{ $jobD->jurusan }}
                                    </td>

                                    <td style="vertical-align: top">
                                        @if ($jobD->jk == 1)
                                            Laki-laki
                                        @elseif($jobD->jk == 2)
                                            Perempuan
                                        @elseif($jobD->jk == 3)
                                            Laki-laki/Perempuan
                                        @endif
                                    </td>
                                    <td style="vertical-align: top">
                                        Maks {{ $jobD->umur }} Thn
                                    </td>
                                    <td style="vertical-align: top">
                                        {{ $jobD->jumlah }}
                                    </td>
                                    <td style="vertical-align: top">
                                        <?php
                                        $cat = explode(',', $jobD->catatan);
                                        ?>
                                        @for ($i = 0; $i < count($cat); $i++)
                                            <p>{{ $i + 1 }}. {{ $cat[$i] }}</p>
                                        @endfor
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        <br>
                        <hr>
                        <br>
                        <h4 class="text-center">
                            Tahapan Seleksi Calon Karyawan RSU HI Purbalingga
                        </h4>
                        <table class="table table-bordered table-hover">
                            <tr class="bg-secondary text-white">
                                <th>
                                    Tahapan Seleksi
                                </th>
                                <th style="width: 25%">
                                    Tanggal
                                </th>
                            </tr>
                            <tr>
                                <td>
                                    {{ $tahap[1] }}
                                </td>
                                <td>
                                    {{ isset($schedule->tahap_1) ? Carbon\Carbon::parse($schedule->tahap_1)->translatedFormat('d F Y') : 'Belum ditentukan' }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    {{ $tahap[2] }}
                                </td>
                                <td>
                                    {{ isset($schedule->tahap_2) ? Carbon\Carbon::parse($schedule->tahap_2)->translatedFormat('d F Y') : 'Belum ditentukan' }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    {{ $tahap[3] }}
                                </td>
                                <td>
                                    {{ isset($schedule->tahap_3) ? Carbon\Carbon::parse($schedule->tahap_3)->translatedFormat('d F Y') : 'Belum ditentukan' }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    {{ $tahap[4] }}
                                </td>
                                <td>
                                    {{ isset($schedule->tahap_4) ? Carbon\Carbon::parse($schedule->tahap_4)->translatedFormat('d F Y') : 'Belum ditentukan' }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    {{ $tahap[5] }}
                                </td>
                                <td>
                                    {{ isset($schedule->tahap_5) ? Carbon\Carbon::parse($schedule->tahap_5)->translatedFormat('d F Y') : 'Belum ditentukan' }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    {{ $tahap[6] }}
                                </td>
                                <td>
                                    {{ isset($schedule->tahap_6) ? Carbon\Carbon::parse($schedule->tahap_6)->translatedFormat('d F Y') : 'Belum ditentukan' }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    {{ $tahap[7] }}
                                </td>
                                <td>
                                    {{ isset($schedule->tahap_7) ? Carbon\Carbon::parse($schedule->tahap_7)->translatedFormat('d F Y') : 'Belum ditentukan' }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    {{ $tahap[8] }}
                                </td>
                                <td>
                                    {{ isset($schedule->tahap_8) ? Carbon\Carbon::parse($schedule->tahap_8)->translatedFormat('d F Y') : 'Belum ditentukan' }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    {{ $tahap[9] }}
                                </td>
                                <td>
                                    {{ isset($schedule->tahap_9) ? Carbon\Carbon::parse($schedule->tahap_9)->translatedFormat('d F Y') : 'Belum ditentukan' }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    {{ $tahap[10] }}
                                </td>
                                <td>
                                    {{ isset($schedule->tahap_1) ? Carbon\Carbon::parse($schedule->tahap_10)->translatedFormat('d F Y') : 'Belum ditentukan' }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    {{ $tahap[11] }}
                                </td>
                                <td>
                                    {{ isset($schedule->tahap_1) ? Carbon\Carbon::parse($schedule->tahap_11)->translatedFormat('d F Y') : 'Belum ditentukan' }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    {{ $tahap[12] }}
                                </td>
                                <td>
                                    {{ isset($schedule->tahap_1) ? Carbon\Carbon::parse($schedule->tahap_12)->translatedFormat('d F Y') : 'Belum ditentukan' }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    {{ $tahap[13] }}
                                </td>
                                <td>
                                    {{ isset($schedule->tahap_1) ? Carbon\Carbon::parse($schedule->tahap_13)->translatedFormat('d F Y') : 'Belum ditentukan' }}
                                </td>
                            </tr>
                        </table>
                        <p class="text-danger">Silahkan baca/download Surat Keputusan Direktur RSU Harapan Ibu Purbalingga
                            dibawah
                        </p>
                    </div>
                    <div class="card-footer">
                        <a href="{{ url('/assets/uploads/job-attachment') }}/{{ $jobs->lampiran }}"
                            class="btn btn-sm btn-warning text-white" target="_blank">Download</a>
                        <a href="{{ route('register') }}" target="_blank" class="btn btn-sm btn-primary text-white">Buat
                            Akun</a>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="alert alert-danger " role="alert">
            <h4 class="alert-heading">INFORMASI</h4>
            <p>Mohon maaf lowongan {{ Str::ucFirst($jobs->judul) }} belum dibuka atau sudah
                ditutup.
            </p>
            <p class="mb-0">Silahkan akses laman sesuai tanggal yang sudah ditentukan
                terimakasih.
            </p>
            <hr>
            <p class="mb-0">Ttd SDM RSU Harapan Ibu Purbalingga.</p>
        </div>
    @endif
@endsection

@push('plugin-scripts')
@endpush

@push('custom-scripts')
@endpush
