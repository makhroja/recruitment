<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\JobDetail;
use App\Models\Position;
use App\Models\Unit;
use Illuminate\Http\Request;
use Exception;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;
use Validator;

class JobDetailsController extends Controller
{


    public function index()
    {
        $jobDetails = JobDetail::with('job', 'unit', 'position')->paginate(25);

        return view('job_details.index', compact('jobDetails'));
    }

    public function create()
    {
        $jobs = Job::pluck('judul', 'id')->all();
        $units = Unit::pluck('nama', 'id')->all();
        $positions = Position::pluck('nama', 'id')->all();

        return view('job_details.create', compact('jobs', 'units', 'positions'));
    }

    public function store(Request $request)
    {
        try {
            $request = $request->merge([
                'uuid' => Str::uuid()->getHex(),
            ]);
            $validator = $this->jobDetailValidator($request->all());

            if ($validator->passes()) {

                JobDetail::create($request->all());

                if ($request->method == 'fromJob') {
                    $jobId = Job::findOrFail($request->job_id)->uuid;
                    return redirect()->route('jobs.show', $jobId)
                        ->with(['success' => 'Detail lowongan berhasil dibuat.']);
                }

                return redirect()->route('jobDetails.index')
                    ->with(['success' => 'Detail lowongan berhasil dibuat.']);
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
        $jobDetail = JobDetail::with('job', 'unit', 'position')->where('uuid', $uuid)->first();

        return view('job_details.show', compact('jobDetail'));
    }


    public function edit($uuid)
    {
        $jobDetail = JobDetail::where('uuid', $uuid)->first();
        $jobs = Job::pluck('judul', 'id')->all();
        $units = Unit::pluck('nama', 'id')->all();
        $positions = Position::pluck('nama', 'id')->all();

        return view('job_details.edit', compact('jobDetail', 'jobs', 'units', 'positions'));
    }


    public function update($uuid, Request $request)
    {
        dd($request->all());
        try {
            $validator = $this->jobDetailValidator($request->all());

            if ($validator->passes()) {

                $jobDetail = JobDetail::where('uuid', $uuid)->first();
                $jobDetail->update($request->all());

                if ($request->method == 'fromJob') {
                    $jobId = Job::findOrFail($request->job_id)->uuid;
                    return redirect()->route('jobs.show', $jobId)
                        ->with(['success' => 'Detail lowongan berhasil dibuat.']);
                }

                return redirect(['success' => 'jobDetails.index'])
                    ->with(['success' => 'JobDetail berhasil simpan.']);
            }
            return back()
                ->withErrors($validator)
                ->withInput();
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }


    public function destroy($uuid)
    {
        try {
            $jobDetail = JobDetail::where('uuid', $uuid)->first();
            $jobDetail->delete();

            return Response::json([
                'Success' => 'Detail lowongan was successfully deleted.'
            ]);
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    public function getJobDetailJson(Request $request)
    {
        $jobDetail = JobDetail::latest()->get();

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



    /**
     * Get the request's data from the request.
     *
     * @param Illuminate\Http\Request\Request $request 
     * @return array
     */
    protected function jobDetailValidator($request)
    {
        $validator =  Validator::make($request, [
            'job_id' => 'required',
            'unit_id' => 'required',
            'position_id' => 'required',
            'pendidikan' => 'required',
            'jurusan' => 'required',
            'jk' => 'required',
            'umur' => 'required',
            'jumlah' => 'required',
            'catatan' => 'required',
        ]);

        return $validator;
    }
}
