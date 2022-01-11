<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Department;
use App\Models\Role;
use App\Models\User;
use Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class DoctorController extends Controller
{

    public function index() {
        $doctors = Doctor::all();
        $departments = Department::all();
    	return view('admin.doctor.view', compact('doctors', 'departments'));
    }

    public function store(Request $request) {

        request()->validate([
            'name'=> 'required',
            'email'=> 'required',
            'phone'=> 'required',
            'speciality' => 'required',
            'department_id' => 'required',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $docUser = new User();
        $docUser->name = request('name');
        $docUser->email = request('email');
        $docUser->phone = request('phone');
        $docUser->password = Hash::make(request('password'));
        $docUser->slug = Str::slug(request('name'));
        $docUser->save();

        $doctor = new Doctor();
        $doctor->user_id = $docUser->id;
        $doctor->name = request('name');
        $doctor->email = request('email');
        $doctor->phone = request('phone');
        $doctor->department_id = request('department_id');
        $doctor->speciality = request('speciality');
        $doctor->slug = Str::slug(request('name'));
        $doctor->status = 1;

        if (request('photo')) {
            $doctor->photo = request('photo')->store('images');
        }
        $doctor->save();
        $docUser->roles()->attach(Role::find(2));
        session()->flash('doctor-create-message', 'Doctor created successfully.....');
        return back();
    }
    
    public function update(Doctor $doctor) {

        $inputs = request()->validate([

            'name'=> 'required',
            'email'=> 'required',
            'phone'=> 'required',
            'speciality' => 'required',
            'photo' => 'file'

        ]);

        $doctor->name = $inputs['name'];
        $doctor->email = $inputs['email'];
        $doctor->phone = $inputs['phone'];
        $doctor->speciality = $inputs['speciality'];

        if (request('photo')) {
            $inputs['photo'] = request('photo')->store('images');
            $doctor->photo = $inputs['photo'];
        }
        
        $doctor->update();
        session()->flash('doctor-update-message', 'Doctor updated successfully.....');
        return redirect()->route('doctor.view');
    }

    public function delete(Doctor $doctor) {
        $doctor->delete();
        session()->flash('doctor-delete-message', 'Doctor deleted successfully.....');
        return back();
    }

}
