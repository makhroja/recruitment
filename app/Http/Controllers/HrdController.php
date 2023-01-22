<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Unit;
use App\Models\Job;
use App\Models\JobDetail;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Validator;
use Illuminate\Support\Facades\Response;
use App\Models\Phase1;
use App\Models\Phase2;
use App\Models\Phase3;
use App\Models\Phase4;
use App\Models\Phase5;
use App\Models\Phase6;
use App\Models\Phase7;
use App\Models\Phase8;
use App\Models\Phase9;
use App\Models\User;

class KaruController extends Controller
{
    protected function validator($request)
    {
        $validator =  validator::make($request, [
            'job_id' => 'required',
            'phase' => 'required',
        ]);

        return $validator;
    }

    public function index()
    {
        $jobs = Job::pluck('judul', 'uuid')->all();
        $units = Unit::whereUser_id(\Auth::user()->id)->first();
        $details = JobDetail::whereUnit_id($units->id)->get();

        return view('karu.index', compact('jobs', 'details'));
    }

    public function postInputNilai(Request $request)
    {
        $validator = $this->validator($request->all());
        if ($validator->passes()) {
            $phase =  $request->phase;
            $jobs = Job::findOrFail(getJobId($request->job_id)->id);
            $units = Unit::whereUser_id(\Auth::user()->id)->first();
            $check_app = Application::whereJob_id(getJobId($request->job_id)->id)
                ->whereUnit_id($units->id);
            // dd($units);
            $apps = $check_app->whereAdministrasi(1)->latest()->paginate(5);
            $i = 1;
            return view('karu.list-peserta', compact('apps', 'i', 'jobs', 'phase', 'check_app'));
        }
        return back()
            ->withErrors($validator)
            ->withInput();
    }

    public function jsonInputNilai(Request $request)
    {
        $phase = phaseData($request->phase, $request->uuid);
        if ($phase == null) {
            return Response::json([
                'error' => 'Hasil nilai tahapan sebelumnya belum selesai.'
            ], 422);
        }
        return Response::json([
            'phase' => $phase,
            'test' => \Str::upper(phaseName($request->phase)),
            'judul' => $phase->application->job->judul
        ]);
    }

