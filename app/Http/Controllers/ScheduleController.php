<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;

class ScheduleController extends Controller
{
    public function add()
    {
        return view('admin.schedule.add');
    }

    public function store()
    {
        $inputs = request()->validate([
            'day' => ['required', 'date', 'after:yesterday'],
            'schedule_start' => ['required'],
            'schedule_end' => ['required'],
            'patient_limit' => ['required', 'integer'],
            'status' => ['required', 'boolean'],
            'doctor_id' => ['required'],
        ]);

        Schedule::create($inputs);
        return back()->with('schedule-created', 'Schedule for '. request('day'). ' is created...');
    }

    public function update($schedule)
    {
        $inputs = request()->validate([
            'day' => ['required', 'date', 'after:yesterday'],
            'schedule_start' => ['required'],
            'schedule_end' => ['required'],
            'patient_limit' => ['required', 'integer'],
            'status' => ['required', 'boolean'],
            'doctor_id' => ['required'],
        ]);
        $s = Schedule::findOrFail($schedule);
        $s->day = request('day');
        $s->schedule_start = request('schedule_start');
        $s->schedule_end = request('schedule_end');
        $s->patient_limit = request('patient_limit');
        $s->status = request('status');
        $s->doctor_id = request('doctor_id');
        $s->update();
        return back()->with('schedule-updated', 'Schedule for '. request('day'). ' is updated...');
    }

    public function list()
    {
        $schedules = Schedule::whereDoctorId(auth()->user()->id)->get();
        return view('admin.schedule.list', compact('schedules'));
    }
}
