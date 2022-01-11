<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\Role;
use Carbon\Carbon;

class AttendanceController extends Controller
{

    public function schedule()
    {
        $roles = Role::all();
        return view('admin.attendance-schedule.schedule', compact('roles'));
    }

    public function scheduleStore()
    {
        return "ok";
    }

    public function store()
    {

        $attendance = request()->validate([ 'attendance_id' => 'required|integer' ]);
        $attendance['date'] = date('Y-m-d');
        Attendance::create($attendance);
        return back();
    }

    public function docList()
    {
        
    }

    public function staffList()
    {
        
    }
}
