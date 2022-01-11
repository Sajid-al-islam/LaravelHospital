<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;

class PatientController extends Controller
{
    public function add() {
        return view('frontend.patient.add');
    }

    
	public function addPatient() {
    	return view('admin.patient.add');
    }

    public function index() {
        $patients = Patient::all();
    	return view('admin.patient.view', compact('patients'));
    }

    public function store() {
        $inputs = request()->validate([

            'name' => 'required',
            'phone' => 'required',
            'blood_group' => 'required',
            'age' => 'required'

        ]);
        Patient::create($inputs);
        session()->flash('patient-create-message', 'Patient created successfully.....');
        return redirect()->route('patient.view');
    }

    public function edit(Patient $patient) {
        return view('admin.patient.edit', compact('patient'));
    }

    public function update(Patient $patient) {
        $inputs = request()->validate([

            'name' => 'required',
            'phone' => 'required',
            'blood_group' => 'required',
            'age' => 'required'

        ]);
        
        $patient->name = $inputs['name'];
        $patient->phone = $inputs['phone'];
        $patient->blood_group = $inputs['blood_group'];
        $patient->age = $inputs['age'];

        $patient->update();
        session()->flash('patient-update-message', 'Patient updated successfully.....');
        return redirect()->route('patient.view');
    }

    public function delete(Patient $patient) {
        $patient->delete();
        session()->flash('patient-delete-message', 'Patient deleted successfully.....');
        return back();
    }

    public function message()
    {
        return view('admin.patient.message_doctor');
    }

}
