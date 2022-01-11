<x-admin.admin-master>

@section('content')


<div class="row">
	<div class="col-12 my-3">
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg">
	    	Create Appointment
	    </button>
	</div>

	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Appointments</h3>
			</div>
			<!-- /.card-header -->
			<div class="card-body table-responsive p-0">
				<table class="table table-hover text-nowrap">
					<thead>
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th>Phone</th>
							<th>Age</th>
							<th>Blood Group</th>
							<th>Department</th>
							<th>Doctor</th>
							<th>Appointment Time</th>
							<th>Created At</th>
							<th>Updated At</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@if(sizeof($appointments) != 0)
						@foreach($appointments as $appointment)
							<tr>
								<td>{{ $appointment->id }}</td>
								<td><a href="#">{{ $appointment->name }}</a></td>
								<td>{{ $appointment->phone }}</td>
								<td>{{ $appointment->age }}</td>
								<td>{{ $appointment->blood_group }}</td>
								<td>{{ $appointment->department }}</td>
								<td>{{ $appointment->doctor_id }}</td>
								<td>{{ $appointment->appointment_time }}</td>
								<td>{{ $appointment->created_at->diffForHumans() }}</td>
								<td>{{ $appointment->updated_at->diffForHumans() }}</td>
								<td>
									<form action="" method="post">
										@csrf
										@method('DELETE')
										<button type="submit" cursor="pointer" class="btn btn-danger">Delete</button>
									</form>
								</td>
								<td><button type="submit" cursor="pointer" class="btn btn-danger">Delete</button></td>
							</tr>
						@endforeach
						@else
							<tr>
								<td colspan="11" class="text-center">No Data to show</td>
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

<!-- Appointment Create Modal -->
<div class="modal fade" id="modal-lg">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Create Appointment</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
				    <div class="offset-md-1 col-md-10">
				        <div class="card card-primary">
				            <form>
				                <div class="card-body">
				                <div class="row">
				                    <div class="form-group col-md-6">
				                        <label for="doctor-name">Patient name</label>
				                        <input type="text" class="form-control" id="doctor-name" placeholder="Name" name="name">
				                    @error('name')
				                        <span class="text-danger">{{ $message }}</span>
				                    @enderror
				                    </div>
				                    <div class="form-group col-md-6">
				                        <label for="exampleInputEmail1">Phone</label>
				                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
				                    @error('email')
				                        <span class="text-danger">{{ $message }}</span>
				                    @enderror
				                    </div>
				                    <div class="form-group col-md-4">
				                        <label for="phone-no">Age</label>
				                        <input type="number" class="form-control" id="phone-no" placeholder="Contact No">
				                    @error('name')
				                        <span class="text-danger">{{ $message }}</span>
				                    @enderror
				                    </div>
				                    <div class="form-group col-md-4">
				                        <label>Blood Group</label>
				                        <select class="form-control" name="blood_group">
				                            <option value="A+">A+</option>
				                            <option value="B+">B+</option>
				                            <option value="A-">A-</option>
				                            <option value="AB+">AB+</option>
				                            <option value="AB-">AB-</option>
				                        </select>
				                    @error('blood_group')
				                        <span class="text-danger">{{ $message }}</span>
				                    @enderror
				                    </div>
				                    <div class="form-group col-md-4">
				                        <label for="date">Preffered Time</label>
				                        <input type="date" class="form-control" id="date">
				                    </div>
				                    <div class="form-group col-lg-6">
				                        <label>Department</label>
				                        <select class="form-control" name="department">
				                            <option>Select department</option>
				                        @foreach($departments as $department)
				                            <option value="{{ $department->id }}">
				                                {{ $department->name }}
				                            </option>
				                        @endforeach()
				                        </select>
				                    </div>
				                    <div class="form-group col-lg-6">
				                        <label>Doctor</label>
				                        <select class="form-control" name="doctor_name">
				                            <option>Select Consultant</option>
				                        @foreach($doctors as $doctor)
				                            <option value="{{ $doctor->id }}">
				                                {{ $doctor->name }}
				                            </option>
				                        @endforeach
				                        </select>
				                    </div>
				                </div>
				                </div>
				                <!-- /.card-body -->
				                <div class="card-footer">
				                    <button type="submit" class="btn btn-primary">REGISTER APPOINTMENT</button>
				                </div>
				            </form>
				        </div>
				    </div>
				</div>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>

@endsection

</x-admin.admin-master>