    public function storeNilai(Request $request)
    {
        $this->validate($request, [
            'uuid' => 'required',
            'phase' => 'required',
        ]);
        $phaseName = $request->phase;
        $uuid = $request->uuid;
        switch ($phaseName) {
            case 'phase1':
                $phase = Phase1::where('uuid', $uuid)->first();
                $phase->update($request->all());
                return Response::json([
                    'success' => 'Nilai ' . phaseName($phaseName) . ' berhasil disimpan'
                ]);
                break;
            case 'phase2':
                $this->validate($request, [
                    'nilai_akhir' => 'required',
                ]);
                $phase = Phase2::where('uuid', $uuid)->first();

                // Insert ke test berikutnya cek di Helpers
                Phase3::updateOrCreate([
                    'application_id' => $phase->application_id,
                ], [
                    'uuid' => \Str::uuid()->getHex(),
                    'application_id' => $phase->application_id,
                    'status' => 3
                ]);

                // update di application
                Application::findOrFail($phase->application_id)
                    ->update(['phase2' => $request->nilai_akhir]);

                $phase->update($request->all());

                return Response::json([
                    'success' => 'Nilai ' . phaseName($phaseName) . ' berhasil disimpan'
                ]);
                break;
            case 'phase3':
                $phase = Phase3::where('uuid', $uuid)->first();

                // Insert ke test berikutnya cek di Helpers
                Phase4::updateOrCreate([
                    'application_id' => $phase->application_id,
                ], [
                    'uuid' => \Str::uuid()->getHex(),
                    'application_id' => $phase->application_id,
                    'status' => 3
                ]);

                // update di application
                Application::findOrFail($phase->application_id)
                    ->update(['phase3' => $request->nilai_akhir]);

                $phase->update($request->all());

                return Response::json([
                    'success' => 'Nilai ' . phaseName($phaseName) . ' berhasil disimpan'
                ]);
                break;
            case 'phase4':
                $phase = Phase4::where('uuid', $uuid)->first();

                // Insert ke test berikutnya cek di Helpers
                Phase5::updateOrCreate([
                    'application_id' => $phase->application_id,
                ], [
                    'uuid' => \Str::uuid()->getHex(),
                    'application_id' => $phase->application_id,
                    'status' => 3
                ]);

                // update di application
                Application::findOrFail($phase->application_id)
                    ->update(['phase4' => $request->nilai_akhir]);

                $phase->update($request->all());

                return Response::json([
                    'success' => 'Nilai ' . phaseName($phaseName) . ' berhasil disimpan'
                ]);
                break;
            case 'phase5':
                $phase = Phase5::where('uuid', $uuid)->first();

                // Insert ke test berikutnya cek di Helpers
                Phase6::updateOrCreate([
                    'application_id' => $phase->application_id,
                ], [
                    'uuid' => \Str::uuid()->getHex(),
                    'application_id' => $phase->application_id,
                    'status' => 3
                ]);

                // update di application
                Application::findOrFail($phase->application_id)
                    ->update(['phase5' => $request->nilai_akhir]);

                $phase->update($request->all());
                return Response::json([
                    'success' => 'Nilai ' . phaseName($phaseName) . ' berhasil disimpan'
                ]);
                break;
            case 'phase6':
                $phase = Phase6::where('uuid', $uuid)->first();

                // Insert ke test berikutnya cek di Helpers
                Phase7::updateOrCreate([
                    'application_id' => $phase->application_id,
                ], [
                    'uuid' => \Str::uuid()->getHex(),
                    'application_id' => $phase->application_id,
                    'status' => 3
                ]);

                // update di application
                Application::findOrFail($phase->application_id)
                    ->update(['phase6' => $request->nilai_akhir]);

                $phase->update($request->all());

                return Response::json([
                    'success' => 'Nilai ' . phaseName($phaseName) . ' berhasil disimpan'
                ]);
                break;
            case 'phase7':
                $phase = Phase7::where('uuid', $uuid)->first();

                // Insert ke test berikutnya cek di Helpers
                Phase8::updateOrCreate([
                    'application_id' => $phase->application_id,
                ], [
                    'uuid' => \Str::uuid()->getHex(),
                    'application_id' => $phase->application_id,
                    'status' => 3
                ]);

                // update di application
                Application::findOrFail($phase->application_id)
                    ->update(['phase7' => $request->nilai_akhir]);

                $phase->update($request->all());

                return Response::json([
                    'success' => 'Nilai ' . phaseName($phaseName) . ' berhasil disimpan'
                ]);
                break;
            case 'phase8':
                $phase = Phase8::where('uuid', $uuid)->first();

                // Insert ke test berikutnya cek di Helpers
                Phase9::updateOrCreate([
                    'application_id' => $phase->application_id,
                ], [
                    'uuid' => \Str::uuid()->getHex(),
                    'application_id' => $phase->application_id,
                    'status' => 3
                ]);

                // update di application
                Application::findOrFail($phase->application_id)
                    ->update(['phase8' => $request->nilai_akhir]);

                $phase->update($request->all());

                return Response::json([
                    'success' => 'Nilai ' . phaseName($phaseName) . ' berhasil disimpan'
                ]);
                break;
            case 'phase9':
                $phase = Phase9::where('uuid', $uuid)->first();

                // update di application
                Application::findOrFail($phase->application_id)
                    ->update(['phase9' => $request->nilai_akhir]);

                $phase->update($request->all());

                return Response::json([
                    'success' => 'Nilai ' . phaseName($phaseName) . ' berhasil disimpan'
                ]);
                break;

            default:
                return 'Something Went Wrong!';
                break;
        }
        return Response::json([
            'Success' => 'Nilai was successfully saved.' . $request->nilai_akhir
        ]);

        // return response()->json(['errors' => $validator->errors()->all()], 422);
    }

