<x-admin.admin-master>

@section('content')
<div class="row">
	@if(session('doctor-delete-message'))
	<div class="col-12 mt-2">
		<div class="alert alert-danger">{{ session('doctor-delete-message') }}</div>
	</div>
	@elseif(session('doctor-update-message'))
	<div class="col-12 mt-2">
		<div class="alert alert-success">{{ session('doctor-update-message') }}</div>
	</div>
	@elseif(session('doctor-create-message'))
	<div class="col-12 mt-2">
		<div class="alert alert-success">{{ session('doctor-create-message') }}</div>
	</div>
	@endif

	<div class="col-12 my-3">
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg">
        	Create Doctor
        </button>
	</div>

	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Doctor List</h3>
			</div>
			<!-- /.card-header -->
			<div class="card-body table-responsive p-0">
				<table class="table table-hover text-nowrap">
					<thead>
						<tr>
							<th>ID</th>
							<th>Photo</th>
							<th>Name</th>
							<th>Email</th>
							<th>Phone</th>
							<th>Speciality</th>
							<th>Created At</th>
							<th>Updated At</th>
							<th colspan="2" class="text-center">Action</th>
						</tr>
					</thead>
					<tbody>
					@if(sizeof($doctors) != 0)
						@foreach($doctors as $doctor)
						<tr>
							<td>{{ $doctor->id }}</td>
							<td>
								<img height="50" src="{{ $doctor->photo }}" alt="doctor-photo">
							</td>
							<td><a data-toggle="modal" data-target="#modal-{{ $doctor->id }}" href="">{{ $doctor->name }}</a></td>
							<td>{{ $doctor->email }}</td>
							<td>{{ $doctor->phone }}</td>
							<td>{{ $doctor->speciality }}</td>
							<td>{{ $doctor->created_at->diffForHumans() }}</td>
							<td>{{ $doctor->updated_at->diffForHumans() }}</td>
							<td>
								<button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-{{ $doctor->id }}">
				                  	Edit
				                </button>
				                <!-- Doctor Edit Modal -->
								<div class="modal fade" id="modal-{{ $doctor->id }}" style="display: none;" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<h4 class="modal-title">Edit Doctor</h4>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">×</span>
												</button>
											</div>
											<div class="modal-body">
												<div class="row">
												    <div class="col-12">
												        <div class="card card-primary">
												            <!-- /.card-header -->
												            <!-- form start -->
												            <form method="post" action="{{ route('doctor.update', $doctor->id) }}" enctype="multipart/form-data" class="needs-validation" novalidate>

												                @csrf
												                @method('PATCH')
												                <div class="card-body">
												                    <div class="form-group">
												                        <label for="doctor-name">Name</label>
												                        <input type="text" class="form-control" id="doctor-name" value="{{ $doctor->name }}" name="name" required>
												                    </div>
												                    <div class="form-group">
												                        <label for="exampleInputEmail1">Email address</label>
												                        <input type="email" class="form-control" id="exampleInputEmail1" value="{{ $doctor->email }}" name="email" required>
												                    </div>
												                    <div class="form-group">
												                        <label for="phone-no">Phone</label>
												                        <input type="number" class="form-control" id="phone-no" value="{{ $doctor->phone }}" name="phone" required>
												                    </div>
												                    <div class="form-group">
												                        <label for="speciality">Speciality</label>
												                        <input type="text" class="form-control" id="speciality" value="{{ $doctor->speciality }}" name="speciality" required>
												                    </div>

												                    <div class="form-group">
												                        <div><img src="{{ $doctor->photo }}" alt="doctor-photo" height="80"></div>
												                        <label for="photo">Photo</label>
												                        <input type="file" class="form-control-file" id="photo" name="photo">
												                    </div>
												                </div>
												                <!-- /.card-body -->
												                <div class="card-footer">
												                    <button type="submit" class="btn btn-primary">Submit</button>
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
							</td>
							<td>
								<form action="{{ route('doctor.delete', $doctor->id) }}" method="post">
									@csrf
									@method('DELETE')
									<button type="submit" cursor="pointer" class="btn btn-sm btn-danger">Delete</button>
								</form>
							</td>
						</tr>
						@endforeach
					@else
						<tr>
							<td colspan="9" class="text-center">No Data to show</td>
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

