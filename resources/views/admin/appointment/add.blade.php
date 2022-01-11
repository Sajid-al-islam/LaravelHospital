<x-admin.admin-master>

@section('content')
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
                        <label for="date">Preffered appointment Time</label>
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
@endsection

</x-admin.admin-master>