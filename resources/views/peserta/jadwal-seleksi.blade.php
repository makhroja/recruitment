@extends('layout.master')

@section('content')

    @if (Session::has('success_message'))
        <div class="alert alert-success">
            <span class="glyphicon glyphicon-ok"></span>
            {!! session('success_message') !!}

            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
    @endif
    <div class="pull-left">
        <h4 class="">Jadwal Seleksi</h4>
    </div>
    <div class="card panel-default">

        <div class="card-header clearfix">



            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('peserta') }}" class="btn btn-dark" title="Dashboard">
                    <span class="feather icon-arrow-left" aria-hidden="true"> Kembali</span>
                </a>
            </div>

        </div>

        @if (count($schedules) == 0)
            <div class="card-body text-center">
                <h4>Tidak ada jadwal untuk ditampilkan</h4>
            </div>
        @else
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 0%">No. </th>
                            <th>Lowongan</th>
                            <th style="width: 0%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach ($schedules as $schedule)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>
                                    {{ $schedule->job->judul }}
                                    {{-- <div class="modal fade " id="bd-example-modal-lg-{{ $schedule->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="card-body">
                                                    <table class="table table-bordered table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>
                                                                    Tahapan Seleksi
                                                                </th>
                                                                <th style="width: 25%">
                                                                    Tanggal
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    {{ $tahap[1] }}
                                                                </td>
                                                                <td>
                                                                    {{ Carbon\Carbon::parse($schedule->tahap_1)->translatedFormat('d F Y') }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    {{ $tahap[2] }}
                                                                </td>
                                                                <td>
                                                                    {{ Carbon\Carbon::parse($schedule->tahap_2)->translatedFormat('d F Y') }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    {{ $tahap[3] }}
                                                                </td>
                                                                <td>
                                                                    {{ Carbon\Carbon::parse($schedule->tahap_3)->translatedFormat('d F Y') }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    {{ $tahap[4] }}
                                                                </td>
                                                                <td>
                                                                    {{ Carbon\Carbon::parse($schedule->tahap_4)->translatedFormat('d F Y') }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    {{ $tahap[5] }}
                                                                </td>
                                                                <td>
                                                                    {{ Carbon\Carbon::parse($schedule->tahap_5)->translatedFormat('d F Y') }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    {{ $tahap[6] }}
                                                                </td>
                                                                <td>
                                                                    {{ Carbon\Carbon::parse($schedule->tahap_6)->translatedFormat('d F Y') }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    {{ $tahap[7] }}
                                                                </td>
                                                                <td>
                                                                    {{ Carbon\Carbon::parse($schedule->tahap_7)->translatedFormat('d F Y') }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    {{ $tahap[8] }}
                                                                </td>
                                                                <td>
                                                                    {{ Carbon\Carbon::parse($schedule->tahap_8)->translatedFormat('d F Y') }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    {{ $tahap[9] }}
                                                                </td>
                                                                <td>
                                                                    {{ Carbon\Carbon::parse($schedule->tahap_9)->translatedFormat('d F Y') }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    {{ $tahap[10] }}
                                                                </td>
                                                                <td>
                                                                    {{ Carbon\Carbon::parse($schedule->tahap_10)->translatedFormat('d F Y') }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    {{ $tahap[11] }}
                                                                </td>
                                                                <td>
                                                                    {{ Carbon\Carbon::parse($schedule->tahap_11)->translatedFormat('d F Y') }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    {{ $tahap[12] }}
                                                                </td>
                                                                <td>
                                                                    {{ Carbon\Carbon::parse($schedule->tahap_12)->translatedFormat('d F Y') }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    {{ $tahap[13] }}
                                                                </td>
                                                                <td>
                                                                    {{ Carbon\Carbon::parse($schedule->tahap_13)->translatedFormat('d F Y') }}
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                    <div id="bd-example-modal-lg-{{ $schedule->id }}" class="modal fade bd-example-modal-lg"
                                        tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <div align="center" class="table-responsive table-jadwal">
                                                        {!! $schedule->jadwal !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </td>
                                <td>
                                    <button type="button" class="btn btn-warning btn-sm text-white" data-toggle="modal"
                                        data-target="#bd-example-modal-lg-{{ $schedule->id }}">Lihat</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="card-footer">
                {!! $schedules->render() !!}
            </div>
        @endif

    </div>
@endsection
@push('custom-scripts')
    <script type="text/javascript">
        $(function() {

            $('table').addClass('table table-bordered table-hover ');

        });
    </script>
@endpush
