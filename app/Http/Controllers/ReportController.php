<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Exports\ExportPeserta;
use App\Exports\ExportUnit;
use App\Models\Job;
use App\Models\Unit;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    public function index()
    {
        $jobs = Job::pluck('judul', 'id')->all();
        return view('reports.index', [
            'jobs' => $jobs,
        ]);
    }
    public function exportPeserta(Request $request)
    {
        $this->validate($request, [
            'job_id' => 'required',
        ]);
        return Excel::download(new ExportPeserta($request->job_id, $request->akhir), 'peserta.xlsx');
    }

    public function exportUnit(Request $request)
    {
        // $this->validate($request, [
        //     'job_id' => 'required',
        // ]);
        return Excel::download(new ExportUnit($request->job_id), 'units.xlsx');
    }
}
