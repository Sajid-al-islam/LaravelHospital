<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Floor;
use App\Models\Bed;
use App\Models\BedCategory;
use Str;

class BedController extends Controller
{

    public function index()
    {
        $floors = Floor::all();
        $beds = Bed::all();
        return view('admin.bed.bed', compact('floors', 'beds'));
    }

    public function store()
    {
        $inputs = request()->validate([
            'floor_id' => ['required'],
            'bed_category_id' => ['required'],
            'name' => ['required'],
            'limit' => ['required', 'integer'],
            'cost' => ['required', 'integer'],
            'status' => ['required'],
        ]);

        $inputs['slug'] = Str::slug(request('name'));

        Bed::create($inputs);
        session()->flash('bed-stored', request('name'). ' has been created...');
        return back();
    }

    public function update($bed)
    {
        request()->validate([
            'bed_cost' => ['required', 'integer'],
            'bed_limit' => ['required', 'integer'],
            'bed_status' => ['required'],
        ]);

        $bedId = Bed::findOrFail($bed);
        $bedId->cost = request('bed_cost');
        $bedId->limit = request('bed_limit');
        $bedId->status = request('bed_status');
        $bedId->update();
        session()->flash('bed-updated', $bedId->name . ' has been updated....');
        return back();
    }

    public function delete(Bed $bed)
    {
        $bed->delete();
        session()->flash('bed-delete', $bed->name . ' has been deleted....');
        return back();
    }

    public function getBedCat($floor)
    {
        $bed_category = BedCategory::where('floor_id', $floor)->get();
        return response()->json($bed_category);
    }
}
