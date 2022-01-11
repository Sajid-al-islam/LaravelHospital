<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Floor;
use App\Models\BedCategory;
class BedCategoryController extends Controller
{
    public function add()
    {
        $floors = Floor::all();
        $categories = BedCategory::all();
        return view('admin.bed.bed_category', compact('floors', 'categories'));
    }

    public function store()
    {
        $inputs = request()->validate([
            'name' => 'required|unique:bed_categories',
            'details' => 'required',
            'status' => 'required',
            'floor_id' => 'required'
        ]);

        BedCategory::create($inputs);
        return back()->with('bed-category-created', request('name'). ' has been created...');
    }

    public function edit($category)
    {
        request()->validate([
            'floor_id' => 'required',
            'category_name' => 'required',
            'category_description' => 'required',
            'category_status' => 'required'
        ]);
        $c = BedCategory::findOrFail($category);
        $c->floor_id = request('floor_id');
        $c->name = request('category_name');
        $c->details = request('category_description');
        $c->status = request('category_status');
        $c->update();
        session()->flash('bed-category-updated', request('category_name'). ' has been updated...');
        return back();
    }

    public function delete(BedCategory $category)
    {
        $category->delete();
        session()->flash('bed-category-deleted', 'Bed Category deleted successfully.....');
        return back();
    }
}
