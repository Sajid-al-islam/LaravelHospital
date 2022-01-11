<x-admin.admin-master>

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Prescription List</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a class="btn btn-primary" href="{{ route('doctor.prescription') }}">Generate Prescription</a></li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<div class="row">
	<div class="col-12 mt-3">
		<div class="card">
			<!-- /.card-header -->
			<div class="card-body table-responsive p-0">
				<table class="table table-hover text-nowrap">
					<thead>
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th>Gender</th>
							<th>Description</th>
							<th>Blood group</th>
							<th>Doctor Name</th>
							<th>Date</th>
							<th>Created At</th>
							<th>Updated At</th>
							<th>PDF</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@if(sizeof($prescriptions) != 0)
						@foreach($prescriptions as $prescription)
							<tr>
								<td>{{ $prescription->id }}</td>
								<td><a href="{{ route('view.prescription', $prescription->id) }}">{{ $prescription->name }}</a></td>
								<td><a href="{{ route('prescription.try', $prescription->id) }}">{{ $prescription->gender }}</a></td>
								<td>{{ Str::limit($prescription->description, 20) }}</td>
								<td>{{ $prescription->blood_group }}</td>
								<td>{{ $prescription->doctor_name }}</td>
								<td>{{ $prescription->date }}</td>
								<td>{{ $prescription->created_at->diffForHumans() }}</td>
								<td>{{ $prescription->updated_at->diffForHumans() }}</td>
								<td><a href="{{ route('prescription.download', $prescription->id) }}" class="btn btn-primary">Download PDF</a></td>
								<td>
									<form action="{{ route('prescription.delete', $prescription->id) }}" method="post">
										@csrf
										@method('DELETE')
										<button type="submit" cursor="pointer" class="btn btn-danger">Delete</button>
									</form>
								</td>
							</tr>
						@endforeach
						@else
							<tr>
								<td colspan="11" class="text-center">No data found</td>
							</tr>
						@endif
					</tbody>
				</table>
			</div>
			<!-- /.card-body -->
		</div>
		<!-- /.card -->
	</div>
</div>
@endsection

</x-admin.admin-master>