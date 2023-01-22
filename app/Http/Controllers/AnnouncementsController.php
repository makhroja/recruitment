<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use App\Models\Job;
use Illuminate\Http\Request;
use Exception;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;
use Validator;

class AnnouncementsController extends Controller
{


    public function index()
    {
        $announcements = Announcement::with('job')->paginate(25);

        return view('announcements.index', compact('announcements'));
    }

    public function create()
    {
        $jobs = Job::pluck('judul', 'uuid')->all();

        return view('announcements.create', compact('jobs'));
    }

    public function store(Request $request)
    {
        try {
            $request = $request->merge([
                'uuid' => Str::uuid()->getHex(),
            ]);
            $validator = $this->announcementValidator($request->all());

            if ($validator->passes()) {

                $fileName =  date('d-m-Y') . '_' . time() . '.' . $request['file']->extension();

                if ($request['file'] != null) {

                    $request['file']->move(public_path('/assets/uploads/announcement/'), $fileName);
                }

                Announcement::create([
                    'uuid' => Str::uuid()->getHex(),
                    'judul' => $request->judul,
                    'job_id' => getJobId($request->job_id)->id,
                    'keterangan' => $request->keterangan,
                    'status' => $request->status,
                    'pdf' => $fileName
                ]);

                return redirect()->route('announcements.index')
                    ->with(['success' => 'Announcement berhasil dibuat.']);
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
        $announcement = Announcement::with('job')->where('uuid', $uuid)->first();

        return view('announcements.show', compact('announcement'));
    }


    public function edit($uuid)
    {
        $announcement = Announcement::where('uuid', $uuid)->first();
        $jobs = Job::pluck('judul', 'id')->all();

        return view('announcements.edit', compact('announcement', 'jobs'));
    }


    public function update($uuid, Request $request)
    {
        try {
            $validator = $this->announcementValidator($request->all());

            if ($validator->passes()) {

                $announcement = Announcement::where('uuid', $uuid)->first();

                /**Start Image Function */
                if ($request['file'] != null) {
                    $fileName = date('d-m-Y') . '_' . time() . '.' . $request['file']->extension();

                    $request['file']->move(public_path('/assets/uploads/announcement'), $fileName);

                    $request->merge([
                        'lampiran' => $fileName,
                    ]);

                    $file = public_path('/assets/uploads/announcement/') . $announcement->pdf;

                    if (\File::exists($file)) {

                        \File::delete($file);
                    } else {
                        return back()
                            ->withErrors(['Error' => 'File tidak ditemukan']);
                    }
                }
                /**End Image Function */

                if ($request['file'] == null) {
                    $fileName = $announcement->pdf;
                }

                $announcement->update($request->all());

                return redirect()->route('announcements.index')
                    ->with(['success' => 'Announcement berhasil simpan.']);
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
            $announcement = Announcement::where('uuid', $uuid)->first();

            $file = public_path('/assets/uploads/announcement/') . $announcement->pdf;

            if (\File::exists($file)) {

                \File::delete($file);
            } else {
                return back()
                    ->withErrors(['Error' => 'File tidak ditemukan']);
            }

            $announcement->delete();

            return Response::json([
                'Success' => 'Announcement was successfully deleted.'
            ]);
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    public function getAnnouncementJson(Request $request)
    {
        $announcement = Announcement::latest()->get();

        return DataTables::of($announcement)
            ->addIndexColumn()
            ->addColumn('job', function ($row) {
                return $row->job->judul;
            })
            ->addColumn('action', function ($row) {
                $btn = '<button href="javascript:void(0)" data-pdf="' . $row->pdf . '" data-original-title="Show" class="btn btn-outline-primary btn-icon show"><i class="feather icon-eye"></i></button>';

                $btn = $btn . ' <button href="javascript:void(0)" data-id="' . $row->uuid . '" data-original-title="Edit" class="btn btn-outline-success btn-icon edit"><i class="feather icon-edit"></i></button>';

                $btn = $btn . ' <button href="javascript:void(0)" data-name="' . $row->name . '" data-id="' . $row->uuid . '" data-original-title="Delete" class="btn btn-outline-danger btn-icon delete"><i class="feather icon-trash"></i></button>';

                return $btn;
            })
            ->rawColumns(['action', 'job'])
            ->make(true);
    }



    /**
     * Get the request's data from the request.
     *
     * @param Illuminate\Http\Request\Request $request
     * @return array
     */
    protected function announcementValidator($request)
    {
        $validator =  Validator::make($request, [
            'job_id' => 'required',
            'keterangan' => 'string|required',
            'file' => 'mimetypes:application/pdf|max:1024',
            'status' => 'integer|required',
        ]);
        return $validator;
    }
}
