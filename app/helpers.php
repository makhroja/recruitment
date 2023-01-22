<?php

use App\Models\Phase1;
use App\Models\Phase2;
use App\Models\Phase3;
use App\Models\Phase4;
use App\Models\Phase5;
use App\Models\Phase6;
use App\Models\Phase7;
use App\Models\Phase8;
use App\Models\Phase9;

function berkasLamar($uuid)
{

    $jobs = App\Models\Job::whereUuid($uuid)->first();

    $date = strtotime(date('Y-m-d'));
    $start_date = strtotime($jobs->tgl_mulai);
    $end_date = strtotime($jobs->tgl_akhir);
    return $date >= $start_date && $date <= $end_date;
}

function posNama($id)
{
    return App\Models\Position::findOrFail($id)->nama;
}
//membuat jadwal
function storeSchedule()
{
    $nama_tahap = [
        1 => 'Pengumpulan Berkas Lamaran',
        2 => 'Seleksi Administrasi',
        3 => 'Pengumuman Lolos Seleksi Administrasi',
        4 => 'Tes Tertulis, Wawancara Unit & Praktek',
        5 => 'Pengumuman Lolos Wawancara Unit & Praktek',
        6 => 'Wawancara HRD',
        7 => 'Pengumuman Lolos Wawancara HRD',
        8 => 'Psikotes',
        9 => 'Pengumuman Lolos Psikotes',
        10 => 'Wawancara Performance',
        11 => 'Pengumuman Lolos Wawancara Performance',
        12 => 'Tes Kesehatan',
        13 => 'Pengumuman Tes Kesehatan & Tahap Akhir',
    ];
    // for ($i = 1; $i < 14; $i++) {
    //   # code...
    //   $schedule = App\Models\Schedule::create([
    //     'uuid' => \Str::uuid()->getHex(),
    //     'job_id' => $job_id,
    //     'tahap' => $i,
    //     'nama_tahap' => $nama_tahap[$i],
    //     'tgl_mulai' => date('Y-m-d'),
    //     'status' => 1,
    //   ]);
    // }

    return $nama_tahap;
}

function phaseName($p)
{
    $phase = [
        'phase1' => 'Seleksi Administrasi',
        'phase2' => 'Tes Tertulis',
        'phase3' => 'Wawancara Unit',
        'phase4' => 'Praktek',
        'phase5' => 'Wawancara HRD',
        'phase6' => 'Tes Psikotes',
        'phase7' => 'Wawancara Performance',
        'phase8' => 'Tes Kesehatan',
        'phase9' => 'Tahap Akhir',
    ];

    foreach ($phase as $key => $value) {
        if ($p == $key) {
            return $value;
        }
    }
}

function phaseStatus($p, $uuid)
{
    $id =  getAppId($uuid)->id;
    switch ($p) {
        case 'phase1':
            return Phase1::where('application_id', $id)->first();
            break;
        case 'phase2':
            return Phase2::where('application_id', $id)->first();
            break;
        case 'phase3':
            return Phase3::where('application_id', $id)->first();
            break;
        case 'phase4':
            return Phase4::where('application_id', $id)->first();
            break;
        case 'phase5':
            return Phase5::where('application_id', $id)->first();
            break;
        case 'phase6':
            return Phase6::where('application_id', $id)->first();
            break;
        case 'phase7':
            return Phase7::where('application_id', $id)->first();
            break;
        case 'phase8':
            return Phase8::where('application_id', $id)->first();
            break;
        case 'phase9':
            return Phase9::where('application_id', $id)->first();
            break;

        default:
            return 'Something Went Wrong!';
            break;
    }
}

