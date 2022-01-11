<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;

class UiDepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::all();
        return view('frontend.department.view', compact('departments'));
    }
}
