<div id="accordion" class="accordion" role="tablist">
    <div class="card">
        <div class="card-header" role="tab" id="headingSix">
            <h6 class="mb-0">
                <a class="collapsed" data-toggle="collapse" href="#collapseSix" aria-expanded="false"
                    aria-controls="collapseSix">
                    {{ $job->judul }}
                </a>
            </h6>
        </div>
        <div id="collapseSix" class="collapse" role="tabpanel" aria-labelledby="headingSix" data-parent="#accordion">
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
