<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Job;
use App\Models\Phase2;
use App\Models\Phase3;
use App\Models\Phase4;
use App\Models\Phase5;
use App\Models\Phase6;
use App\Models\Phase7;
use App\Models\Phase8;
use App\Models\Phase9;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;

class SdmController extends Controller
{
    public function index()
    {
        $jobs = Job::pluck('judul', 'uuid')->all();
        return view('sdm.index', compact('jobs'));
    }

    public function admSelection(Request $request)
    {
        $job_uuid = $request->job_uuid;
        return view('sdm.show', compact('job_uuid'));
    }

    public function statusUpdate(Request $request, $uuid)
    {

        $application = Application::where('uuid', $uuid)->first();

        // if ($application->administrasi == 1) {
        //     $administrasi = 2;
        // } else {
        //     $administrasi = 1;
        // }

        $application->update(['administrasi' => $request->status]);

        $phase_one = Phase2::updateOrCreate([
            'application_id' => getAppId($uuid)->id,
        ], [
            'uuid' => \Str::uuid()->getHex(),
            'application_id' => getAppId($uuid)->id,
            'status' => 3 //status 3 artinya nilai sudah di input, tapi belum di seleksi lg oleh sdm
        ]);

        if ($application->administrasi == 2) {
            return Response::json([
                'success' => 'Nama : ' . $application->user->userDetail->nama_lengkap . 'Tidak lolos administrasi'
            ]);
        }

        return Response::json([
            'success' => 'Nama : ' . $application->user->userDetail->nama_lengkap . ' lolos administrasi'
        ]);
    }

    public function getAdministrationJson($job_uuid = '')
    {

        $job = Job::where('uuid', $job_uuid)->first();
        $application = Application::where('job_id', $job->id)->get(['id', 'uuid', 'user_id', 'job_id', 'position_id', 'status', 'pdf', 'administrasi']);

        return DataTables::of($application)
            ->addIndexColumn()

            ->addColumn('pendidikan', function ($row) {
                $pendidikan = $row->user->userDetail->pendidikan;
                $jurusan = $row->user->userDetail->jurusan;
                $tahun_lulus = $row->user->userDetail->tahun_lulus;
                $data = $pendidikan . '-' . $jurusan . ' | ' . $tahun_lulus;
                return $data;
            })
            ->addColumn('instansi', function ($row) {
                return $row->user->userDetail->instansi;
            })
            ->addColumn('user', function ($row) {
                return $row->user->userDetail->nama_lengkap;
            })
            ->addColumn('position', function ($row) {
                return $row->position->nama;
            })
            ->addColumn('lampiran', function ($row) {
                $btn = '<button data-pdf="' . $row->pdf . '" class="btn btn-sm btn-outline-warning srcLampiran">Lihat</button>';
                return $btn;
            })
            ->addColumn('lolos', function ($row) {
                if ($row->administrasi == 1) {
                    $ya = 'checked';
                    $tidak = '';
                } elseif ($row->administrasi == 2) {
                    $ya = '';
                    $tidak = 'checked';
                } else {
                    $ya = '';
                    $tidak = '';
                }

                $btn = '
                <div class="form-check form-check-inline">
                <label class="form-check-label">Ya
                <input id="checkbox-' . $row->id . '" href="javascript:void(0)" name="status' . $row->id . '" type="checkbox" ' . $ya . ' data-name="' . $row->user->name . '" data-id="' . $row->uuid . '"  data-status = "1" class="form-check-input status"><i class="input-frame"></i>
                </label>
                </div>

                ';
                return $btn;
            })
            ->addColumn('tidak_lolos', function ($row) {
                if ($row->administrasi == 1) {
                    $ya = '';
                    $tidak = 'checked';
                } elseif ($row->administrasi == 2) {
                    $ya = 'checked';
                    $tidak = '';
                } else {
                    $ya = '';
                    $tidak = '';
                }

                $btn = '
                <div class="form-check form-check-inline">
                <label class="form-check-label">Tidak
                <input id="checkbox-' . $row->id . '" href="javascript:void(0)" name="status' . $row->id . '" type="checkbox" ' . $ya . ' data-name="' . $row->user->name . '" data-id="' . $row->uuid . '"  data-status = "2" class="form-check-input status"><i class="input-frame"></i>
                </label>
                </div>
                ';
                return $btn;
            })
            ->rawColumns(['action', 'user', 'position', 'lampiran', 'lolos', 'tidak_lolos', 'pendidikan', 'instansi'])
            ->make(true);
    }

