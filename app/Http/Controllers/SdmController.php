<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Job;
use App\Models\Phase2;
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
            'application_id' => getAppId($uuid)->id
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
                } elseif ($row->administrasi == '') {
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
                } elseif ($row->administrasi == '') {
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
}
