<x-admin.admin-master>

@section('content')

<div class="row">
    @if(session('bed-category-created'))
        <div class="alert alert-success col-12 mt-2">
            {{ session('bed-category-created') }}
        </div>
    @elseif(session('bed-category-updated'))
        <div class="alert alert-warning col-12 mt-2">
            {{ session('bed-category-updated') }}
        </div>
    @elseif(session('bed-category-deleted'))
        <div class="alert alert-danger col-12 mt-2">
            {{ session('bed-category-deleted') }}
        </div>
    @endif
</div>

<button type="button" class="btn btn-primary my-3" data-toggle="modal" data-target="#modal-lg">
    Create Bed Category
</button>

<div class="modal fade" id="modal-lg" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Create Bed Category</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('admin.bed.category.store') }}" class="needs-validation" novalidate>

                @csrf
                <div class="card-body row">
                    <div class="form-group col-md-4">
                        <label>Floor name</label>
                        <select class="form-control" name="floor_id">
                            <option>Select floor name</option>
                            @foreach($floors as $floor)
                            <option value="{{ $floor->id }}">{{ $floor->name }}</option>
                            @endforeach
                        </select>
                    @error('floor_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Category Name" name="name" required>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>
                    <div class="form-group col-md-4">
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
                        <label for="desc">Details</label>
                        <textarea type="text" class="form-control" id="desc" placeholder="Details...." name="details" cols="3" rows="3" required></textarea>
                    @error('details')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>
                    
                    
                    <button type="submit" class="form-control btn btn-primary mt-2">Create Bed Category</button>
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
                <h3 class="card-title">Bed Category</h3>
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
                    @if(sizeof($categories) != 0)
                    @foreach( $categories as $category )
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td><a data-toggle="modal" data-target="#modal-{{$category->id}}" href="">{{ $category->name }}</a></td>
                            <td>{{ Str::words($category->details, 5) }}</td>
                            <td>{{ $category->status }}</td>
                            <td>{{ $category->created_at->diffForHumans() }}</td>
                            <td>{{ $category->updated_at->diffForHumans() }}</td>
                            <td>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-{{$category->id}}">Edit</button>

                                <div class="modal fade" id="modal-{{$category->id}}" style="display: none;" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Edit Bed Category</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="post" action="{{ route('admin.bed.category.edit', $category->id) }}"  class="needs-validation" novalidate>

                                                @csrf
                                                @method('PUT')
                                                <div class="card-body row">
                                                    <div class="form-group col-md-4">
                                                        <label>Floor name</label>
                                                        <select class="form-control" name="floor_id" required>
                                                            @foreach($floors as $floor)
                                                            <option value="{{ $floor->id }}" @if($floor->id == $category->floor_id) selected @endif>{{ $floor->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    @error('floor_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="name">Name</label>
                                                        <input type="text" class="form-control" id="name" value="{{ $category->name }}" name="category_name" required>
                                                    @error('name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label>Status</label>
                                                        <select class="form-control" name="category_status" required>
                                                            <option value="1" @if($category->status==1) selected @endif>Active</option>
                                                            <option value="0" @if($category->status==0) selected @endif>Deactive</option>
                                                        </select>
                                                    @error('status')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label for="desc">Description</label>
                                                        <textarea type="text" class="form-control" id="desc" name="category_description" cols="5" rows="5" required>{{$category->details}}</textarea>
                                                    @error('details')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                    </div>
                                                    
                                                    <div class="form-group col-md-6">
                                                        <label for=""></label>
                                                        <button type="submit" class="form-control btn btn-primary mt-2">Update Bed Category</button>
                                                    </div>
                                                </div>
                                                
                                            </form>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </td>
                            <td>
                                <form action="{{ route('admin.bed.category.delete', $category->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" cursor="pointer" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    @else
                        <tr>
                            <td colspan="8" class="text-center">No Data to show</td>
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