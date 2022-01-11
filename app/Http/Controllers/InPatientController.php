<?php

namespace App\Http\Controllers;

use PDF;
use Auth;
use Validator;
use Carbon\Carbon;
use App\Models\Bed;
use App\Models\Floor;
use App\Models\Doctor;
use App\Models\InPatient;
use App\Models\Department;
use App\Models\BedCategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;


class InPatientController extends Controller
{
    public function add()
    {
        $departments = Department::all();
        $floors = Floor::all();
        return view('admin.inPatient.add', compact('departments', 'floors'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'sex' => 'required|string',
            'phone' => 'required',
            'age' => 'required|integer',
            'guardian_name' => 'required|string',
            'guardian_phone' => 'required',
            'blood_group' => 'required|string',
            'symptoms' => 'required|string',
            'condition' => 'required|string',
            'department_id' => 'required',
            'doctor_id' => 'required',
            'floor_id' => 'required',
            'bed_category_id' => 'required',
            'bed_id' => 'required',
        ]);
        
        $patient_id = 'P-' . Str::random(5);
        // dd($patient_id);
        
        if (!$validator->passes()) {
            return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);
        }else {
            $inputs = [
                'admission_id' => $patient_id,
                'name' => $request->name,
                'sex' => $request->sex,
                'phone' => $request->phone,
                'age' => $request->age,
                'guardian_name' => $request->guardian_name,
                'guardian_phone' => $request->guardian_phone,
                'blood_group' => $request->blood_group,
                'symptoms' => $request->symptoms,
                'condition' => $request->condition,
                'note' => $request->note,
                'department_id' => $request->department_id,
                'doctor_id' => $request->doctor_id,
                'floor_id' => $request->floor_id,
                'bed_category_id' => $request->bed_category_id,
                'bed_id' => $request->bed_id,
            ];
            $query = InPatient::create($inputs);
            if ($query) {
                return response()->json(['status'=>1, 'msg'=> request('name'). ' has been registered..']);
            }
            // return back()->with('inpatient-created', request('name'). ' has been registered..');
        }
    }

    public function view()
    {
        $patients = InPatient::all();
        return view('admin.inPatient.view', compact('patients'));
    }

    public function doctorView()
    {
        if (Auth::user()->doctor) {
            $patients = InPatient::whereDoctorId(Auth::user()->doctor->id)->get();
        } else $patients = [];
        return view('admin.doctor_bed_patient.bed_patient', compact('patients'));
    }

    public function doctorDetails(InPatient $patient)
    {
        return view('admin.doctor_bed_patient.patient_details', compact('patient'));
    }

    public function detailsDownload(InPatient $patient)
    {
        $pdf = PDF::loadView('admin.doctor_bed_patient.patient_details_download', compact('patient'))->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->download('details.pdf');
    }

    public function try(InPatient $patient)
    {
        return view('admin.doctor_bed_patient.patient_details_download', compact('patient'));
    }








    /*****************   Ajax request handle   *****************/

    public function getDept($department)
    {
        $doct = Doctor::where('department_id', $department)->get();
        return response()->json($doct);
    }

    public function getFloor($floor)
    {
        $bed_category = BedCategory::where('floor_id', $floor)->get();
        return response()->json($bed_category);
    }

    public function getCat($cat)
    {
        $bed = Bed::where('bed_category_id', $cat)->get();
        return response()->json($bed);
    }
}