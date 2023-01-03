<?php
//membuat jadwal
function storeSchedule($job_id)
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
  for ($i = 1; $i < 14; $i++) {
    # code...
    $schedule = App\Models\Schedule::create([
      'uuid' => \Str::uuid()->getHex(),
      'job_id' => $job_id,
      'tahap' => $i,
      'nama_tahap' => $nama_tahap[$i],
      'tgl_mulai' => date('Y-m-d'),
      'status' => 1,
    ]);
  }

  return $schedule;
}


/**
 * Cek user if already apply job
 */
function userCheckApply($job_uuid)
{
  $jobId = Job::where('uuid', $job_uuid)->first();
  $user_id = \Auth::user()->id;

  $application = Application::where('user_id', $user_id)
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
