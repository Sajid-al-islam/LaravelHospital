<x-admin.admin-master>

@section('content')

<div class="row">
    @if(session('bed-stored'))
        <div class="alert alert-success col-12 mt-2">
            {{ session('bed-stored') }}
        </div>
    @elseif(session('bed-updated'))
        <div class="alert alert-warning col-12 mt-2">
            {{ session('bed-updated') }}
        </div>
    @elseif(session('bed-delete'))
        <div class="alert alert-danger col-12 mt-2">
            {{ session('bed-delete') }}
        </div>
    @endif
</div>

<button type="button" class="btn btn-primary my-3" data-toggle="modal" data-target="#modal-lg">
    Create Bed
</button>

<div class="modal fade" id="modal-lg" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Create Bed</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('admin.bed.store') }}">

                @csrf
                <div class="card-body row">
                    <div class="form-group col-md-4">
                        <label>Floor name</label>
                        <select class="form-control" name="floor_id" id="floor">
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
                        <label>Bed Category</label>
                        <select class="form-control" name="bed_category_id" id="bed_category_id">
                            <option>Select Floor First</option>
                        </select>
                    @error('bed_category_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Bed Name" name="name">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label for="limit">Bed Limit</label>
                        <input type="number" class="form-control" id="limit" name="limit">
                    @error('limit')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label for="cost">Cost</label>
                        <input type="number" class="form-control" id="cost" name="cost">
                    @error('cost')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label>Status</label>
                        <select class="form-control" name="status">
                            <option value="1">Active</option>
                            <option value="0">Deactive</option>
                        </select>
                    @error('status')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>
                    
                    <div class="form-group col-md-6">
                        <label for=""></label>
                        <button type="submit" class="form-control btn btn-primary mt-2">Create Bed</button>
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
                <h3 class="card-title">Bed List</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Floor Name</th>
                            <th>Bed Category</th>
                            <th>Name</th>
                            <th>Bed Limit</th>
                            <th>Bed Cost</th>
                            <th>Status</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if(sizeof($beds) != 0)
                    @foreach( $beds as $bed )
                        <tr>
                            <td>{{ $bed->id }}</td>
                            <td>{{ $bed->floor->name }}</td>
                            <td>{{ $bed->bedCategory->name }}</td>
                            <td><a data-toggle="modal" data-target="#modal-{{$bed->id}}" href="">{{ $bed->name }}</a></td>
                            <td><a data-toggle="modal" data-target="#modal-{{$bed->id}}" href="">{{ $bed->limit }}</a></td>
                            <td>{{ $bed->cost }} tk</td>
                            <td>{{ $bed->status }}</td>
                            <td>{{ $bed->created_at->diffForHumans() }}</td>
                            <td>{{ $bed->updated_at->diffForHumans() }}</td>
                            <td>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-{{$bed->id}}">Edit</button>

                                <div class="modal fade" id="modal-{{$bed->id}}" style="display: none;" aria-hidden="true">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Edit Bed</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="post" action="{{ route('admin.bed.update', $bed->id) }}">

                                                @csrf
                                                @method('PUT')
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label for="cost">Bed Cost</label>
                                                        <input type="number" class="form-control" id="cost" name="bed_cost" value="{{$bed->cost}}">
                                                    @error('cost')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="limit">Bed Limit</label>
                                                        <input type="number" class="form-control" id="limit" name="bed_limit" value="{{$bed->limit}}">
                                                    @error('limit')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Status</label>
                                                        <select class="form-control" name="bed_status">
                                                            <option value="1" @if($bed->status == 1) selected @endif>Active</option>
                                                            <option value="0" @if($bed->status == 0) selected @endif>Deactive</option>
                                                        </select>
                                                    @error('status')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label for=""></label>
                                                        <button type="submit" class="form-control btn btn-primary mt-2">Update Bed</button>
                                                    </div>
                                                </div>
                                                
                                            </form>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </td>
                            <td>
                                <form action="{{ route('admin.bed.delete', $bed->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" cursor="pointer" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    @else
                        <tr>
                            <td colspan="11" class="text-center">No Data to show</td>
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

<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
<script>
    'use strict';
    $(document).ready(function() {
        $('#floor').on('change', function() {
            let floor_id = $(this).val();
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


</script>
@endsection

</x-admin.admin-master>