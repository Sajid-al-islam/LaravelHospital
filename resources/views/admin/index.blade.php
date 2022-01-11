<x-admin.admin-master>
	
@section('content')
	<div class="row pt-4">
		<div class="col-lg-3 col-6">
			<!-- small box -->
			<div class="small-box bg-info">
				<div class="inner">
					<h5>Departments</h5>
					<p>Add or view list</p>
				</div>
				<div class="icon">
					<i class="ion ion-bag"></i>
				</div>
				<a href="{{ route('department.view') }}" class="small-box-footer">Department <i class="fas fa-arrow-circle-right"></i></a>
			</div>
		</div>
		<!-- ./col -->
		<div class="col-lg-3 col-6">
			<!-- small box -->
			<div class="small-box bg-info">
				<div class="inner">
					<h5>Doctors</h5>
					<p>Add or view list</p>
				</div>
				<div class="icon">
					<i class="ion ion-stats-bars"></i>
				</div>
				<a href="{{ route('doctor.view') }}" class="small-box-footer">Doctors <i class="fas fa-arrow-circle-right"></i></a>
			</div>
		</div>
		<!-- ./col -->
		<div class="col-lg-3 col-6">
			<!-- small box -->
			<div class="small-box bg-info">
				<div class="inner">
					<h5>Services</h5>
					<p>Add or view list</p>
				</div>
				<div class="icon">
					<i class="ion ion-pie-graph"></i>
				</div>
				<a href="{{ route('service.index') }}" class="small-box-footer">Services <i class="fas fa-arrow-circle-right"></i></a>
			</div>
		</div>
		<!-- ./col -->
		<div class="col-lg-3 col-6">
			<!-- small box -->
			<div class="small-box bg-info">
				<div class="inner">
					<h5>Appointment</h5>
					<p>Add or view list</p>
				</div>
				<div class="icon">
					<i class="ion ion-bag"></i>
				</div>
				<a href="{{ route('admin.list') }}" class="small-box-footer">Appointment <i class="fas fa-arrow-circle-right"></i></a>
			</div>
		</div>
		<div class="col-lg-3 col-6">
			<!-- small box -->
			<div class="small-box bg-danger">
				<div class="inner">
					<h5>Patients</h5>
					<p>Register patients</p>
				</div>
				<div class="icon">
					<i class="ion ion-person-add"></i>
				</div>
				<a href="{{ route('patient.add') }}" class="small-box-footer">Patients <i class="fas fa-arrow-circle-right"></i></a>
			</div>
		</div>
		<!-- ./col -->
		<div class="col-lg-3 col-6">
			<!-- small box -->
			<div class="small-box bg-warning">
				<div class="inner">
					<h5>My profile</h5>
					<p>{{ Str::limit(auth()->user()->name, 10) }}</p>
				</div>
				<div class="icon">
					<i class="ion ion-stats-bars"></i>
				</div>
				<a href="{{ route('user.profile', auth()->user()->id) }}" class="small-box-footer">Visit profile <i class="fas fa-arrow-circle-right"></i></a>
			</div>
		</div>
		<!-- ./col -->
	</div>
@endsection

</x-admin.admin-master>