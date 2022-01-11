<x-admin.admin-master>

@section('content')
<div class="row">

	<div class="col-12 mt-3">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Bed Patients List for {{ auth()->user()->name }}</h3>
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
							<th>PDF</th>
							<!-- <th>Edit</th>
							<th>Delete</th> -->
						</tr>
					</thead>
					<tbody>
						@if(sizeof($patients) != 0)
						@foreach($patients as $patient)
							<tr>
								<td>{{ $patient->id }}</td>
								<td><a href="{{ route('doctor.bed.details', $patient->id) }}">{{ $patient->name }}</a></td>
								<td><a href="{{ route('patient.download', $patient->id) }}">{{ $patient->sex }}</a></td>
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
								<td><a class="btn btn-secondary" href="{{ route('patient.details.download', $patient->id) }}">Download Pdf</a></td>
								<!-- <td>
									<form action="{{ route('patient.delete', $patient->id) }}" method="post">
										@csrf
										@method('DELETE')
										<button type="submit" cursor="pointer" class="btn btn-danger">Delete</button>
									</form>
								</td> -->
							</tr>
						@endforeach
						@else
							<tr>
								<td colspan="20" class="text-center">No Data to show</td>
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