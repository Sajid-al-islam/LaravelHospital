<x-admin.admin-master>
@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Add In Patient</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a class="btn btn-primary" href="{{ route('inpatient.view') }}">See patient list</a></li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<div class="row">
    <div id="create-msg"></div>
    <div class="offset-md-1 col-md-10 mt-3">
        <div class="card card-primary">

            <form method="post" action="{{ route('inpatient.store') }}" id="main_form">

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
            let ur = '{{ route("inpatient.get.dept",["department" =>  ":department_id"]) }}';
            let url =ur.replace(':department_id', department_id);
            console.log(ur);
            if(department_id) {
                $.ajax({
                    url: url,
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
                $('#bed_category_id').empty();
            }
        });
    });

    $(document).ready(function() {
        $('#floor').on('change', function() {
            let floor_id = $(this).val();
            let ur = '{{ route("inpatient.get.floor",["floor" =>  ":floor_id"]) }}';
            let url =ur.replace(':floor_id', floor_id);
            console.log(ur);
            if(floor_id) {
                $.ajax({
                    url: url,
                    type: "GET",
                    data : {"_token":"{{ csrf_token() }}"},
                    dataType: "json",
                    success:function(data) {
                        console.log(data);
                    if(data){
                        $('#bed_category_id').empty();
                        $('#bed_category_id').focus;
                        $('#bed_category_id').append('<option value="">-- Select bed category --</option>'); 
                        $.each(data, function(key, value){
                        $('#bed_category_id').append('<option value="'+ value.id +'">' + value.name+ '</option>');
                    });
                }else{
                    $('#bed_category_id').empty();
                }
                }
                });
            }else{
                $('#bed_category_id').empty();
            }
        });
    });

    $(document).ready(function() {
        $('#bed_category_id').on('change', function() {
            let bed_category_id = $(this).val();
            let ur = '{{ route("inpatient.get.cat",["cat" =>  ":bed_category_id"]) }}';
            let url =ur.replace(':bed_category_id', bed_category_id);
            console.log(ur);
            if(bed_category_id) {
                $.ajax({
                    url: url,
                    type: "GET",
                    data : {"_token":"{{ csrf_token() }}"},
                    dataType: "json",
                    success:function(data) {
                        console.log(data);
                    if(data){
                        $('#bed_id').empty();
                        $('#bed_id').focus;
                        $('#bed_id').append('<option value="">-- Select bed --</option>'); 
                        $.each(data, function(key, value){
                        $('#bed_id').append('<option value="'+ value.id +'">' + value.name+ '</option>');
                    });
                }else{
                    $('#bed_id').empty();
                }
                }
                });
            }else{
                $('#bed_id').empty();
            }
        });
    });

    $(function(){
        $("#main_form").on("submit", function(e) {
            e.preventDefault();

            $.ajax({
                url:$(this).attr('action'),
                method:$(this).attr('method'),
                data:new FormData(this),
                processData:false,
                dataType:'json',
                contentType:false,
                beforeSend:function() {
                    $(document).find('span.error-text').text('');
                    $(document).find('#create-msg').text('');
                },
                success:function(data){
                    if (data.status == 0) {
                        $.each(data.error, function(prefix, val){
                            $('span.'+prefix+'_error').text(val[0]);
                        });
                    }else {
                        $('#main_form')[0].reset();
                        $('#create-msg').append("<div class='col-12 alert alert-success my-3'>" + data.msg + "</div>");
                    }
                }
            });
        });
    });

</script>
@endsection
</x-admin.admin-master>