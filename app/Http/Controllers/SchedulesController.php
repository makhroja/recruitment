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
use Symfony\Polyfill\Intl\Idn\Idn;
use Validator;

class SchedulesController extends Controller
{

    public function getEvent(Request $request)
    {
        // if ($request->ajax()) {
        //     return response()->json($request->all());
        //     $start = (!empty($request->start)) ? ($request->start) : ('');
        //     $end = (!empty($request->end)) ? ($request->end) : ('');
        //     $events = Schedule::whereDate('start', '>=', $start)->whereDate('end',   '<=', $end)
        //         ->where('job_id', $request->customID)
        //         ->get(['id', 'job_id', 'tahapan_id', 'title', 'start', 'end']);
        //     return response()->json($events);
        // }

        $arrayNoKey = storeSchedule();
        $arrayKey = [];

        foreach ($arrayNoKey as $key => $value) {
            $arrayKey[] = ['id' => $key, 'title' => $value];
        }

        $jobs = Job::all();

        return view('schedules.index', [
            'titles' => $arrayKey,
            'jobs' => $jobs
        ]);
    }

    public function getSchedules(Request $request, $id)
    {
        if ($request->ajax()) {
            $start = (!empty($request->start)) ? ($request->start) : ('');
            $end = (!empty($request->end)) ? ($request->end) : ('');
            $events = Schedule::whereDate('start', '>=', $start)->whereDate('end',   '<=', $end)
                ->where('job_id', $id)
                ->get(['id', 'job_id', 'tahapan_id', 'title', 'start', 'end']);
            return response()->json($events);
        }
    }

    public function createEvent(Request $request)
    {
        $data = $request->except('_token');

        // Generate a UUID for the event
        $data['uuid'] = \Illuminate\Support\Str::uuid();
        $data['job_id'] = $request->job_id;
        $event = Schedule::create($data);

        return response()->json($data);
    }

    public function updateEvent(Request $request)
    {
        $data = $request->except('_token');

        $event = Schedule::where('id', $request->id)->update($data);

        return response()->json($data);
    }

    public function deleteEvent(Request $request)
    {
        $event = Schedule::find($request->id);
        return $event->delete();
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
            'uuid' => 'required',
            'job_id' => 'required',
            'tahapan_id' => 'required',
            'title' => 'required',
            'start' => 'required',
            'end' => 'required',
            'status' => 'required'
        ]);

        return $validator;
    }
}
