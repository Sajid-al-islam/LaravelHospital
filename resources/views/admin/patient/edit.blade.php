<x-admin.admin-master>

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit Patient</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="post" action="{{ route('patient.update', $patient->id) }}">

                @csrf
                @method('PATCH')
                <div class="card-body">
                    <div class="form-group">
                        <label for="patient-name">Name</label>
                        <input type="text" class="form-control" id="patient-name" value="{{ $patient->name }}" name="name">
                    </div>
                    <div class="form-group">
                        <label for="phone-no">Phone</label>
                        <input type="number" class="form-control" id="phone-no" value="{{ $patient->phone }}" name="phone">
                    </div>
                    <div class="form-group">
                        <label>Blood Group</label>
                        <select class="form-control" name="blood_group">
                            <option value="A+" @if($patient->blood_group == 'A+') selected @endif>A+</option>
                            <option value="B+" @if($patient->blood_group == 'B+') selected @endif>B+</option>
                            <option value="A-" @if($patient->blood_group == 'A-') selected @endif>A-</option>
                            <option value="AB+" @if($patient->blood_group == 'AB+') selected @endif>AB+</option>
                            <option value="AB-" @if($patient->blood_group == 'AB-') selected @endif>AB-</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="age">Age</label>
                        <input type="number" class="form-control" id="age" name="age" value="{{ $patient->age }}">
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

</x-admin.admin-master>