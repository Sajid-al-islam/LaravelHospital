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
                            <div class="form-group col-lg-6">
                                <label>Department</label>
                                <select class="form-control dept" name="department" id="department">
                                    <option>Select department</option>
                                @foreach($departments as $department)
                                    <option value="{{ $department->id }}">
                                        {{ $department->name }}
                                    </option>
                                @endforeach()
                                </select>
                            @error('department')
                                <span style="color: red;">{{ $message }}</span>
                            @enderror
                            </div>

                            <div class="form-group col-lg-6">
                                <label>Doctor</label>
                                <select class="form-control" name="doctor_id" id="doctor_id">
                                    <option>Select Department First</option>
                                
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

                                <!-- <input type="date" class="form-control" id="date" name="appointment_time"> -->
                                <select class="form-control" name="appointment_time" id="appointment_time">
                                    <option>Select Consultant</option>
                                
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

@section('script')

<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
<script>
    'use strict';
    $(document).ready(function() {
        $('#department').on('change', function() {
            let department_id = $(this).val();
            if(department_id) {
                $.ajax({
                    url: 'get_department/'+department_id,
                    type: "GET",
                    data : {"_token":"{{ csrf_token() }}"},
                    dataType: "json",
                    success:function(data) {
                        console.log(data);
                    if(data){
                        $('#doctor_id').empty();
                        $('#doctor_id').focus;
                        $('#doctor_id').append('<option value="">-- Select doctor --</option>'); 
                        $.each(data, function(key, value){
                        $('#doctor_id').append('<option value="'+ value.id +'">' + value.name+ '</option>');
                    });
                }else{
                    $('#doctor_id').empty();
                }
                }
                });
            }else{
            $('#doctor_id').empty();
            }
        });

        $('#doctor_id').on('change', function() {
            let doctor_id = $(this).val();
            if(doctor_id) {
                $.ajax({
                    url: 'get/doctor/schedule/'+doctor_id,
                    type: "GET",
                    data : {"_token":"{{ csrf_token() }}"},
                    dataType: "json",
                    success:function(data) {
                        console.log(data);
                    if(data){
                        $('#appointment_time').empty();
                        $('#appointment_time').focus;
                        $('#appointment_time').append('<option value="">-- Available Appointment Time --</option>'); 
                        $.each(data, function(key, value){
                        $('#appointment_time').append('<option value="'+ value.day +'">' + value.day+ '</option>');
                    });
                }else{
                    $('#appointment_time').empty();
                }
                }
                });
            }else{
            $('#appointment_time').empty();
            }
        });
    });

</script>
@endsection

</x-frontend.frontend-master>