function phaseData($p, $uuid)
{
    $id = getAppId($uuid)->id;
    switch ($p) {
        case 'phase1':
            return Phase1::where('application_id', $id)->where('status', 3)->first();
            break;
        case 'phase2':
            return Phase2::where('application_id', $id)->where('status', 3)->first();
            break;
        case 'phase3':
            return Phase3::where('application_id', $id)->where('status', 3)->first();
            break;
        case 'phase4':
            return Phase4::where('application_id', $id)->where('status', 3)->first();
            break;
        case 'phase5':
            return Phase5::where('application_id', $id)->where('status', 3)->first();
            break;
        case 'phase6':
            return Phase6::where('application_id', $id)->where('status', 3)->first();
            break;
        case 'phase7':
            return Phase7::where('application_id', $id)->where('status', 3)->first();
            break;
        case 'phase8':
            return Phase8::where('application_id', $id)->where('status', 3)->first();
            break;
        case 'phase9':
            return Phase9::where('application_id', $id)->where('status', 3)->first();
            break;

        default:
            return 'Something Went Wrong!';
            break;
    }
}

/**
 * Cek user if already apply job
 */
function userCheckApply($job_uuid)
{
    $jobId = App\Models\Job::where('uuid', $job_uuid)->first();
    $user_id = \Auth::user()->id;

    $application = App\Models\Application::where('user_id', $user_id)
        ->where('job_id', $jobId->id)->exists();

    return $application;
}

function getRole()
{
    return \Auth::user()->roles->pluck('name')->first();
}

function CheckRole()
{
    $role = \Auth::user()->roles->pluck('name')->first();
    switch ($role) {
        case 'administrator':
            return redirect()->route('admin');
            break;
        case 'direktur':
            return redirect()->route('direktur');
            break;
        case 'hrd':
            return redirect()->route('hrd');
            break;
        case 'sdm':
            return redirect()->route('sdm');
            break;
        case 'karu':
            return redirect()->route('karu');
            break;
        case 'peserta':
            return redirect()->route('peserta');
            break;
        default:
            return view('pages.error.404');
            break;
    }
}

function umur($tanggal_lahir)
{
    $birthDate = new DateTime($tanggal_lahir);
    $today = new DateTime("today");
    if ($birthDate > $today) {
        exit("0 tahun 0 bulan 0 hari");
    }
    $y = $today->diff($birthDate)->y;
    $m = $today->diff($birthDate)->m;
    $d = $today->diff($birthDate)->d;
    return $y . " tahun";
    // return $y . " tahun " . $m . " bulan " . $d . " hari";
}

function active_class($path, $active = 'active')
{
    return call_user_func_array('Request::is', (array) $path) ? $active : '';
}

function is_active_route($path)
{
    return call_user_func_array('Request::is', (array) $path) ? 'true' : 'false';
}

function show_class($path)
{
    return call_user_func_array('Request::is', (array) $path) ? 'show' : '';
}

function getJobId($uuid)
{
    return App\Models\Job::where('uuid', $uuid)->first();
}

function getUnitId($uuid)
{
    return App\Models\Unit::where('uuid', $uuid)->first();
}

function getPositionId($uuid)
{
    return App\Models\Position::where('uuid', $uuid)->first();
}

function getAppId($uuid)
{
    return App\Models\Application::where('uuid', $uuid)->first();
}

