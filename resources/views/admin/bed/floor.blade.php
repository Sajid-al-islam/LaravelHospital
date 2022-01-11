<x-admin.admin-master>

@section('content')

<div class="row">
    @if(session('floor-created'))
        <div class="alert alert-success col-12 mt-2">
            {{ session('floor-created') }}
        </div>
    @elseif(session('floor-updated'))
        <div class="alert alert-warning col-12 mt-2">
            {{ session('floor-updated') }}
        </div>
    @elseif(session('floor-delete'))
        <div class="alert alert-danger col-12 mt-2">
            {{ session('floor-delete') }}
        </div>
    @endif
</div>

<div class="my-3">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
        Create Floor
    </button>
</div>

<div class="modal fade" id="modal-default" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Create Floor</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('admin.floor.store') }}" class="needs-validation" novalidate>

                @csrf
                <div class="card-body row">
                    <div class="form-group col-md-6">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Floor Name" name="name" required>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label>Status</label>
                        <select class="form-control" name="status" required>
                            <option value="1">Active</option>
                            <option value="0">Deactive</option>
                        </select>
                    @error('status')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>
                    <div class="form-group col-md-12">
                        <label for="desc">Description</label>
                        <textarea type="text" class="form-control" id="desc" placeholder="Description...." name="description" cols="5" rows="5" required></textarea>
                    @error('description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>
                    
                    <div class="form-group col-md-6">
                        <label for=""></label>
                        <button type="submit" class="form-control btn btn-primary mt-2">Create Floor</button>
                    </div>
                </div>
                
            </form>
            </div>
        </div>

    </div>

</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Floors</h3>
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
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if(sizeof($floors) != 0)
                    @foreach( $floors as $floor )
                        <tr>
                            <td>{{ $floor->id }}</td>
                            <td><a data-toggle="modal" data-target="#modal-{{$floor->id}}" href="">{{ $floor->name }}</a></td>
                            <td>{{ Str::words($floor->description, 5) }}</td>
                            <td>{{ $floor->status }}</td>
                            <td>{{ $floor->created_at->diffForHumans() }}</td>
                            <td>{{ $floor->updated_at->diffForHumans() }}</td>
                            <td>
                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-{{$floor->id}}">Edit</button>

                                <div class="modal fade" id="modal-{{$floor->id}}" style="display: none;" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Edit Floor</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="post" action="{{ route('admin.floor.edit', $floor->id) }}"  class="needs-validation" novalidate>

                                                @csrf
                                                @method('PUT')
                                                <div class="card-body row">
                                                    <div class="form-group col-md-6">
                                                        <label for="name">Name</label>
                                                        <input type="text" class="form-control" id="name" value="{{ $floor->name }}" name="floor_name" required>
                                                    @error('name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Status</label>
                                                        <select class="form-control" name="floor_status" required>
                                                            <option value="1" @if($floor->status==1) selected @endif>Active</option>
                                                            <option value="0" @if($floor->status==0) selected @endif>Deactive</option>
                                                        </select>
                                                    @error('status')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label for="desc">Description</label>
                                                        <textarea type="text" class="form-control" id="desc" name="floor_description" cols="5" rows="5" required>{{$floor->description}}</textarea>
                                                    @error('description')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                    </div>
                                                    
                                                    <div class="form-group col-md-6">
                                                        <label for=""></label>
                                                        <button type="submit" class="form-control btn btn-primary mt-2">Update Floor</button>
                                                    </div>
                                                </div>
                                                
                                            </form>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </td>
                            <td>
                                <form action="{{ route('admin.floor.delete', $floor->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" cursor="pointer" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    @else
                        <tr>
                            <td colspan="9" class="text-center">No Data to show</td>
                        </tr>
                    @endif
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