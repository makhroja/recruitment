<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Job;
use App\Models\Position;
use App\Models\Schedule;
use App\Models\Unit;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class PesertaController extends Controller
{
    public function jobList()
    {
        $jobs = Job::paginate(4);

        return view('peserta.list-lowongan', compact('jobs'));
    }

    public function lowonganDetail($uuid)
    {
        $jobs = Job::whereUuid($uuid)->first();

        // return $stat;
        if (berkasLamar($uuid)) {
            return view('peserta.lowongan-detail', [
                'jobs' => $jobs,
                'job' => $jobs,
                'schedule' => $jobs->schedule->first(),
                'tahap' => storeSchedule()
            ]);
        }
        return view('peserta.closed', compact('jobs'));
    }

    public function kirimLamaran(Request $request)
    {
        //check if user already apply this job
        if (userCheckApply($request->uuid)) {
            return back()->with([
                'success' => 'Anda sudah kirim lamaran pada lowongan ini.'
            ]);
        }

        $userDetail = UserDetail::where('user_id', \Auth::user()->id)->first();
        if (is_null($userDetail->nama_lengkap)) {
            return redirect()->route('userDetails.edit', \Auth::user()->userDetail->uuid)->withInfo('Silahkan melakukan update profil untuk dapat melanjutkan proses melamar pekerjaan');
        }

        $validator =  Validator::make($request->all(), [
            'position_id' => 'required',
            'file' => 'required|mimetypes:application/pdf|max:1024'
        ]);

        if ($validator->passes()) {

            $fileName =  Str::uuid()->getHex() . '.' . $request['file']->extension();

            if ($request['file'] != null) {

                $request['file']->move(public_path('/assets/uploads/attachment/'), $fileName);
            }

            $data = [
                'uuid' => Str::uuid()->getHex(),
                'job_id' => getJobId($request->uuid)->id,
                'position_id' => getPositionId($request->position_id)->id,
                'unit_id' => getPositionId($request->position_id)->unit_id,
                'user_id' => \Auth::user()->id,
                'status' => 0,
                'pdf' => $fileName
            ];

            $apply = Application::create($data);

            return redirect()->route('lowongan.detail', $request->uuid)->withSuccess('Lamaran berhasil dikirim.');
        }
        return back()
            ->withErrors($validator)
            ->withInput();
    }

    public function jadwalSeleksi()
    {
        $app = Application::where('user_id', \Auth::user()->id)->select('job_id')->get();

        $jobId = [];
        for ($i = 0; $i < count($app); $i++) {
            $jobId[] = $app[$i]->job_id;
        }

        $jobs = Job::whereIn('id', $jobId)->orderBy('id', 'ASC')->paginate(4);

        $schedules = Schedule::whereIn('job_id', $jobId)->orderBy('tahapan_id', 'ASC')->paginate(4);

        $tahap = storeSchedule();
        return view('peserta.jadwal-seleksi', compact('jobs','schedules', 'tahap'));
    }

    public function hasilSeleksi()
    {
        return view('peserta.hasil-seleksi');
    }

    public function detailSeleksi($uuid)
    {
        $application = Application::whereUuid($uuid)->first();

        $tahap = storeSchedule();
        return view('peserta.detail-seleksi', compact('application', 'tahap'));
    }

    public function getApplicationJson(Request $request)
    {
        $application = Application::whereUser_id(\Auth::user()->id)->latest()->get();

        return DataTables::of($application)
            ->addIndexColumn()
            ->addColumn('job', function ($row) {
                $job = '<a href="#" data-uuid="' . $row->uuid . '" class="hasil-seleksi">' . $row->job->judul . '</a>';
                return $job;
            })
            ->addColumn('posisi', function ($row) {
                return $row->position->nama;
            })
            ->rawColumns(['job', 'posisi'])
            ->make(true);
    }
}
