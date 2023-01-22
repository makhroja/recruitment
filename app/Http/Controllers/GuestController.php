<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Job;
use App\Models\JobDetail;
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

        // return $stat;
        if (berkasLamar($uuid)) {
            return view('guest.detail_lowongan', [
                'jobs' => $jobs,
                'job' => $jobs,
                'schedule' => $jobs->schedule->first(),
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
