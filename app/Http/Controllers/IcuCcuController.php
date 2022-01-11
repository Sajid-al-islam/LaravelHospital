<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Str;
use App\Models\IcuCcuRequest;


class IcuCcuController extends Controller
{
    public function index()
    {
        $requests = IcuCcuRequest::all();
        return view('admin.bed.request_icu_ccu', compact('requests'));
    }

    public function store()
    {
        $inputs = request()->validate([
            'patient_name' => 'required|string',
            'phone' => 'required',
            'bed_id' => 'required'
        ]);
        $inputs['slug'] = Str::slug(request('patient_name'));
        $inputs['status'] = 0;
        IcuCcuRequest::create($inputs);
        return back();
    }

    // public function ccuForm()
    // {
    //     $requests = IcuCcuRequest::all();
    //     return view('admin.bed.request_icu_ccu', compact('requests'));
    // }

    public function ccuStore()
    {
        
    }
}
