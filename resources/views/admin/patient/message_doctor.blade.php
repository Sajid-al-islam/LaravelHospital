<x-admin.admin-master>

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Add Patient</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="post" action="">

                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="doctor-name">Department</label>
                        <input type="text" class="form-control" id="doctor-name" name="department_id">
                    @error('department_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label for="doctor_id">Doctor</label>
                        <input type="number" class="form-control" id="doctor_id" placeholder="Contact No" name="phone">
                    @error('phone')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="message"></label>
                        <input type="text" class="form-control" id="message" name="message">
                    @error('age')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Create Patient</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

</x-admin.admin-master>