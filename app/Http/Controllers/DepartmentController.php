<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;

class DepartmentController extends Controller
{

    public function index() {
        $departments = Department::all();
    	return view('admin.department.view', compact('departments'));
    }

    public function store(Request $request) {

        $inputs = request()->validate([
            'name' => 'required',
            'description' => 'required',
            'status' => 'required',
        ]);

        if (request('photo')) {
            $inputs['photo'] = request('photo')->store('images');
        }

        Department::create($inputs);
        session()->flash('department-create-message', 'Department created successfully.....');
        return redirect()->route('department.view');
    }

    public function update(Department $department) {

        $inputs = request()->validate([
            'name' => 'required',
            'description' => 'required',
            'status' => 'required',
        ]);

        if (request('photo')) {
            $inputs['photo'] = request('photo')->store('images');
            $department->photo = $inputs['photo'];
        }

        $department->name = $inputs['name'];
        $department->description = $inputs['description'];
        $department->status = $inputs['status'];

        $department->update();
        session()->flash('department-update-message', 'Department updated successfully.....');
        return redirect()->route('department.view');
    }

    public function delete(Department $department) {
        $department->delete();
        session()->flash('department-delete-message', 'Department deleted successfully.....');
        return back();
    }
}