    public function getInputNilai($phase, $uuid)
    {
        //
        switch ($phase) {
            case 'phase1':
                $method = $phase;
                $phase = Phase1::where('uuid', $uuid)->first();
                return view('karu.form.phase1', compact('phase', 'methode'));
                break;
            case 'phase2':
                $method = $phase;
                $phase = Phase2::where('uuid', $uuid)->first();
                return view('karu.form.phase2', compact('phase', 'method'));
                break;
            case 'phase3':
                $method = $phase;
                $phase = Phase3::where('uuid', $uuid)->first();
                return view('karu.form.phase3', compact('phase', 'method'));
                break;
            case 'phase4':
                $method = $phase;
                $phase = Phase4::where('uuid', $uuid)->first();
                return view('karu.form.phase4', compact('phase', 'method'));
                break;
            case 'phase5':
                $method = $phase;
                $phase = Phase5::where('uuid', $uuid)->first();
                return view('karu.form.phase5', compact('phase', 'method'));
                break;
            case 'phase6':
                $method = $phase;
                $phase = Phase6::where('uuid', $uuid)->first();
                return view('karu.form.phase6', compact('phase', 'method'));
                break;
            case 'phase7':
                $method = $phase;
                $phase = Phase7::where('uuid', $uuid)->first();
                return view('karu.form.phase7', compact('phase', 'method'));
                break;
            case 'phase8':
                $method = $phase;
                $phase = Phase8::where('uuid', $uuid)->first();
                return view('karu.form.phase8', compact('phase', 'method'));
                break;
            case 'phase9':
                $method = $phase;
                $phase = Phase9::where('uuid', $uuid)->first();
                return view('karu.form.phase9', compact('phase', 'method'));
                break;

            default:
                return 'Something Went Wrong!';
                break;
        }
    }

    public function getPesertaNilaiJson(Request $request, $phase = '', $job_id = '')
    {
        $units = Unit::whereUser_id(\Auth::user()->id)->first();
        $apps = Application::where('job_id', getJobId($job_id)->id)
            ->where('unit_id', $units->id)->where('administrasi', 1)->get();

        return DataTables::of($apps)
            ->addIndexColumn()
            ->addColumn('nama_lengkap', function ($row) {
                $nama = $row->user->userDetail->nama_lengkap;
                return $nama;
            })
            ->addColumn('action', function ($row) use ($phase) {
                $job = '  <a data-phase="' . $phase . '" data-id="' . $row->uuid . '"
                class="btn btn-sm btn-warning mt-1 mb-2 text-white inputNilai"
                value="">Input</a>';
                return $job;
            })
            ->rawColumns(['nama_lengkap', 'action'])
            ->make(true);
    }

    public function indexUser()
    {
        return view('karu.index-user');
    }
    public function showUser($uuid)
    {
        $user = User::where('uuid', $uuid)->first();

        return view('karu.show-user', compact('user'));
    }
    public function getUserJson(Request $request)
    {
        $unit = Unit::where('user_id', \Auth::user()->id)->first();
        $apps = Application::where('unit_id', getUnitId($unit->uuid)->id)->latest()->get();

        return DataTables::of($apps)
            ->addIndexColumn()
            ->addColumn('name', function ($row) {
                return $row->user->name;
            })
            ->addColumn('nama_lengkap', function ($row) {
                return $row->user->userDetail->nama_lengkap;
            })
            ->addColumn('email', function ($row) {
                return $row->user->email;
            })
            ->addColumn('lowongan', function ($row) {
                return $row->job->judul;
            })
            ->addColumn('posisi', function ($row) {
                return $row->position->nama;
            })
            ->addColumn('action', function ($row) {
                $btn = '<button href="javascript:void(0)" data-id="' . $row->user->uuid . '" data-original-title="Show" class="btn btn-outline-primary btn-icon show"><i class="feather icon-eye"></i></button>';

                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
