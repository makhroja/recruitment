<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Job;
use App\Models\JobDetail;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class GuestController extends Controller
{
    public function lowongan()
    {
        $jobs = Job::whereIs_aktif(1)->paginate(4);
        return view('guest.lowongan', compact('jobs'));
    }

    public function detailLowongan($uuid)
    {
        $jobs = Job::whereUuid($uuid)->first();

        $schedules = Schedule::where('job_id', $jobs->id)->orderBy('tahapan_id', 'ASC')->get();

        // return $stat;
        if (berkasLamar($uuid)) {
            return view('guest.detail_lowongan', [
                'jobs' => $jobs,
                'job' => $jobs,
                'schedules' => $schedules,
                'tahap' => storeSchedule()
            ]);
        }
        return View::make('guest.closed', compact('jobs'));
    }

    public function pengumuman()
    {
        $announcements = Announcement::whereStatus(1)->paginate(4);
        return view('guest.pengumuman', compact('announcements'));
    }
}
