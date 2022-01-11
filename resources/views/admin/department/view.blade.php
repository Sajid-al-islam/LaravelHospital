<x-admin.admin-master>

@section('content')
<div class="row">
	@if(session('department-delete-message'))
	<div class="col-12 mt-3">
		<div class="alert alert-danger">{{ session('department-delete-message') }}</div>
	</div>
	@elseif(session('department-update-message'))
	<div class="col-12 mt-3">
		<div class="alert alert-warning">{{ session('department-update-message') }}</div>
	</div>
	@elseif(session('department-create-message'))
	<div class="col-12 mt-3">
		<div class="alert alert-success">{{ session('department-create-message') }}</div>
	</div>
	@endif

	<div class="col-12 my-3">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
          	Create Department
        </button>
	</div>

	<div class="col-12 mt-2">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Departments</h3>
			</div>
			<!-- /.card-header -->
			<div class="card-body table-responsive p-0">
				<table class="table table-hover text-nowrap">
					<thead>
						<tr>
							<th>ID</th>
							<th>photo</th>
							<th>Name</th>
							<th>Description</th>
							<th>Status</th>
							<th>Created At</th>
							<th>Updated At</th>
							<th colspan="2" class="text-center">Action</th>
						</tr>
					</thead>
					<tbody>
					@if(sizeof($departments) != 0)
						@foreach( $departments as $department )
						<tr>
							<td>{{ $department->id }}</td>
							<td><img src="{{ $department->photo }}" alt="department-photo" height="60"></td>
							<td><a data-toggle="modal" data-target="#modal-{{ $department->id }}" href="">{{ $department->name }}</a></td>
							<td>{{ Str::words($department->description, 5) }}</td>
							<td>{{ $department->status }}</td>
							<td>{{ $department->created_at->diffForHumans() }}</td>
							<td>{{ $department->updated_at->diffForHumans() }}</td>
							<td>
								<button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-{{ $department->id }}">
				                  	Edit
				                </button>
								<div class="modal fade" id="modal-{{ $department->id }}" style="display: none;" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<h4 class="modal-title">Edit Department</h4>
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
												            <form method="post" action="{{ route('department.update', $department->id) }}" enctype="multipart/form-data" class="needs-validation" novalidate>

												                @csrf
												                @method('PATCH')
												                <div class="card-body">
												                    <div class="form-group">
												                        <label for="doctor-name">Name</label>
												                        <input type="text" class="form-control" id="doctor-name" value="{{ $department->name }}" name="name" required>
												                    </div>
												                    <div class="form-group">
												                        <label for="desc">Description</label>
												                        <input type="text" class="form-control" id="desc" value="{{ $department->description }}" name="description" required>
												                    </div>
												                    
												                    <div class="form-group">
												                        <label>Status</label>
												                        <select class="form-control" name="status" required>
												                            <option value="1" @if($department->status == 1) selected @endif>Active</option>
												                            <option value="0" @if($department->status == 0) selected @endif>Deactive</option>
												                        </select>
												                    </div>
												                    <div>
												                        <img src="{{ $department->photo }}" alt="department-photo" height="80">
												                    </div>
												                    <div class="form-group">
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
								<form action="{{ route('department.delete', $department->id) }}" method="post">
									@csrf
									@method('DELETE')
									<button type="submit" cursor="pointer" class="btn btn-sm btn-danger">Delete</button>
								</form>
							</td>
						</tr>
						@endforeach
					@else
						<tr>
							<td colspan="8" class="text-center">No data found</td>
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


<!-- Department Create Model -->
<div class="modal fade" id="modal-default" style="display: none;" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Create Department</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
				    <div class="col-12">
				        <div class="card card-primary">
				            <form method="post" action="{{ route('department.store') }}" enctype="multipart/form-data" class="needs-validation" novalidate>

				                @csrf
				                <div class="card-body">
				                    <div class="form-group">
				                        <label for="doctor-name">Name</label>
				                        <input type="text" class="form-control" id="doctor-name" placeholder="Name" name="name" required>
				                        <div class="invalid-feedback">
								          	Name field is required
								        </div>
				                    @error('name')
				                        <span class="text-danger">{{ $message }}</span>
				                    @enderror
				                    </div>
				                    <div class="form-group">
				                        <label for="desc">Description</label>
				                        <input type="text" class="form-control" id="desc" placeholder="Description...." name="description" required>
				                        <div class="invalid-feedback">
								          	Description field is required
								        </div>
				                    @error('description')
				                        <span class="text-danger">{{ $message }}</span>
				                    @enderror
				                    </div>
				                    
				                    <div class="form-group">
				                        <label>Status</label>
				                        <select class="form-control" name="status" required>
				                            <option value="1">Active</option>
				                            <option value="0">Deactive</option>
				                        </select>
				                        <div class="invalid-feedback">
								          	Status is required
								        </div>
				                    @error('status')
				                        <span class="text-danger">{{ $message }}</span>
				                    @enderror
				                    </div>
				                    <div class="form-group">
				                        <label for="photo">Photo</label>
				                        <input type="file" class="form-control-file" id="photo" name="photo">
				                    @error('photo')
				                        <span class="text-danger">{{ $message }}</span>
				                    @enderror
				                    </div>
				                </div>
				                <!-- /.card-body -->
				                <div class="card-footer">
				                    <button type="submit" class="btn btn-primary">Create Department</button>
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