<!-- Doctor Create Modal -->
<div class="modal fade" id="modal-lg">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Create Doctor</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
				    <div class="offset-md-1 col-md-10">
				        <div class="card card-primary">
				            <form method="post" action="{{ route('doctor.store') }}" enctype="multipart/form-data"  class="needs-validation" novalidate>

				                @csrf
				                <div class="card-body">
				                <div class="row">
				                    <div class="form-group col-md-6">
				                        <label for="doctor-name">Name</label>
				                        <input type="text" class="form-control" id="doctor-name" placeholder="Name" name="name" required>
				                        <div class="invalid-feedback">
								          	Name field is required
								        </div>
				                    @error('name')
				                        <span class="text-danger">{{ $message }}</span>
				                    @enderror
				                    </div>
				                    <div class="form-group col-md-6">
				                        <label for="exampleInputEmail1">Email address</label>
				                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="email" required>
				                        <div class="invalid-feedback">
								          	Email field is required
								        </div>
				                    @error('email')
				                        <span class="text-danger">{{ $message }}</span>
				                    @enderror
				                    </div>
				                    <div class="form-group col-md-3">
				                        <label for="phone-no">Phone</label>
				                        <input type="number" class="form-control" id="phone-no" placeholder="Contact No" name="phone" required>
				                        <div class="invalid-feedback">
								          	Contact is required
								        </div>
				                    @error('phone')
				                        <span class="text-danger">{{ $message }}</span>
				                    @enderror
				                    </div>
				                    <div class="form-group col-md-3">
				                        <label for="speciality">Speciality</label>
				                        <input type="text" class="form-control" id="speciality" placeholder="Speciality" name="speciality" required>
				                        <div class="invalid-feedback">
								          	Speciality is required
								        </div>
				                    @error('speciality')
				                        <span class="text-danger">{{ $message }}</span>
				                    @enderror
				                    </div>
				                    <div class="form-group col-md-3">
				                        <label for="password">{{ __('Password') }}</label>
				                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
				                        <div class="invalid-feedback">
								          	Password is required
								        </div>
				                        @error('password')
				                            <span class="invalid-feedback" role="alert">
				                                <strong>{{ $message }}</strong>
				                            </span>
				                        @enderror
				                    </div>

				                    <div class="form-group col-md-3">
				                        <label for="password-confirm">{{ __('Confirm Password') }}</label>
				                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
				                    </div>
				                    <div class="form-group col-md-6">
				                        <label>Department</label>
				                        <select class="form-control" name="department_id" required="required">
				                            <option>Select department for the doctor</option>
				                        @foreach($departments as $department)
				                            <option value="{{ $department->id }}">{{ $department->name }}</option>
				                        @endforeach
				                        </select>
				                        <div class="invalid-feedback">
								          	Department is required
								        </div>
				                    @error('department')
				                        <span class="text-danger">{{ $message }}</span>
				                    @enderror
				                    </div>
				                    <div class="form-group col-md-6">
				                        <label for="photo">Photo</label>
				                        <input type="file" class="form-control-file" id="photo" name="photo">
				                    @error('photo')
				                        <span class="text-danger">{{ $message }}</span>
				                    @enderror
				                    </div>
				                </div>
				                </div>
				                <!-- /.card-body -->
				                <div class="card-footer">
				                    <button type="submit" class="btn btn-primary">REGISTER DOCTOR</button>
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

@section('script')
<script>
	(function() {
		'use strict';
		window.addEventListener('load', function() {
		// Fetch all the forms we want to apply custom Bootstrap validation styles to
		var forms = document.getElementsByClassName('needs-validation');
		// Loop over them and prevent submission
		var validation = Array.prototype.filter.call(forms, function(form) {
		form.addEventListener('submit', function(event) {
		if (form.checkValidity() === false) {
		event.preventDefault();
		event.stopPropagation();
		}
		form.classList.add('was-validated');
		}, false);
		});
		}, false);
	})();
</script>
@endsection

</x-admin.admin-master>