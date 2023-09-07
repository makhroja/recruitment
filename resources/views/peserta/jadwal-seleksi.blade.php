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
                @foreach ($jobs as $job)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>
                        {{ $job->judul }}
                        <div class="modal fade " id="bd-example-modal-lg-{{ $job->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
                                                @foreach ($schedules as $schedule)
                                                <tr>
                                                    <td>
                                                        {{ $schedule->title }}
                                                    </td>
                                                    <td>
                                                        {{ Carbon\Carbon::parse($schedule->start)->translatedFormat('d F Y') }}
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <button type="button" class="btn btn-warning btn-sm text-white" data-toggle="modal" data-target="#bd-example-modal-lg-{{ $job->id }}">Lihat</button>
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