function jadwal()
{
    $jadwal = '
<p>&nbsp;</p>
<table class="table table-bordered table-hover table-striped">
<tbody>
<tr class="table-info">
<td style="width: 38px;">
<p>No</p>
</td>
<td style="width: 378px;">
<p>Tahapan Seleksi</p>
</td>
<td style="width: 179px;">Tanggal</td>
</tr>
<tr>
<td style="width: 38px;">
<p>1.</p>
</td>
<td style="width: 378px;">
<p>Pengumpulan Berkas Lamaran</p>
</td>
<td style="width: 179px;">&nbsp;</td>
</tr>
<tr>
<td style="width: 38px;">
<p>2.</p>
</td>
<td style="width: 378px;">
<p>Seleksi Administrasi</p>
</td>
<td style="width: 179px;">&nbsp;</td>
</tr>
<tr>
<td style="width: 38px;">
<p>3.</p>
</td>
<td style="width: 378px;">
<p>Pengumuman Lolos Seleksi Administrasi</p>
</td>
<td style="width: 179px;">&nbsp;</td>
</tr>
<tr>
<td style="width: 38px;">
<p>4.</p>
</td>
<td style="width: 378px;">
<p>Tes Tertulis</p>
</td>
<td style="width: 179px;">&nbsp;</td>
</tr>
<tr>
<td style="width: 38px;">
<p>5.</p>
</td>
<td style="width: 378px;">
<p>Pengumuman Lolos Tes Tertulis</p>
</td>
<td style="width: 179px;">&nbsp;</td>
</tr>
<tr>
<td style="width: 38px;">
<p>6.</p>
</td>
<td style="width: 378px;">
<p>Wawancara Unit</p>
</td>
<td style="width: 179px;">&nbsp;</td>
</tr>
<tr>
<td style="width: 38px;">
<p>7.</p>
</td>
<td style="width: 378px;">
<p>Praktek</p>
</td>
<td style="width: 179px;">&nbsp;</td>
</tr>
<tr>
<td style="width: 38px;">
<p>8.</p>
</td>
<td style="width: 378px;">
<p>Pengumuman Lolos Wawancara Unit</p>
</td>
<td style="width: 179px;">&nbsp;</td>
</tr>
<tr>
<td style="width: 38px;">
<p>9.</p>
</td>
<td style="width: 378px;">
<p>Pengumuman Lolos Praktek</p>
</td>
<td style="width: 179px;">&nbsp;</td>
</tr>
<tr>
<td style="width: 38px;">
<p>10.</p>
</td>
<td style="width: 378px;">
<p>Wawancara HRD</p>
</td>
<td style="width: 179px;">&nbsp;</td>
</tr>
<tr>
<td style="width: 38px;">
<p>11.</p>
</td>
<td style="width: 378px;">
<p>Pengumuman Lolos Wawancara HRD</p>
</td>
<td style="width: 179px;">&nbsp;</td>
</tr>
<tr>
<td style="width: 38px;">
<p>12.</p>
</td>
<td style="width: 378px;">
<p>Wawancara Performance</p>
</td>
<td style="width: 179px;">&nbsp;</td>
</tr>
<tr>
<td style="width: 38px;">
<p>13.</p>
</td>
<td style="width: 378px;">
<p>Pengumuman Lolos Wawancara Performance</p>
</td>
<td style="width: 179px;">&nbsp;</td>
</tr>
<tr>
<td style="width: 38px;">
<p>14.</p>
</td>
<td style="width: 378px;">
<p>Tes Kesehatan</p>
</td>
<td style="width: 179px;">&nbsp;</td>
</tr>
<tr>
<td style="width: 38px;">
<p>15.</p>
</td>
<td style="width: 378px;">
<p>Pengumuman Tes Kesehatan &amp; Tahap Akhir</p>
</td>
<td style="width: 179px;">&nbsp;</td>
</tr>
<tr>
<td style="width: 38px;">
<p><strong>&nbsp;</strong></p>
<p>16.</p>
</td>
<td style="width: 560px;" colspan="2">
<p>Pengumuman&nbsp;&nbsp;&nbsp; lolos&nbsp;&nbsp;&nbsp; seleksi&nbsp;&nbsp; administrasi&nbsp;&nbsp; akan&nbsp;&nbsp; diumumkan&nbsp;&nbsp; melalui&nbsp;&nbsp;&nbsp; website</p>
<p><a href="https://recruitment.rsuharapanibu.co.id/"><strong><u>https://recruitment.rsuharapanibu.co.id/</u></strong></a><strong> </strong>sesuai pada jadwal seleksi yang telah ditentukan. dan tidak ada panggilan via Telepon / SMS.</p>
</td>
</tr>
</tbody>
</table>
<p>&nbsp;</p>
    ';
    return $jadwal;
}
