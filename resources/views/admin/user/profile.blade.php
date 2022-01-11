@extends('admin.index')

@section('content')
<div class="row">
	<div class="col-md-4">
		@if(!auth()->user()->userHasRole('super-admin'))
		<div class="card card-primary">
			<div class="card-body">
				<div class="row">
					<div class="col-md-6">
						@if(auth()->user()->userHasAttendance(date('Y-m-d')))
						<button type="submit" class="btn btn-success">Attendance Submitted</button>
						@else
						<form action="{{ route('attendance.store') }}" method="post">
							@csrf
							<input type="hidden" value="{{ Auth::id() }}" name="attendance_id">
							<button type="submit" class="btn btn-warning">Submit Attendance</button>
						</form>
						@endif
					</div>
					<div class="col-md-6"><button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modal-lg">Show Attendance List</button></div>
				</div>
			</div>
			<!-- /.card-body -->
		</div>
		@else
		<div class="card card-primary">
			<div class="card-body">
				<div class="row">
					<div class="col-md-6">
						<button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modal-lg">Doctor Attendance</button>
					</div>
					<div class="col-md-6"><button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modal-lg-staff">Staff Attendance</button></div>
				</div>
			</div>
			<!-- /.card-body -->
		</div>
		@endif
		<div class="card card-primary">
			<div class="card-header">
				<h3 class="card-title">About Me</h3>
			</div>

			<div class="card-body">
				<div class="text-center mb-4">
	              	<img class="profile-user-img img-fluid img-circle"
	                   src="{{ $user->photo }}"
	                   alt="User profile picture">
	            </div>
	            <div class="row mb-3">
	            	<div class="col-md-9">
			            <form id="formPhoto" action="{{ route('user.update.photo', $user->id) }}" method="post" enctype="multipart/form-data">
			            	@csrf
			            	@method('PATCH')
			            	<input type="file" name="photo">
			            </form>
		            </div>
		            <div class="col-md-3"><input type="submit" name="Submit" form="formPhoto" value="Update"></div>
	            </div>
				<strong><i class="fas fa-book mr-1"></i> Name</strong>
				<p class="text-muted">
					{{ $user->name }}
				</p>
				<hr>
				<strong><i class="fas fa-map-marker-alt mr-1"></i> Email</strong>
				<p class="text-muted">{{ $user->email }}</p>
				<hr>
				<strong><i class="fas fa-map-marker-alt mr-1"></i> Mobile no</strong>
				<p class="text-muted">{{ $user->phone }}</p>
				<strong><i class="fas fa-map-marker-alt mr-1"></i> User Role</strong>
			@foreach($user->roles as $role)
				<p class="text-muted">{{ $role->name }}</p>
			@endforeach
				
			</div>
			<!-- /.card-body -->
		</div>
		<!-- /.card -->
	</div>
	<div class="col-md-8">
		<div class="card">
			<div class="card-header p-2">
				<ul class="nav nav-pills">
					<li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">UPDATE USER PROFILE</a></li>
				</ul>
			</div><!-- /.card-header -->
			<div class="card-body">
				<div class="tab-content">
					<!-- /.tab-pane -->
					<div class="tab-pane active" id="settings">
						<form class="form-horizontal" action="{{ route('user.update', $user->id) }}" method="post">
							@csrf
							@method('PATCH')
							<div class="form-group row">
								<label for="name" class="col-sm-2 col-form-label">Name</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="name" value="{{ $user->name }}" name="name">
								@error('name')
								<span class="text-danger">{{ $message }}</span>
								@enderror
								</div>
							</div>
							<div class="form-group row">
								<label for="email" class="col-sm-2 col-form-label">Email</label>
								<div class="col-sm-10">
									<input type="email" class="form-control" id="email" value="{{ $user->email }}" name="email">
								@error('email')
								<span class="text-danger">{{ $message }}</span>
								@enderror
								</div>
							</div>
							<div class="form-group row">
								<label for="phone" class="col-sm-2 col-form-label">Phone</label>
								<div class="col-sm-10">
									<input type="number" class="form-control" id="phone" value="{{ $user->phone }}" name="phone">
								@error('phone')
									<span class="text-danger">{{ $message }}</span>
								@enderror
								</div>
							</div>
							
							<div class="form-group row">
								<div class="offset-sm-2 col-sm-10">
									<button type="submit" class="btn btn-primary">UPDATE PROFILE</button>
								</div>
							</div>
						</form>
					</div>
					<!-- /.tab-pane -->
				</div>
				<!-- /.tab-content -->
			</div><!-- /.card-body -->
		</div>
				<!-- /.card -->

		<div class="card">
			<div class="card-header p-2">
				<ul class="nav nav-pills">
					<li class="nav-item"><a class="nav-link btn btn-danger active" href="#settings" data-toggle="tab">UPDATE USER PASSWORD</a></li>
				</ul>
				@if(session('update-password'))
					<div class="alert alert-danger mt-3">{{ session('update-password') }}</div>
				@endif
			</div><!-- /.card-header -->
			<div class="card-body">
				<div class="tab-content">
					<!-- /.tab-pane -->
					<div class="tab-pane active" id="settings">
						<form class="form-horizontal" action="{{ route('user.update.password', $user->id) }}" method="post">
							@csrf
							@method('PATCH')

							<div class="form-group row">
								<label for="password" class="col-sm-2 col-form-label">Password</label>
								<div class="col-sm-10">
									<input type="password" class="form-control" id="password" name="password">
								@error('password')
								<span class="text-danger">{{ $message }}</span>
								@enderror
								</div>
							</div>

							<div class="form-group row">
								<label for="password_confirmation" class="col-sm-2 col-form-label">Confirm Password</label>
								<div class="col-sm-10">
									<input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
								</div>
							</div>
							
							<div class="form-group row">
								<div class="offset-sm-2 col-sm-10">
									<button type="submit" class="btn btn-danger">UPDATE PASSWORD</button>
								</div>
							</div>
						</form>
					</div>
					<!-- /.tab-pane -->
				</div>
				<!-- /.tab-content -->
			</div><!-- /.card-body -->
		</div>
				<!-- /.card -->
	</div>
