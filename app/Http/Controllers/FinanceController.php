<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Finance;
use App\Models\InPatient;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Null_;

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
        // dd($request->all());
        request()->validate([
            'name'=> 'required',
            'discharge_date'=> 'required',
            'total_day'=> 'required',
            'service_name' => 'required',
            'service_quantity' => 'required',
            'service_cost' => 'required'
        ]);
        
        $name = $request->name;
        $admission_id = $request->admission_id;
        $patient_id = $request->patient_id;
        $total_day = $request->total_day;
        $discharge_date = $request->discharge_date;
        $service_name = $request->service_name;
        $service_quantity = $request->service_quantity;
        $service_cost = $request->service_cost;
        $note = $request->note;
        $payment_status = $request->payment_status;
        // $discharge_date
        
        for ($i=0; $i < count($service_name) ; $i++) { 
            $data_save = [
                'patient_id' => $patient_id,
                'patient_admission_id' => $admission_id,
                'name' => $name,
                'service_name' => $service_name[$i],
                'service_quantity' => $service_quantity[$i],
                'service_cost' => $service_cost[$i],
                'total_bill' => $service_quantity[$i] * $service_cost[$i],
                'discharge_date' => $discharge_date,
                'total_day' => $total_day,
                'note' => $note,
                'payment_status' => $payment_status,
                'created_at' => Carbon::now()
            ];
            DB::table('finances')->insert($data_save);
        }
        
        // $finance = new Finance();
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