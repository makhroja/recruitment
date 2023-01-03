<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Exception;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;
use Validator;

class SchedulesController extends Controller
{


    public function index()
    {
        $schedules = Schedule::with('job')->paginate(25);
        $jobs = Job::pluck('judul', 'uuid')->all();

        return view('schedules.index', compact('schedules', 'jobs'));
    }

    public function create()
    {
        $jobs = Job::pluck('uuid', 'id')->all();

        return view('schedules.create', compact('jobs'));
    }

    public function store(Request $request)
    {
        // try {
        $request = $request->merge([
            'uuid' => Str::uuid()->getHex(),
            'status' => 1,
        ]);

        $validator = $this->scheduleValidator($request->all());

        if ($validator->passes()) {
            $jobUuid = Job::findOrfail($request->job_id);

            Schedule::create($request->all());

            if ($request->method == 'fromSchedule') {
                return redirect()->route('schedules.show', $jobUuid->uuid)
                    ->with(['success' => 'Schedule berhasil dibuat.']);
            } else {
                return redirect()->route('schedules.index')
                    ->with(['success' => 'Schedule berhasil dibuat.']);
            }
        }
        return back()
            ->withErrors($validator)
            ->withInput();
        // } catch (Exception $exception) {

        //     return back()->withInput()
        //         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        // }
    }


    public function show($uuid)
    {
        // dd($uuid);
        $job = Job::where('uuid', $uuid)->first();
        return view('schedules.show', compact('job'));
    }


    public function edit($uuid)
    {
        $schedule = Schedule::where('uuid', $uuid)->first();
        $jobs = Job::pluck('judul', 'id')->all();
        $method = 'fromSchedule';
        return view('schedules.edit', compact('schedule', 'jobs', 'method'));
    }


    public function update($uuid, Request $request)
    {
        try {
            $validator = $this->scheduleValidator($request->all());

            if ($validator->passes()) {
                $jobUuid = Job::findOrfail($request->job_id);
                $schedule = Schedule::where('uuid', $uuid)->first();
                $schedule->update($request->all());

                if ($request->method == 'fromSchedule') {
                    return redirect()->route('schedules.show', $jobUuid->uuid)
                        ->with(['success' => 'Schedule berhasil diupdate.']);
                } else {
                    return redirect()->route('schedules.index')
                        ->with(['success' => 'Schedule berhasil diupdate.']);
                }
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
            $schedule = Schedule::where('uuid', $uuid)->first();
            $schedule->delete();

            return Response::json([
                'Success' => 'Schedule was successfully deleted.'
            ]);
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    public function getScheduleJson($uuid = '')
    {
        $schedule = Schedule::where('job_id', getJobId($uuid)->id)->get();

        return DataTables::of($schedule)
            ->addIndexColumn()

            ->addColumn('action', function ($row) {
                $btn = ' <button href="javascript:void(0)" data-id="' . $row->uuid . '" data-original-title="Edit" class="btn btn-outline-success btn-icon edit"><i class="feather icon-edit"></i></button>';

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
    protected function scheduleValidator($request)
    {
        $validator =  Validator::make($request, [
            'tahap' => 'integer|min:1|required',
            'nama_tahap' => 'string|min:1|required',
            'tgl_mulai' => 'date_format:Y-m-d|required',
        ]);

        return $validator;
    }
}
