<x-admin.admin-master>

@section('content')
<div class="row">
	@if(session('schedule-created'))
		<div class="col-12 mt-2">
        	<div class="alert alert-success">{{ session('schedule-created') }}</div>
        </div>
    @elseif(session('schedule-updated'))
    	<div class="col-12 mt-2">
        	<div class="alert alert-warning">{{ session('schedule-updated') }}</div>
        </div>
    @endif
	<div class="col-12 my-3">
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
        	Make Schedule
        </button>
	</div>

	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Appointment Schedule List</h3>
			</div>
			<!-- /.card-header -->
			<div class="card-body table-responsive p-0">
				<table class="table table-hover text-nowrap">
					<thead>
						<tr>
							<th>ID</th>
							<th>Day</th>
							<th>Schedule start</th>
							<th>Schedule end</th>
							<th>Patient limit</th>
							<th>Status</th>
							<th>Created At</th>
							<th>Updated At</th>
							<th>Edit</th>
							<th>Delete</th>
						</tr>
					</thead>
					<tbody>
						@if(sizeof($schedules) != 0)
						@foreach($schedules as $schedule)
							<tr>
								<td>{{ $schedule->id }}</td>
								<td>{{ $schedule->day }}</td>
								<td>{{ $schedule->schedule_start }}</td>
								<td>{{ $schedule->schedule_end }}</td>
								<td>{{ $schedule->patient_limit }}</td>
								<td>{{ $schedule->status }}</td>
								<td>{{ $schedule->created_at->diffForHumans() }}</td>
								<td>{{ $schedule->updated_at->diffForHumans() }}</td>
								<td>
									<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-{{ $schedule->id }}">
							        	Edit
							        </button>
							        <div class="modal fade" id="modal-{{ $schedule->id }}" style="display: none;" aria-hidden="true">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-body">
													<div class="row">
													    <div class="col-12">
													        <div class="card card-primary">
													            
													            <form method="post" action="{{ route('schedule.update', $schedule->id) }}" enctype="multipart/form-data">

													                @csrf
													                <input type="hidden" name="doctor_id" value="{{ auth()->user()->id }}">
													                <div class="card-body">
													                    <div class="form-group">
													                        <label for="day">Schedule Date</label>
													                        <input type="date" class="form-control" id="day" name="day" value="{{ $schedule->day }}">
													                    @error('day')
													                        <span class="text-danger">{{ $message }}</span>
													                    @enderror
													                    </div>
													                    <div class="form-group">
													                        <label for="schedule_start">Schedule Start Time</label>
													                        <input type="time" class="form-control" id="schedule_start" name="schedule_start" value="{{ $schedule->schedule_start }}">
													                    @error('schedule_start')
													                        <span class="text-danger">{{ $message }}</span>
													                    @enderror
													                    </div>
													                    <div class="form-group">
													                        <label for="schedule_end">Schedule End Time</label>
													                        <input type="time" class="form-control" id="schedule_end" name="schedule_end" value="{{ $schedule->schedule_end }}">
													                    @error('schedule_end')
													                        <span class="text-danger">{{ $message }}</span>
													                    @enderror
													                    </div>
													                    <div class="form-group">
													                        <label for="patient_limit">Patient Limit</label>
													                        <input type="number" class="form-control" id="patient_limit" name="patient_limit" value="{{ $schedule->patient_limit }}">
													                    @error('patient_limit')
													                        <span class="text-danger">{{ $message }}</span>
													                    @enderror
													                    </div>
													                    <div class="form-group">
													                        <label>Schedule Status</label>
													                        <select class="form-control" name="status">
													                            <option value="1" @if($schedule->status==1) selected @endif>On</option>
													                            <option value="0" @if($schedule->status==0) selected @endif>Off</option>
													                        </select>
													                    @error('status')
													                        <span class="text-danger">{{ $message }}</span>
													                    @enderror
													                    </div>
													                </div>
													                <!-- /.card-body -->
													                <div class="card-footer">
													                    <button type="submit" class="btn btn-primary">Update Schedule</button>
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
									<form action="" method="post">
										@csrf
										@method('DELETE')
										<button type="submit" cursor="pointer" class="btn btn-danger">Delete</button>
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
		</div>
	</div>
</div>

<!-- Make Schedule Modal -->
<div class="modal fade" id="modal-default" style="display: none;" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">
				<div class="row">
				    <div class="col-12">
				        <div class="card card-primary">
				            
				            <form method="post" action="{{ route('schedule.store') }}" enctype="multipart/form-data">

				                @csrf
				                <input type="hidden" name="doctor_id" value="{{ auth()->user()->id }}">
				                <div class="card-body">
				                    <div class="form-group">
				                        <label for="day">Schedule Date</label>
				                        <input type="date" class="form-control" id="day" name="day">
				                    @error('day')
				                        <span class="text-danger">{{ $message }}</span>
				                    @enderror
				                    </div>
				                    <div class="form-group">
				                        <label for="schedule_start">Schedule Start Time</label>
				                        <input type="time" class="form-control" id="schedule_start" name="schedule_start">
				                    @error('schedule_start')
				                        <span class="text-danger">{{ $message }}</span>
				                    @enderror
				                    </div>
				                    <div class="form-group">
				                        <label for="schedule_end">Schedule End Time</label>
				                        <input type="time" class="form-control" id="schedule_end" name="schedule_end">
				                    @error('schedule_end')
				                        <span class="text-danger">{{ $message }}</span>
				                    @enderror
				                    </div>
				                    <div class="form-group">
				                        <label for="patient_limit">Patient Limit</label>
				                        <input type="number" class="form-control" id="patient_limit" name="patient_limit">
				                    @error('patient_limit')
				                        <span class="text-danger">{{ $message }}</span>
				                    @enderror
				                    </div>
				                    <div class="form-group">
				                        <label>Schedule Status</label>
				                        <select class="form-control" name="status">
				                            <option value="1">On</option>
				                            <option value="0">Off</option>
				                        </select>
				                    @error('status')
				                        <span class="text-danger">{{ $message }}</span>
				                    @enderror
				                    </div>
				                </div>
				                <!-- /.card-body -->
				                <div class="card-footer">
				                    <button type="submit" class="btn btn-primary">Make Schedule</button>
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