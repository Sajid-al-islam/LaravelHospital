<x-frontend.frontend-master>
@section('content')
    <div class="container">
        
        <div class="section-top-border">
            <div class="row">
                <h4 class="offset-lg-1 col-md-10 mb-4">TO REQUEST FOR AN ONLINE APPOINTMENT, PLEASE COMPLETE THE FORM BELOW AND CLICK THE “REQUEST” BUTTON.</h4>
                @if(session('message'))
                    <blockquote class="generic-blockquote">
                        {{ session('message') }}
                    </blockquote>
                @endif
                <div class="offset-lg-2 col-lg-8 col-md-8">
                    <form method="post" action="{{ route('appointment.store') }}">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-lg-4">
                                    <label for="department">Department</label>
                                    <select name="department" id="department" class="form-control">
                                        <option value="{{ $doctor->department_id }}" selected disabled>{{ $doctor->department->name }}</option>
                                    </select>
                                    
                                @error('department')
                                    <span style="color: red;">{{ $message }}</span>
                                @enderror
                                </div>

                                <div class="form-group col-lg-4">
                                    <label for="doctor_id">Doctor</label>
                                    <select name="doctor_id" id="doctor_id" class="form-control">
                                        <option value="{{ $doctor->id }}" selected disabled>{{ $doctor->name }}</option>
                                    </select>
                                @error('doctor_id')
                                    <span style="color: red;">{{ $message }}</span>
                                @enderror
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="doctor-name">Patient full name</label>
                                    <input type="text" class="form-control" id="doctor-name" placeholder="Name" name="name">
                                @error('name')
                                    <span style="color: red;">{{ $message }}</span>
                                @enderror
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                                @error('email')
                                    <span style="color: red;">{{ $message }}</span>
                                @enderror
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="phone">Phone</label>
                                    <input type="number" class="form-control" id="phone" placeholder="Enter contact no" name="phone">
                                @error('phone')
                                    <span style="color: red;">{{ $message }}</span>
                                @enderror
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="age">Age</label>
                                    <input type="number" class="form-control" id="age" name="age">
                                @error('age')
                                    <span style="color: red;">{{ $message }}</span>
                                @enderror
                                </div>
                                <div class="form-group col-lg-4">
                                    <label>Blood Group</label>
                                    <select class="form-control" name="blood_group">
                                        <option>Select blood group</option>
                                        <option value="A+">A+</option>
                                        <option value="B+">B+</option>
                                        <option value="A-">A-</option>
                                        <option value="AB+">AB+</option>
                                        <option value="AB-">AB-</option>
                                    </select>
                                @error('blood_group')
                                    <span style="color: red;">{{ $message }}</span>
                                @enderror
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="date">Preffered appointment Time</label>

                                    <select class="form-control" name="appointment_time" id="appointment_time">
                                    @if($schedules->count() == 0)
                                        <option>No schedule given</option>
                                    @else
                                        @foreach($schedules as $schedule)
                                        <option value="{{ $schedule->day }}">{{ $schedule->day }}</option>
                                        @endforeach
                                    @endif
                                    </select>
                                @error('appointment_time')
                                    <span style="color: red;">{{ $message }}</span>
                                @enderror
                                </div>

                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">REQUEST</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

</x-frontend.frontend-master>

