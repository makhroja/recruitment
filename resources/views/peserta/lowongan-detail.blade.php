@extends('layout.master')
@section('title', 'Detail lowongan')
@push('plugin-styles')
@endpush

@section('content')
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
                                <strong> {{ Carbon\Carbon::parse($jobs->tgl_mulai)->translatedFormat('d F Y') }}</strong>
                                -
                                <strong> {{ Carbon\Carbon::parse($jobs->tgl_akhir)->translatedFormat('d F Y') }}</strong>
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
                    <br>
                    <p class="text-danger">Silahkan baca/download Surat Keputusan Direktur RSU Harapan Ibu Purbalingga
                        dibawah
                    </p>
                    <div class="modal-footer">
                        <a href="{{ url('/assets/uploads/job-attachment') }}/{{ $jobs->lampiran }}" target="_blank"
                            class="btn rounded-pill btn-dark text-white float-right">Download</a>
                        @if (userCheckApply($jobs->uuid) == false)
                            <a class="btn rounded-pill btn-primary text-white kirimLamaran float-right">Kirim Lamaran</a>
                        @endif
                    </div>
                    <br>
                    {{-- Lampiran SK Direktur
                    <iframe id="lowongan" src="{{ url('/assets/uploads/job-attachment') }}/{{ $jobs->lampiran }}"
                        frameborder="0" width="100%" height="800px"></iframe> --}}
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Lampiran -->
    <div id="modalLowongan" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg ">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="card-body">
                    <form id="applyJob" action="{{ route('kirim.lamaran') }}" method="post" accept="application/pdf"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="uuid" value="{{ $job->uuid }}">
                        <div class="form-group {{ $errors->has('position_id') ? 'has-error' : '' }}">
                            <label for="position_id" class="col-md-12 control-label">Pilih Posisi yang dilamar</label>
                            <div class="col-md-10">
                                <select style="width: 35%"
                                    class="form-control select2 @error('position_id') is-invalid @enderror" id="position_id"
                                    name="position_id" required>
                                    <option value="0" style="display: none;"disabled selected>Pilih Posisi</option>
                                    @foreach ($jobs->jobDetail as $jobD)
                                        <option data-nama="{{ posNama($jobD->position_id) }}"
                                            value="{{ $jobD->position->uuid }}">
                                            {{ posNama($jobD->position_id) }}
                                        </option>
                                    @endforeach
                                </select>

                                {!! $errors->first('user_id', '<small class="invalid-feedback" role="alert">:message</small>') !!}
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('attachments') ? 'has-error' : '' }}">
                            <label for="attachments" class="col-md-12 control-label">Pilih Berkas Lamaran Pekerjaan</label>
                            <div class="col-md-6">
                                <input name="file" type="file" id="file" class="myDropify" class="border"
                                    accept="application/pdf" required />
                            </div>
                        </div>
                    </form>
                    <button data-id="{{ $jobs->uuid }}" class="btn  badge-pill badge-danger float-right jobApply">Kirim
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('plugin-scripts')
@endpush

@push('custom-scripts')
    <script>
        $(function() {
            $('body').on('click', '.kirimLamaran', function() {
                $('#modalLowongan').modal('show');
            })

            $('body').on('click', '.closeModal', function() {
                $('#modalLowongan').modal('hide');
            })

        });
        @if (userCheckApply($jobs->uuid) == false)
            $(function() {
                //ajax setup
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta [name="csrf-token"]').attr('content')
                    }
                });

                $('body').on('click', '.jobApply', function() {
                    var select = document.getElementById('position_id');
                    var file = document.getElementById('file');
                    var text = select.options[select.selectedIndex].text;
                    if (select.value == 0 || file.value == '') {
                        swal({
                            title: 'Error!',
                            text: "Mohon cek kembali file yang diperlukan",
                            icon: 'warning',
                            buttons: true,
                            dangerMode: true,
                            reverseButtons: false,
                            buttons: {
                                cancel: 'Ok'
                            },
                        })
                    } else {
                        swal({
                            title: 'Anda Yakin?',
                            text: "Melamar lowongan {{ $jobs->judul }} dengan posisi : " + text,
                            icon: 'warning',
                            buttons: true,
                            dangerMode: true,
                            reverseButtons: false,
                            buttons: {
                                confirm: 'Ya',
                                cancel: 'Tidak'
                            },
                        }).then((apply) => {
                            if (apply) {
                                document.getElementById("applyJob").submit();
                            } else {
                                // 
                            }
                        });
                    }



                });

                /*
                 *End Document Ready
                 */
            });
        @endif
    </script>
    <script>
        $(function() {
            'use strict'

            if ($(".select2").length) {
                $(".select2").select2();
            }
        });
    </script>
@endpush
