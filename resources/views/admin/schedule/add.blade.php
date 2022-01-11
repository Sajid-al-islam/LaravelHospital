<x-admin.admin-master>

@section('content')
    @if(session('schedule-created'))
        <div class="alert alert-success">{{ session('schedule-created') }}</div>
    @endif
<div class="row">
    <div class="col-md-6">
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
@endsection

</x-admin.admin-master>