    //Phase3
    public function getPhase2Json(Request $request, $job_uuid = '')
    {
        if ($request->ajax()) {
            return Phase2::getPhase2Json($job_uuid);
        }

        $jobs = Job::pluck('judul', 'uuid')->all();
        return view('sdm.phase.phase2', compact('jobs'));
    }

    public function statusPhase2(Request $request, $uuid)
    {
        return Phase2::statusPhase2($request, $uuid);
    }

    // Phase3
    public function getPhase3Json(Request $request, $job_uuid = '')
    {
        if ($request->ajax()) {
            return Phase3::getPhase3Json($job_uuid);
        }

        $jobs = Job::pluck('judul', 'uuid')->all();
        return view('sdm.phase.phase3', compact('jobs'));
    }

    public function statusPhase3(Request $request, $uuid)
    {
        return Phase3::statusPhase3($request, $uuid);
    }

    // Phase4
    public function getPhase4Json(Request $request, $job_uuid = '')
    {
        if ($request->ajax()) {
            return Phase4::getPhase4Json($job_uuid);
        }

        $jobs = Job::pluck('judul', 'uuid')->all();
        return view('sdm.phase.phase4', compact('jobs'));
    }

    public function statusPhase4(Request $request, $uuid)
    {
        return Phase4::statusPhase4($request, $uuid);
    }

    // Phase5
    public function getPhase5Json(Request $request, $job_uuid = '')
    {
        if ($request->ajax()) {
            return Phase5::getPhase5Json($job_uuid);
        }

        $jobs = Job::pluck('judul', 'uuid')->all();
        return view('sdm.phase.phase5', compact('jobs'));
    }

    public function statusPhase5(Request $request, $uuid)
    {
        return Phase5::statusPhase5($request, $uuid);
    }

    // Phase6
    public function getPhase6Json(Request $request, $job_uuid = '')
    {
        if ($request->ajax()) {
            return Phase6::getPhase6Json($job_uuid);
        }

        $jobs = Job::pluck('judul', 'uuid')->all();
        return view('sdm.phase.phase6', compact('jobs'));
    }

    public function statusPhase6(Request $request, $uuid)
    {
        return Phase6::statusPhase6($request, $uuid);
    }

    // Phase7
    public function getPhase7Json(Request $request, $job_uuid = '')
    {
        if ($request->ajax()) {
            return Phase7::getPhase7Json($job_uuid);
        }

        $jobs = Job::pluck('judul', 'uuid')->all();
        return view('sdm.phase.phase7', compact('jobs'));
    }

    public function statusPhase7(Request $request, $uuid)
    {
        return Phase7::statusPhase7($request, $uuid);
    }

    // Phase8
    public function getPhase8Json(Request $request, $job_uuid = '')
    {
        if ($request->ajax()) {
            return Phase8::getPhase8Json($job_uuid);
        }

        $jobs = Job::pluck('judul', 'uuid')->all();
        return view('sdm.phase.phase8', compact('jobs'));
    }

    public function statusPhase8(Request $request, $uuid)
    {
        return Phase8::statusPhase8($request, $uuid);
    }

    // Phase9
    public function getPhase9Json(Request $request, $job_uuid = '')
    {
        if ($request->ajax()) {
            return Phase9::getPhase9Json($job_uuid);
        }

        $jobs = Job::pluck('judul', 'uuid')->all();
        return view('sdm.phase.phase9', compact('jobs'));
    }

    public function statusPhase9(Request $request, $uuid)
    {
        return Phase9::statusPhase9($request, $uuid);
    }
}
