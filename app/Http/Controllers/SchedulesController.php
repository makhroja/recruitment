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

        return view('schedules.index', compact('schedules'));
    }

    public function create()
    {
        $jobs = Job::pluck('judul', 'id')->all();
        $tahap = storeSchedule();
        return view('schedules.create', compact('jobs', 'tahap'));
    }

    public function store(Request $request)
    {
        try {
            $request = $request->merge([
                'uuid' => Str::uuid()->getHex(),
            ]);
            $validator = $this->scheduleValidator($request->all());

            if ($validator->passes()) {

                Schedule::create($request->all());

                return redirect()->route('schedules.index')
                    ->with(['success' => 'Jadwal berhasil dibuat.']);
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
        $schedule = Schedule::with('job')->where('uuid', $uuid)->first();

        return view('schedules.show', compact('schedule'));
    }


    public function edit($uuid)
    {
        $schedule = Schedule::where('uuid', $uuid)->first();
        $jobs = Job::pluck('judul', 'id')->all();
        $tahap = storeSchedule();
        return view('schedules.edit', compact('schedule', 'jobs', 'tahap'));
    }


    public function update($uuid, Request $request)
    {
        try {
            $validator = $this->scheduleValidator($request->all());

            if ($validator->passes()) {

                $schedule = Schedule::where('uuid', $uuid)->first();
                $schedule->update($request->all());

                return redirect()->route('schedules.index')
                    ->with(['success' => 'Jadwal berhasil simpan.']);
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
                'Success' => 'Jadwal was successfully deleted.'
            ]);
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    public function getScheduleJson(Request $request)
    {
        $schedule = Schedule::latest()->get();

        return DataTables::of($schedule)
            ->addIndexColumn()
            ->addColumn('lowongan', function ($row) {
                return $row->job->judul;
            })
            ->addColumn('jadwal', function ($row) {
                $jadwal = $row->jadwal;
                return view('schedules.show', compact('jadwal'))->render();
            })
            ->addColumn('action', function ($row) {
                // $btn = '<button href="javascript:void(0)" data-id="' . $row->uuid . '" data-original-title="Show" class="btn btn-outline-primary btn-icon show"><i class="feather icon-eye"></i></button>';

                $btn = ' <button href="javascript:void(0)" data-id="' . $row->uuid . '" data-original-title="Edit" class="btn btn-outline-success btn-icon edit"><i class="feather icon-edit"></i></button>';

                $btn = $btn . ' <button href="javascript:void(0)" data-name="' . $row->name . '" data-id="' . $row->uuid . '" data-original-title="Delete" class="btn btn-outline-danger btn-icon delete"><i class="feather icon-trash"></i></button>';

                return $btn;
            })
            ->rawColumns(['action', 'lowongan', 'jadwal'])
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
            'job_id' => 'required',
            'jadwal' => 'required',
        ]);

        return $validator;
    }
}