</div>

<!-- ********	Attendance List Modal	************ -->
<div class="modal fade" id="modal-lg" style="display: none;" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Attendance List</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="col-12">
					<div class="card">
						<div class="card-body table-responsive p-0">
							<table class="table table-hover text-nowrap">
								<thead>
									<tr>
										<th>ID</th>
										<th>Name</th>
										<th>Attendance Date</th>
										<th>Created At</th>
										<th>Updated At</th>
									</tr>
								</thead>
								<tbody>

								@foreach($user_attendance as $attendance)
									<tr>
										<td>{{ $attendance->id }}</td>
										<td>{{ $attendance->user->name }}</td>
										<td>{{ $attendance->date }}</td>
										<td>{{ $attendance->created_at->diffForHumans() }}</td>
										<td>{{ $attendance->updated_at->diffForHumans() }}</td>
									</tr>
								@endforeach
								</tbody>
							</table>
						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->
				</div>			
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modal-lg" style="display: none;" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Attendance List</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="col-12">
					<div class="card">
						<div class="card-body table-responsive p-0">
							<table class="table table-hover text-nowrap">
								<thead>
									<tr>
										<th>ID</th>
										<th>Name</th>
										<th>Attendance Date</th>
										<th>Created At</th>
										<th>Updated At</th>
									</tr>
								</thead>
								<tbody>

								@foreach($user_attendance as $attendance)
									<tr>
										<td>{{ $attendance->id }}</td>
										<td>{{ $attendance->user->name }}</td>
										<td>{{ $attendance->date }}</td>
										<td>{{ $attendance->created_at->diffForHumans() }}</td>
										<td>{{ $attendance->updated_at->diffForHumans() }}</td>
									</tr>
								@endforeach
								</tbody>
							</table>
						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->
				</div>			
			</div>
		</div>
	</div>
</div>

@endsection