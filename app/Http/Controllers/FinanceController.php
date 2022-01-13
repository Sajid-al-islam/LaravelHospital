<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Finance;
use App\Models\InPatient;

class FinanceController extends Controller
{
    public function index() {
        $finances = Finance::OrderBy('created_at', 'DESC')->get();
        return view('admin.finance.bill_list', compact('finances'));
    }

    
    public function create()
    {
        $patient_data = InPatient::all();
        
        return view('admin.finance.add', compact('patient_data'));
    }

   
    public function store(Request $request)
    {
        dd($request->all());
        request()->validate([
            'name'=> 'required',
            'service_name'=> 'required',
            'service_cost'=> 'required',
            'total_day' => 'required',
            
        ]);

        
        $finance = new Finance();
        $finance->name = request('name');
        $finance->service_name = request('service_name'); 
        $finance->service_cost = request('service_cost');
        $finance->total_day = request('total_day');
        $finance->total_bill = request('total_bill');

        $finance->save();
        session()->flash('finance-create-message', 'Bill created successfully.....');
        return redirect()->route('finance');
    }

    public function download_view(Finance $finance)
    {
        $pdf = PDF::loadView('admin.finance.boll_view', compact('finance'))->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->download('finance.pdf');
    }
   

    public function update(Request $request, $id) {

        $request->validate([
            'name'=> 'required',
            'service_name'=> 'required',
            'service_cost'=> 'required',
            'total_day' => 'required',
            
        ]);

        $finance = Finance::find($id);
        $finance->name = request('name');
        $finance->service_name = request('service_name'); 
        $finance->service_cost = request('service_name');
        $finance->total_day = request('total_day');
        $finance->service_cost = request('service_cost');
        
        $total_day = request('total_day');
        $service_cost = request('service_cost');

        $total_bill = $total_day * $service_cost;
        $finance->total_bill = $total_bill;
       
        
        $finance->save();

        session()->flash('finance-update-message', 'Bill updated successfully.....');
        return redirect()->back();
    }

    public function delete($id) {
        
        $finance = Finance::find($id);
        $finance->delete();
        session()->flash('finance-delete-message', 'Bill deleted successfully.....');
        return back();
    }

    public function get_data(Request $request, $patient_id)
    {   
        $patient_data = InPatient::where('admission_id', $patient_id)->get();

        return view('admin.finance.add')->with('patient_data', $patient_data);
    }
}