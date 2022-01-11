<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Str;
use App\Models\Prescription;
use PDF;

class PrescriptionController extends Controller
{
    public function prescription() {
        return view('admin.prescription.prescription');
    }

    public function store() {
        request()->validate([
            'name' => 'required|max:100|string',
            'description' => 'required|string',
            'test' => 'required|string',
            'symptoms' => 'required|string',
            'gender' => 'required',
            'date' => 'required',
            'doctor_name' => 'required|max:100|string',
            'blood_group' => 'required|max:10|string',
        ]);

        $prescription = new Prescription();
        $prescription->name = request('name');
        $prescription->description = request('description');
        $prescription->test = request('test');
        $prescription->symptoms = request('symptoms');
        $prescription->gender = request('gender');
        $prescription->date = request('date');
        $prescription->doctor_name = request('doctor_name');
        $prescription->blood_group = request('blood_group');
        $prescription->slug = Str::slug(request('name'));
        $prescription->save();

        //$inputs['slug'] = Str::slug(request('name'));

        //Prescription::create($inputs);
        return redirect()->route('view.prescription', $prescription->id);
    }

    public function list()
    {
        return view('admin.prescription.list', ['prescriptions'=>Prescription::all()]);
    }

    public function view(Prescription $prescription)
    {
        return view('admin.prescription.view', compact('prescription'));
    }

    public function try(Prescription $prescription)
    {
        return view('admin.prescription.download_view', compact('prescription'));
    }

    public function download_view(Prescription $prescription)
    {
        $pdf = PDF::loadView('admin.prescription.download_view', compact('prescription'))->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->download('prescription.pdf');
    }

    public function delete(Prescription $prescription)
    {
        $prescription->delete();
        return redirect()
                ->route('view.prescription.list')
                ->with('prescription-delete', 'Record deleted...');
    }
}
