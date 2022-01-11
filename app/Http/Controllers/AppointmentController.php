<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Department;
use App\Models\Doctor;
use App\Models\Schedule;
use Illuminate\Support\Facades\Mail;
use App\Mail\AppointmentMail;


class AppointmentController extends Controller
{

    public function appointment() {
        $departments = Department::all();
        return view('frontend.appointment.appointment', compact('departments'));
    }

    public function appointmentSearch(Doctor $doctor) {
        $schedules = Schedule::where('doctor_id', $doctor->id);
        return view('frontend.appointment.search_appointment', compact('doctor', 'schedules'));
    }

    public function appointment_store() {
        $inputs = request()->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'age' => 'required',
            'blood_group' => 'required',
            'department' => 'required',
            'doctor_id' => 'required',
            'appointment_time' => 'required'
        ]);

        $apt = request('appointment_time');
        Mail::to('sahir@gmail.com')->send(new AppointmentMail($apt));
        Appointment::create($inputs);
        return back()->with('message', 'Your appointment will be confirmed through return e-mail or telephonic communication. Please be informed that this submission of “Request for Appointment” will only be workable after confirmation by our Appointment Centre. Confirmation of an appointment depends upon the availability of doctors at your preferred date and time.');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();
        $doctors = Doctor::all();
        return view('admin.appointment.add', compact('departments', 'doctors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function get_department($department)
    {
        $doctors = Doctor::where('department_id', $department)->get();
        return response()->json($doctors);
    }

    public function get_doctor($doctor)
    {
        $schedule = Doctor::findOrFail($doctor);
        $s = $schedule->user_id;
        $schedules = Schedule::where('doctor_id', $s)->get();

        return response()->json($schedules);
    }
}
