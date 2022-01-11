<x-admin.admin-master>

@section('content')
	<div class="row">
	    <div class="offset-md-1 col-md-10 mt-3">
	        <div class="card card-primary">

	            <form method="post" action="" id="main_form">

	                @csrf
	                <div class="card-body">
	                <div class="row">
	                    <div class="form-group col-md-6">
	                        <label for="patient-name">Patient Name</label>
	                        <input type="text" class="form-control" id="patient-name" placeholder="Name" name="name">
	                        <span class="text-danger error-text name_error"></span>
	                    </div>
	                    <div class="form-group col-md-3">
	                        <label for="age">Age</label>
	                        <input type="number" class="form-control" id="age" name="age">
	                        <span class="text-danger error-text age_error"></span>
	                    </div>
	                    <div class="form-group col-md-3">
	                        <label>Sex</label>
	                        <div class="form-check">
	                            <input class="form-check-input" type="radio" name="sex" value="male" id="male">
	                            <label class="form-check-label" for="male">MALE</label>
	                        </div>
	                        <div class="form-check">
	                            <input class="form-check-input" type="radio" name="sex" value="female" id="female">
	                            <label class="form-check-label" for="female">FEMALE</label>
	                        </div>
	                        <span class="text-danger error-text sex_error"></span>
	                    </div>
	                    <div class="form-group col-md-3">
	                        <label for="phone">Phone</label>
	                        <input type="text" class="form-control" id="phone" name="phone">
	                        <span class="text-danger error-text name_phone"></span>
	                    </div>
	                    <div class="form-group col-md-6">
	                        <label for="guardian_name">Guardian Name</label>
	                        <input type="text" class="form-control" id="guardian_name" placeholder="Guardian Name" name="guardian_name">
	                        <span class="text-danger error-text guardian_name_error"></span>
	                    </div>
	                    <div class="form-group col-md-3">
	                        <label for="guardian_phone">Guardian Phone</label>
	                        <input type="text" class="form-control" id="guardian_phone" name="guardian_phone">
	                        <span class="text-danger error-text guardian_phone_error">
	                    </div>
	                    <div class="form-group col-md-4">
	                        <label for="symptoms">Symptoms</label>
	                        <textarea class="form-control" rows="6" placeholder="Symptoms ..." id="symptoms" name="symptoms"></textarea>
	                        <span class="text-danger error-text symptoms_error">
	                    </div>
	                    <div class="form-group col-4">
	                        <label for="condition">Condition</label>
	                        <textarea class="form-control" rows="6" placeholder="Prescribe Here ..." id="condition" name="condition"></textarea>
	                        <span class="text-danger error-text condition_error">
	                    </div>
	                    <div class="form-group col-md-4">
	                        <label for="note">Note</label>
	                        <textarea class="form-control" rows="6" placeholder="Test Field ..." id="note" name="note"></textarea>
	                        <span class="text-danger error-text note_error">
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
	                        <span class="text-danger error-text blood_group_error">
	                    </div>
	                    <div class="form-group col-md-4">
	                        <label>Department</label>
	                        <select class="form-control dept" name="department_id" id="department">
	                            <option>Select department</option>
	                        @foreach($departments as $department)
	                            <option value="{{ $department->id }}">
	                                {{ $department->name }}
	                            </option>
	                        @endforeach()
	                        </select>
	                    </div>
	                    <div class="form-group col-md-4">
	                        <label>Doctor</label>
	                        <select class="form-control" name="doctor_id" id="doctor_id">
	                            <option>Select Department First</option>
	                        
	                        </select>
	                    </div>
	                    <div class="form-group col-md-4">
	                        <label>Select Floor</label>
	                        <select class="form-control" name="floor_id" id="floor">
	                            <option>Select floor name</option>
	                            @foreach($floors as $floor)
	                            <option value="{{ $floor->id }}">{{ $floor->name }}</option>
	                            @endforeach
	                        </select>
	                        <span class="text-danger error-text floor_id_error">
	                    </div>
	                    <div class="form-group col-md-4">
	                        <label>Select Bed Category</label>
	                        <select class="form-control" name="bed_category_id" id="bed_category_id">
	                            <option>Select Floor First</option>
	                        </select>
	                        <span class="text-danger error-text bed_category_id_error">
	                    </div>
	                    <div class="form-group col-md-4">
	                        <label>Select Bed</label>
	                        <select class="form-control" name="bed_id" id="bed_id">
	                            <option>Select Category First</option>
	                        </select>
	                        <span class="text-danger error-text bed_id_error">
	                    </div>
	                </div>
	                </div>
	                <!-- /.card-body -->
	                <div class="card-footer">
	                    <button type="submit" class="btn btn-primary">Register Patient</button>
	                </div>
	            </form>
	        </div>
	    </div>
	</div>
@endsection

</x-admin.admin-master>