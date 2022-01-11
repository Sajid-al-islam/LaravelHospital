<x-admin.admin-master>

@section('content')

<div class="row">
    <div class="col-12 my-2">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
            Create Schedule
        </button>
    </div>

    <div class="modal fade" id="modal-default" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Create Attendance Schedule</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('attendance.schedule.store') }}" class="needs-validation" novalidate>

                    @csrf
                    <div class="card-body row">
                        <div class="form-group col-md-6">
                            <label for="name">Start time</label>
                            <input type="time" class="form-control" id="name" name="start_time" required>
                            <div class="invalid-feedback">
                                Start time is required
                            </div>
                        @error('start_time')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="name">End time</label>
                            <input type="time" class="form-control" id="name" placeholder="Floor Name" name="end_time" required>
                            <div class="invalid-feedback">
                                End time is required
                            </div>
                        @error('end_time')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label>Role</label>
                            <select class="form-control" name="role_id" id="role_id" required>
                                <option disabled selected>Select Role</option>
                                @foreach($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                Role is required
                            </div>
                        @error('role_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label>User</label>
                            <select class="form-control" name="user_id" id="user_id" required>
                                <option>Select Role First</option>
                            </select>
                            <div class="invalid-feedback">
                                User role is required
                            </div>
                        @error('user_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for=""></label>
                            <button type="submit" class="form-control btn btn-primary mt-2">Create Schedule</button>
                        </div>
                    </div>
                    
                </form>
                </div>
            </div>

        </div>

    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Attendance Schedule List</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                    
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>


@endsection

@section('script')
<script>
    'use strict';
    $(document).ready(function() {
        $('#role_id').on('change', function() {
            let role_id = $(this).val();
            let ur = '{{ route("get.bed",["floor" =>  ":floor_id"]) }}';
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

    (function() {
        'use strict';
        window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
        event.preventDefault();
        event.stopPropagation();
        }
        form.classList.add('was-validated');
        }, false);
        });
        }, false);
    })();
</script>
@endsection

</x-admin.admin-master>