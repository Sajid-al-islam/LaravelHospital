<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SearchController extends Controller
{
    public function search()
    {
        return view('frontend.search.search');
    }

    public function searchDoctor(Request $request)
    {
        if($request->ajax())
        {
            $output = '';
            $query = $request->get('query');
            if($query != '')
            {
                $data = DB::table('doctors')
                ->where('name', 'like', '%'.$query.'%')
                ->orWhere('email', 'like', '%'.$query.'%')
                ->orWhere('phone', 'like', '%'.$query.'%')
                ->orWhere('speciality', 'like', '%'.$query.'%')
                ->orderBy('id', 'desc')
                ->get();
             
            } elseif($query != '') {
                    $dept = DB::table('departments')
                            ->where('name', 'like', '%'.$query.'%')
                            ->first();
                    // dd($dept);
                    $data = DB::table('doctors')
                            ->where('department_id', $dept->id)->get();
            }
            $total_row = $data->count();
            if($total_row > 0)
            {
                foreach($data as $row)
                {
                    $output .= '
                        <div class="col-md-3">
                            <div class="card m-2">
                                <img class="card-img-top" src="http://127.0.0.1:8000/storage/'.$row->photo.'" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">'.$row->name.'</h5>
                                    <p class="card-text">'.$row->email.'</p>
                                    <p class="card-text">'.$row->phone.'</p>
                                    <p class="card-text">'.$row->speciality.'</p>
                                </div>
                            </div>
                        </div>
                    ';
                }
            }
            else
            {
                $output = '
                <div>
                    <p>No Data Found</p>
                </div>
                ';
            }
            $data = array(
                'table_data'  => $output,
                'total_data'  => $total_row
            );

            echo json_encode($data);
        }
    }
}


// <div class="card" style="width: 18rem;">
//   <img src="..." class="card-img-top" alt="...">
//   <div class="card-body">
//     <h5 class="card-title">Card title</h5>
//     <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
//   </div>
//   <ul class="list-group list-group-flush">
//     <li class="list-group-item">Cras justo odio</li>
//     <li class="list-group-item">Dapibus ac facilisis in</li>
//     <li class="list-group-item">Vestibulum at eros</li>
//   </ul>
//   <div class="card-body">
//     <a href="#" class="card-link">Card link</a>
//     <a href="#" class="card-link">Another link</a>
//   </div>
// </div>