<?php

namespace App\Exports;

use App\Models\Job;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ExportUnit implements FromView
{
    protected $units;
    protected $job;
    protected $id;

    function __construct($job_id = '')
    {
        $this->id = $job_id;

        if ($job_id != 0) {
            $this->unit = Unit::join('jobs', 'jobs.id', '=', 'units.id')
                ->where('jobs.id', $this->id)
                ->get(['units.*', 'jobs.*']);
        } else {
            $this->unit = Unit::all();
        }
    }

    public function view(): View
    {

        $i = 1;
        return view('reports.units', [
            'units' => $this->unit,
            'i' => $i,
        ]);
    }
}
