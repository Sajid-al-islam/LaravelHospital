<x-admin.admin-master>

@section('links')
<style>
    .clearfix::after {
        content: "";
        clear: both;
        display: table;
    }
</style>
@endsection

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Generate Prescription</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a class="btn btn-primary" href="{{ route('view.prescription.list') }}">See Prescription List</a></li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<div class="row">
    <div class="offset-md-1 col-md-10 mt-3">
        <div class="card card-primary">

            <form method="post" action="{{ route('prescription.store') }}">

                @csrf
                <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-3">
                        <label for="date">Date</label>
                        <input type="date" class="form-control" id="date" name="date">
                    @error('date')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="patient-name">Patient Name</label>
                        <input type="text" class="form-control" id="patient-name" placeholder="Name" name="name">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>
                    <div class="form-group col-md-3">
                        <label>Sex</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" value="male" id="male">
                            <label class="form-check-label" for="male">MALE</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" value="female" id="female">
                            <label class="form-check-label" for="female">FEMALE</label>
                        </div>
                    @error('gender')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>
                    <div class="form-group col-12">
                        <label for="description">Prescribe Here</label>
                        <textarea class="form-control" rows="6" placeholder="Prescribe Here ..." id="description" name="description"></textarea>
                    @error('description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="test">Test</label>
                        <textarea class="form-control" rows="6" placeholder="Test Field ..." id="test" name="test"></textarea>
                    @error('test')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="symptoms">Symptoms</label>
                        <textarea class="form-control" rows="6" placeholder="Symptoms ..." id="symptoms" name="symptoms"></textarea>
                    @error('symptoms')
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
                    <div class="form-group col-md-3">
                        <label for="age">Age</label>
                        <input type="number" class="form-control" id="age" name="age">
                    @error('age')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>
                    <div class="form-group col-md-5">
                        <label for="doctor-name">Doctor name</label>
                        <input type="text" class="form-control" id="doctor-name" value="{{ auth()->user()->name }}" name="doctor_name">
                    @error('doctor_name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>
                </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Generate prescription</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="clearfix"></div>
@endsection

</x-admin.admin-master>