<?php

namespace App\Exports;

use App\Models\Job;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ExportPeserta implements FromView
{
    protected $job_id;
    protected $users;
    protected $type;

    function __construct($job_id = '', $akhir = '')
    {
        $this->id = $job_id;
        $this->job = Job::findOrFail($job_id);
        $this->users = User::join('user_details', 'user_details.user_id', '=', 'users.id')
            ->join('applications', 'applications.user_id', '=', 'users.id')
            ->join('jobs', 'jobs.id', '=', 'applications.job_id')
            ->where('users.role', 'peserta')
            ->where(function ($query) use ($akhir) {
                if ($akhir == 1) {
                    $query->where('applications.phase9s', 1);
                } else { }
            })
            ->where('jobs.id', $this->id)
            ->where('user_details.foto', '!=', null)
            ->get(['users.*', 'user_details.*', 'jobs.*', 'applications.*']);
        if ($akhir == 1) {
            $this->type = 'Lolos Tahap Akhir' . $this->job->judul;
        } else {
            $this->type = $this->job->judul;
        }
    }

    public function view(): View
    {

        $i = 1;
        return view('reports.peserta-all', [
            'peserta' => $this->users,
            'i' => $i,
            'type' => $this->type
        ]);
    }
}
