<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Doctor;
use App\Models\Service;
use App\Models\BedCategory;
use App\Models\Bed;

class UIController extends Controller
{
    public function index() {
        $services = Service::all();
        $departments = Department::whereBetween('id', [1, 5])
                                  ->where('status', 1)->get();
        $doctors = Doctor::where('status', 1)->get();
        $catIcu = BedCategory::where('name', 'ICU')->first();
        $catCcu = BedCategory::where('name', 'CCU')->first();
        $icu = Bed::where('bed_category_id', $catIcu->id)->get();
        $ccu = Bed::where('bed_category_id', $catCcu->id)->get();
        return view('frontend.index', compact('departments', 'doctors', 'services', 'icu', 'ccu'));
    }
}
