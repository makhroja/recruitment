<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\JobDetail;
use App\Models\Position;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Http\Request;
use Exception;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;
use Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class JobsController extends Controller
{


    public function index()
    {
        $jobs = Job::with('user', 'unit', 'position')->paginate(25);

        return view('jobs.index', compact('jobs'));
    }

    public function create(Request $request)
    {

        $users = User::pluck('name', 'id')->all();
        $units = Unit::pluck('nama', 'id')->all();
        $positions = Position::pluck('nama', 'id')->all();
        $method = 'create';
        return view('jobs.create', compact('users', 'units', 'positions', 'method'));
    }

    public function store(Request $request)
    {
        try {
            $request = $request->merge([
                'uuid' => Str::uuid()->getHex(),
                'status' => 0,
            ]);

            $validator = $this->jobValidator($request->all());

            if ($validator->passes()) {

                $fileName = date('d-m-Y') . '_' . time() . '.' . $request['file']->extension();

                if ($request['file'] != null) {

                    $request['file']->move(public_path('/assets/uploads/job-attachment/'), $fileName);

                    $request = $request->merge([
                        'lampiran' => $fileName
                    ]);
                }

                $job = Job::create($request->all());

                // dd($request->all());

                return redirect()->route('jobs.index')
                    ->withSuccess('Job berhasil dibuat.');
            }
            return back()
                ->withErrors($validator)
                ->withInput();
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }


    public function show($uuid)
    {
        $job = Job::with('user', 'unit', 'position')->where('uuid', $uuid)->first();
        $units = Unit::pluck('nama', 'id')->all();
        $positions = Position::pluck('nama', 'id')->all();
        return view('jobs.show', compact('job', 'units', 'positions'));
    }


    public function edit($uuid)
    {
        $method = 'edit';
        $job = Job::where('uuid', $uuid)->first();
        $users = User::pluck('name', 'id')->all();
        $units = Unit::pluck('nama', 'id')->all();
        $positions = Position::pluck('nama', 'id')->all();
        // dd($job->jobDetail);
        return view('jobs.edit', compact('job', 'users', 'units', 'positions', 'method'));
    }


    public function update($uuid, Request $request)
    {
        // try {
        $validator = $this->jobValidator($request->all());

        if ($validator->passes()) {

            $job = Job::where('uuid', $uuid)->first();

            /**Start Image Function */
            if ($request['file'] != null) {
                $fileName = date('d-m-Y') . '_' . time() . '.' . $request['file']->extension();

                $request['file']->move(public_path('/assets/uploads/job-attachment/'), $fileName);

                $request->merge([
                    'lampiran' => $fileName,
                ]);

                $file = public_path('/assets/uploads/job-attachment/') . $job->lampiran;
                if (\File::exists($file)) {

                    \File::delete($file);
                } else {
                    return back()
                        ->withErrors(['Error' => 'File tidak ditemukan']);
                }
            }
            /**End Image Function */

            $job->update($request->all());

            if ($request['file'] == null) {
                $fileName = $job->lampiran;
            }

            $request = $request->merge([
                'pdf' => $fileName
            ]);

            return redirect()->route('jobs.index')
                ->with(['success' => 'Job berhasil simpan.']);
        }
        return back()
            ->withErrors($validator)
            ->withInput();
        // } catch (Exception $exception) {

        //     return back()->withInput()
        //         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        // }
    }


    public function destroy($uuid)
    {
        try {
            $job = Job::where('uuid', $uuid)->first();
            $job->delete();

            return Response::json([
                'Success' => 'Job was successfully deleted.'
            ]);
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    public function getJobJson(Request $request)
    {

        $job = Job::latest()->get();

        return DataTables::of($job)
            ->addIndexColumn()
            ->addColumn('lampiran', function ($row) {
                $btn = '<button data-pdf="' . $row->lampiran . '" class="btn btn-sm btn-outline-warning srcLampiran">Lihat</button>';
                return $btn;
            })
            ->addColumn('tgl_mulai', function ($row) {
                return Carbon::parse($row->tgl_mulai)->translatedFormat('d M Y');
            })
            ->addColumn('tgl_akhir', function ($row) {
                return Carbon::parse($row->tgl_akhir)->translatedFormat('d M Y');
            })
            ->addColumn('action', function ($row) {
                $btn = '<button href="javascript:void(0)" data-id="' . $row->uuid . '" data-original-title="Show" class="btn btn-outline-primary btn-icon show"><i class="feather icon-eye"></i></button>';

                $btn = $btn . ' <button href="javascript:void(0)" data-id="' . $row->uuid . '" data-original-title="Edit" class="btn btn-outline-success btn-icon edit"><i class="feather icon-edit"></i></button>';

                $btn = $btn . ' <button href="javascript:void(0)" data-name="' . $row->name . '" data-id="' . $row->uuid . '" data-original-title="Delete" class="btn btn-outline-danger btn-icon delete"><i class="feather icon-trash"></i></button>';

                return $btn;
            })
            ->rawColumns(['action', 'lampiran', 'tgl_mulai', 'tgl_akhir'])
            ->make(true);
    }

    public function getJobDetailJson($job = '')
    {

        $jobDetail = JobDetail::where('job_id', getJobId($job)->id)->get();

        return DataTables::of($jobDetail)
            ->addIndexColumn()

            ->addColumn('action', function ($row) {
                $btn = '<button href="javascript:void(0)" data-id="' . $row->uuid . '" data-original-title="Show" class="btn btn-outline-primary btn-icon show"><i class="feather icon-eye"></i></button>';

                $btn = $btn . ' <button href="javascript:void(0)" data-id="' . $row->uuid . '" data-original-title="Edit" class="btn btn-outline-success btn-icon edit"><i class="feather icon-edit"></i></button>';

                $btn = $btn . ' <button href="javascript:void(0)" data-name="' . $row->name . '" data-id="' . $row->uuid . '" data-original-title="Delete" class="btn btn-outline-danger btn-icon delete"><i class="feather icon-trash"></i></button>';

                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    protected function jobValidator($request)
    {
        $validator =  Validator::make($request, [
            'user_id' => 'required|integer',
            'no_surat' => 'string|min:1|required',
            'judul' => 'string|min:1|required',
            'informasi' => 'string|min:1|required',
            'tgl_mulai' => 'required',
            'tgl_akhir' => 'required',
            'lampiran' => 'mimes:pdf|max:2048',
            'is_aktif' => 'boolean|required',
        ]);

        return $validator;
    }
}
