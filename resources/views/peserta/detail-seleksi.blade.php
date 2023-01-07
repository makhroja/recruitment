@extends('layout.master2')
@section('title', '')
@section('content')
    <div>
        <h4 class="mb-3 mb-md-0">Hasil Seleksi</h4>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th style="width: 0%">No</th>
                                <th>Tahapan</th>
                                <th style="width: 0%">Hasil Seleksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Tahap 1 --}}

                            <tr>
                                <td>1.</td>
                                <td>Seleksi Administrasi</td>
                                <td style="text-align: center">
                                    @if (!empty($application->administrasi))
                                        @if ($application->administrasi == 1)
                                            <span class="badge badge-success">Lolos </span>
                                        @else
                                            <span class="badge badge-secondary">Tidak Lolos </span>
                                        @endif
                                    @else
                                        <span class="badge badge-primary">Belum Tersedia</span>
                                    @endif
                                </td>
                            </tr>
                            {{-- ================== --}}
                            {{-- Tahap 2 --}}
                            <tr>
                                <td>2.</td>
                                <td>Tes Tertulis</td>
                                <td style="text-align: center">
                                    @if (!empty($application->tertulis))
                                        @if ($application->tertulis == 1)
                                            <span class="badge badge-success">Lolos </span>
                                        @else
                                            <span class="badge badge-secondary">Tidak Lolos </span>
                                        @endif
                                    @else
                                        <span class="badge badge-primary">Belum Tersedia</span>
                                    @endif
                                </td>
                            </tr>
                            {{-- ================== --}}
                            {{-- Tahap 3 --}}
                            <tr>
                                <td>3.</td>
                                <td>Wawancara Unit</td>
                                <td style="text-align: center">
                                    @if (!empty($application->wawancara_unit))
                                        @if ($application->wawancara_unit == 1)
                                            <span class="badge badge-success">Lolos </span>
                                        @else
                                            <span class="badge badge-secondary">Tidak Lolos </span>
                                        @endif
                                    @else
                                        <span class="badge badge-primary">Belum Tersedia</span>
                                    @endif
                                </td>
                            </tr>
                            {{-- ================== --}}
                            {{-- Tahap 4 --}}
                            <tr>
                                <td>4.</td>
                                <td>Tes Praktek</td>
                                <td style="text-align: center">
                                    @if (!empty($application->praktek))
                                        @if ($application->praktek == 1)
                                            <span class="badge badge-success">Lolos </span>
                                        @else
                                            <span class="badge badge-secondary">Tidak Lolos </span>
                                        @endif
                                    @else
                                        <span class="badge badge-primary">Belum Tersedia</span>
                                    @endif
                                </td>
                            </tr>
                            {{-- ================== --}}
                            {{-- Tahap 5 --}}
                            <tr>
                                <td>5.</td>
                                <td>Wawancara HRD</td>
                                <td style="text-align: center">
                                    @if (!empty($application->tertulis))
                                        @if ($application->administrasi == 1)
                                            <span class="badge badge-success">Lolos </span>
                                        @else
                                            <span class="badge badge-secondary">Tidak Lolos </span>
                                        @endif
                                    @else
                                        <span class="badge badge-primary">Belum Tersedia</span>
                                    @endif
                                </td>
                            </tr>
                            {{-- ================== --}}
                            {{-- Tahap 6 --}}
                            <tr>
                                <td>6.</td>
                                <td>Tes Psikotes</td>
                                <td style="text-align: center">
                                    @if (!empty($application->psikotes))
                                        @if ($application->psikotes == 1)
                                            <span class="badge badge-success">Lolos </span>
                                        @else
                                            <span class="badge badge-secondary">Tidak Lolos </span>
                                        @endif
                                    @else
                                        <span class="badge badge-primary">Belum Tersedia</span>
                                    @endif
                                </td>
                            </tr>
                            {{-- ================== --}}
                            {{-- Tahap 7 --}}
                            <tr>
                                <td>7.</td>
                                <td>Wawancara Performance</td>
                                <td style="text-align: center">
                                    @if (!empty($application->wawancara_performance))
                                        @if ($application->wawancara_performance == 1)
                                            <span class="badge badge-success">Lolos </span>
                                        @else
                                            <span class="badge badge-secondary">Tidak Lolos </span>
                                        @endif
                                    @else
                                        <span class="badge badge-primary">Belum Tersedia</span>
                                    @endif
                                </td>
                            </tr>
                            {{-- ================== --}}
                            {{-- Tahap 8 --}}
                            <tr>
                                <td>8.</td>
                                <td>Tes Kesehatan</td>
                                <td style="text-align: center">
                                    @if (!empty($application->kesehatan))
                                        @if ($application->kesehatan == 1)
                                            <span class="badge badge-success">Lolos </span>
                                        @else
                                            <span class="badge badge-secondary">Tidak Lolos </span>
                                        @endif
                                    @else
                                        <span class="badge badge-primary">Belum Tersedia</span>
                                    @endif
                                </td>
                            </tr>
                            {{-- ================== --}}
                            {{-- Tahap 9 --}}
                            <tr>
                                <td>9.</td>
                                <td>Tahap Akhir</td>
                                <td style="text-align: center">
                                    @if (!empty($application->tahap_akhir))
                                        @if ($application->tahap_akhir == 1)
                                            <span class="badge badge-success">Lolos </span>
                                        @else
                                            <span class="badge badge-secondary">Tidak Lolos </span>
                                        @endif
                                    @else
                                        <span class="badge badge-primary">Belum Tersedia</span>
                                    @endif
                                </td>
                            </tr>
                            {{-- ================== --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('plugin-scripts')
@endpush
@push('custom-scripts')
@endpush
