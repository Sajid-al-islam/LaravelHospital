<x-admin.admin-master>

@section('content')

	<div class="row">
	<h2 class="m-3">ICU CCU Online Request</h2>
    	<div class="col-12">
    		<div class="card">
    			<div class="card-body table-responsive p-0">
	                <table class="table table-hover text-nowrap">
	                    <thead>
	                        <tr>
	                            <th>ID</th>
	                            <th>Patient Name</th>
	                            <th>Bed</th>
	                            <th>Phone</th>
	                            <th>Bkash number</th>
	                            <th>Transaction id</th>
	                            <th>Partial payment</th>
	                            <th>Full payment</th>
	                            <th>Status</th>
	                            <th>Slug</th>
	                            <th>Created At</th>
	                            <th>Updated At</th>
	                            <th>Edit</th>
	                            <th>Delete</th>
	                        </tr>
	                    </thead>
	                    <tbody>
	                    @if(sizeof($requests) != 0)
	                    @foreach( $requests as $request )
	                        <tr>
	                            <td>{{ $request->id }}</td>
	                            <td>{{ $request->patient_name }}</td>
	                            <td>{{ $request->bed->name }}</td>
	                            <td><a href="">{{ $request->phone }}</a></td>
	                            <td><a href="">{{ $request->bkash_number }}</a></td>
	                            <td>{{ $request->tnx_id }}</td>
	                            <td>{{ $request->partial_payment }}</td>
	                            <td>{{ $request->full_payment }}</td>
	                            <td>{{ $request->slug }}</td>
	                            <td>{{ $request->status }}</td>
	                            <td>{{ $request->created_at->diffForHumans() }}</td>
	                            <td>{{ $request->updated_at->diffForHumans() }}</td>
	                            <td>Edit</td>
	                            <td>Delete</td>
	                        </tr>
	                    @endforeach
	                    @else
							<tr>
								<td colspan="14" class="text-center">No Data to show</td>
							</tr>
						@endif
	                    </tbody>
	                </table>
	            </div>
    		</div>
    	</div>
    </div>

@endsection

</x-admin.admin-master>