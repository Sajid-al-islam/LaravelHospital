<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Floor;

class FloorController extends Controller
{
    public function floor()
    {
        $floors = Floor::all();
        return view('admin.bed.floor', compact('floors'));
    }

    public function store()
    {
        $inputs = request()->validate([
            'name' => 'required|unique:floors',
            'description' => 'required',
            'status' => 'required'
        ]);

        Floor::create($inputs);
        return back()->with('floor-created', request('name'). ' has been created...');

    }

    public function edit($floor)
    {
        // dd(request());
        request()->validate([
            'floor_name' => 'required',
            'floor_description' => 'required',
            'floor_status' => 'required'
        ]);
        $f = Floor::findOrFail($floor);
        $f->name = request('floor_name');
        $f->description = request('floor_description');
        $f->status = request('floor_status');
        $f->update();
        session()->flash('floor-updated', request('floor_name'). ' has been updated...');
        return back();
    }

    public function delete(Floor $floor)
    {
        $floor->delete();
        session()->flash('floor-delete', $floor->name .' deleted successfully.....');
        return back();
    }
}
