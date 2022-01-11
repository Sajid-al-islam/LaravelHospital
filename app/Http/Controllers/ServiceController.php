<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all();
        return view('admin.service.view', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.service.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $inputs = request()->validate([
            'name' => 'required',
            'description' => 'required',
            'service_cost' => 'required',
            'service_availability' => 'required',
        ]);

        if (request('photo')) {
            $inputs['photo'] = request('photo')->store('images');
        }

        Service::create($inputs);
        session()->flash('service-create-message', 'Service Created Successfully');
        return redirect()->route('service.index');
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
    public function edit(Service $service)
    {
        return view('admin.service.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Service $service)
    {
        $inputs = request()->validate([
            'name' => 'required',
            'description' => 'required',
            'service_cost' => 'required',
            'service_availability' => 'required',
        ]);

        $service->name = $inputs['name'];
        $service->description = $inputs['description'];
        $service->service_cost = $inputs['service_cost'];
        $service->service_availability = $inputs['service_availability'];

        $service->update();
        session()->flash('service-update-message', 'Service Updated Successfully');
        return redirect()->route('service.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $service->delete();
        session()->flash('service-delete-message', 'Record Deleted.......');
        return back();
    }

    public function book(Service $service)
    {
        return view('frontend.service.book', compact('service'));
    }
}
