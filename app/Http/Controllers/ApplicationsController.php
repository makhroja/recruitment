<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Job;
use App\Models\Position;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Http\Request;
use Exception;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;
use Validator;

class ApplicationsController extends Controller
{


    public function index()
    {
        $applications = Application::with('job','user','unit','position')->paginate(25);

        return view('applications.index', compact('applications'));
    }

    public function create()
    {
        $jobs = Job::pluck('uuid','id')->all();
$users = User::pluck('name','id')->all();
$units = Unit::pluck('uuid','id')->all();
$positions = Position::pluck('uuid','id')->all();
        
        return view('applications.create', compact('jobs','users','units','positions'));
    }

    public function store(Request $request)
    {
        try {
         $request = $request->merge([
            'uuid' => Str::uuid()->getHex(),
        ]);
        $validator = $this->applicationValidator($request->all());

        if ($validator->passes()) {

             Application::create($request->all());

            return redirect()->route('applications.index')
                ->with(['success' => 'Application berhasil dibuat.']);
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
        $application = Application::with('job','user','unit','position')->where('uuid', $uuid)->first();

        return view('applications.show', compact('application'));
    }


    public function edit($uuid)
    {
        $application = Application::where('uuid', $uuid)->first();
        $jobs = Job::pluck('uuid','id')->all();
$users = User::pluck('name','id')->all();
$units = Unit::pluck('uuid','id')->all();
$positions = Position::pluck('uuid','id')->all();

        return view('applications.edit', compact('application','jobs','users','units','positions'));
    }


    public function update($uuid, Request $request)
    {
        try {
            $validator = $this->applicationValidator($request->all());

            if ($validator->passes()) {

                $application = Application::where('uuid', $uuid)->first();
                $application->update($request->all());

                return redirect()->route('applications.index')
                    ->with(['success' => 'Application berhasil simpan.']);
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
            $application = Application::where('uuid', $uuid)->first();
            $application->delete();

            return Response::json([
                'Success' => 'Application was successfully deleted.'
            ]);

        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    public function getApplicationJson(Request $request)
    {
        $application = Application::latest()->get();

        return DataTables::of($application)
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
    protected function applicationValidator($request)
    {
        $validator =  Validator::make($request, [
            'uuid' => 'string|min:1|nullable',
            'job_id' => 'nullable',
            'user_id' => 'nullable',
            'unit_id' => 'nullable',
            'position_id' => 'nullable',
            'administrasi' => 'string|min:1|nullable',
            'tertulis' => 'string|min:1|nullable',
            'wawancara_unit' => 'string|min:1|nullable',
            'praktek' => 'string|min:1|nullable',
            'wawancara_hrd' => 'string|min:1|nullable',
            'psikotes' => 'string|min:1|nullable',
            'wawancara_performance' => 'string|min:1|nullable',
            'kesehatan' => 'string|min:1|nullable',
            'tahap_akhir' => 'string|min:1|nullable',
            'status' => 'string|min:1|nullable', 
        ]);

        return $validator;




    }



}
