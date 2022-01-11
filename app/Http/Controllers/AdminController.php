<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Department;
use App\Models\Doctor;

class AdminController extends Controller
{
    public function index() {
        return view('admin.index');
    }

    public function list()
    {
        $departments = Department::all();
        $doctors = Doctor::all();
        if (auth()->user()->doctor) {
            $docId = auth()->user()->doctor->id;
            $appointments = Appointment::where('doctor_id', $docId)->get();
        } else $appointments = [];
        return view('admin.appointment.view', compact('appointments', 'departments', 'doctors'));
    }
}
