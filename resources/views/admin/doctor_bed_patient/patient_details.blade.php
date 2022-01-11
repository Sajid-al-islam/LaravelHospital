<x-admin.admin-master>

@section('content')
<div class="row">
    <div class="offset-md-1 col-md-10">
        <div class="card card-primary">
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="patient-name">Patient Name</label>
                        <input type="text" class="form-control" id="patient-name" value="{{ $patient->name }}">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="age">Age</label>
                        <input type="text" class="form-control" id="age" value="{{ $patient->age }}">
                    </div>
                    <div class="form-group col-md-3">
                        <label>Sex</label>
                        <input type="text" class="form-control" id="sex" value="{{ $patient->sex }}">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" id="phone" value="{{ $patient->phone }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="guardian_name">Guardian Name</label>
                        <input type="text" class="form-control" id="guardian_name" value="{{ $patient->guardian_name }}">
                    
                    </div>
                    <div class="form-group col-md-3">
                        <label for="guardian_phone">Guardian Phone</label>
                        <input type="text" class="form-control" id="guardian_phone" value="{{ $patient->guardian_phone }}">
                    
                    </div>
                    <div class="form-group col-md-4">
                        <label for="symptoms">Symptoms</label>
                        <textarea class="form-control" rows="6" id="symptoms">{{ $patient->symptoms }}</textarea>
                    
                    </div>
                    <div class="form-group col-4">
                        <label for="condition">Condition</label>
                        <textarea class="form-control" rows="6" id="condition">{{ $patient->condition }}</textarea>
                    
                    </div>
                    <div class="form-group col-md-4">
                        <label for="note">Note</label>
                        <textarea class="form-control" rows="6" id="note">{{ $patient->note }}</textarea>
                    
                    </div>
                    <div class="form-group col-md-4">
                        <label>Blood Group</label>
                        <input type="text" class="form-control" id="blood_group" value="{{ $patient->blood_group }}">
                    
                    </div>
                    <div class="form-group col-md-4">
                        <label>Department</label>
                        <input type="text" class="form-control" id="department" value="{{ $patient->department->name }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label>Doctor</label>
                        <input type="text" class="form-control" id="doctor_id" value="{{ $patient->doctor->name }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label>Floor</label>
                        <input type="text" class="form-control" id="floor_id" value="{{ $patient->floor->name }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label>Bed Category</label>
                        <input type="text" class="form-control" id="bed_category_id" value="{{ $patient->bedCategory->name }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label>Bed</label>
                        <input type="text" class="form-control" id="bed_id" value="{{ $patient->bed->name }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

</x-admin.admin-master>