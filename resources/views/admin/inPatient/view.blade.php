<x-admin.admin-master>

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">See Patient List</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a class="btn btn-primary" href="{{ route('inpatient.add') }}">Add patient</a></li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<div class="row">

	<div class="col-12 mt-3">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">In Patients List</h3>
			</div>
			<!-- /.card-header -->
			<div class="card-body table-responsive p-0">
				<table class="table table-hover text-nowrap">
					<thead>
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th>Sex</th>
							<th>Age</th>
							<th>Phone</th>
							<th>Guardian Name</th>
							<th>Guardian Phone</th>
							<th>Blood Group</th>
							<th>Symptoms</th>
							<th>Condition</th>
							<th>Note</th>
							<th>Department</th>
							<th>Doctor</th>
							<th>Floor</th>
							<th>Bed Category</th>
							<th>Bed</th>
							<th>Status</th>
							<th>Created At</th>
							<th>Updated At</th>
							<th>Bill</th>
							<!-- <th colspan="2" class="text-center">Action</th> -->
						</tr>
					</thead>
					<tbody>
						@if(sizeof($patients) != 0)
						@foreach($patients as $patient)
							<tr>
								<td>{{ $patient->id }}</td>
								<td><a href="">{{ $patient->name }}</a></td>
								<td>{{ $patient->sex }}</td>
								<td>{{ $patient->age }}</td>
								<td>{{ $patient->phone }}</td>
								<td>{{ $patient->guardian_name }}</td>
								<td>{{ $patient->guardian_phone }}</td>
								<td>{{ $patient->blood_group }}</td>
								<td>{{ $patient->symptoms }}</td>
								<td>{{ $patient->condition }}</td>
								<td>{{ $patient->note }}</td>
								<td>{{ $patient->department->name }}</td>
								<td>{{ $patient->doctor->name }}</td>
								<td>{{ $patient->floor->name }}</td>
								<td>{{ $patient->bedCategory->name }}</td>
								<td>{{ $patient->bed->name }}</td>
								<td>{{ $patient->status }}</td>
								<td>{{ $patient->created_at->diffForHumans() }}</td>
								<td>{{ $patient->updated_at->diffForHumans() }}</td>
								<td><a href="{{ route('finance.add') }}" class="btn btn-warning">Generate Bill</a></td>
								<!-- <td>Edit</td>
								<td>
									<form action="{{ route('patient.delete', $patient->id) }}" method="post">
										@csrf
										@method('DELETE')
										<button type="submit" cursor="pointer" class="btn btn-sm btn-danger">Delete</button>
									</form>
								</td> -->
							</tr>
						@endforeach
						@else
							<tr>
								<td colspan="19" class="text-center">No Data to show</td>
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