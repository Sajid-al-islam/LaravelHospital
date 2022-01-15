<x-admin.admin-master>

@section('content')
<div class="row">
	@if(session('finance-delete-message'))
	<div class="col-12 mt-2">
		<div class="alert alert-danger">{{ session('finance-delete-message') }}</div>
	</div>
	@elseif(session('finance-update-message'))
	<div class="col-12 mt-2">
		<div class="alert alert-success">{{ session('finance-update-message') }}</div>
	</div>
	@elseif(session('finance-create-message'))
	<div class="col-12 mt-2">
		<div class="alert alert-success">{{ session('finance-create-message') }}</div>
	</div>
	@endif

	<div class="col-12 my-3">
		<a class="btn btn-primary" href="{{ route('finance.add') }}">
        	Create Bill
        </a>
	</div>

<div class="modal fade" id="modal-default" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Create Doctor</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">

			<form method="post" action="{{ route('finance.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="doctor-name">Name</label>
                        <input type="text" class="form-control" id="doctor-name" placeholder="Name" name="name" >
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Service Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter email" name="service_name">
                    @error('service_name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>
                    <div class="form-group col-md-3">
                        <label for="phone-no">Service Cost</label>
                        <input type="number" class="form-control" id="input1" onchange="calculateAmount(this.value)" placeholder="Contact No" name="service_cost">
                    @error('service_cost')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>
                    <div class="form-group col-md-3">
                        <label for="speciality">Total day</label>
                        <input type="text" class="form-control" id="input2" onchange="calculateAmount(this.value)" placeholder="Speciality" name="total_day">
                    @error('total_day')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>
                    <div class="form-group col-md-3">
                        <label for="speciality">Total bill</label>
                
                        <span class="form-control" name="tot_amount" id="tot_amount" readonly></span>
    
                    </div>
                   
                </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Create Bill</button>
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
				<h3 class="card-title"></h3>
				<div class="card-tools">
					<div class="input-group input-group-sm" style="width: 150px;">
						<input type="text" name="table_search" id="myInput" class="form-control float-right" placeholder="Search">
						<div class="input-group-append">
							<button type="submit" class="btn btn-default">
							<i class="fas fa-search"></i>
							</button>
						</div>
					</div>
				</div>
			</div>
			<!-- /.card-header -->
			<div class="card-body table-responsive p-0">
				<table class="table table-hover text-nowrap">
					<thead>
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th>Service Name</th>
							<th>Service Cost</th>
							<th>Total Day</th>
							<th>Total Bill</th>
							<th>Created At</th>
							<th>Updated At</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody id="myTable">

					@foreach($finances as $finance)
						<tr>
							<td>{{ $finance->id }}</td>
							<td>{{ $finance->name }}</a></td>
							<td>{{ $finance->service_name }}</td>
							<td>{{ $finance->service_cost }}</td>
							<td>{{ $finance->total_day }}</td>
							<td>{{ $finance->total_bill }}</td>
							<td>{{ $finance->created_at->diffForHumans() }}</td>
							<td>{{ $finance->updated_at }}</td>
							<td>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-{{$finance->id}}">Edit</button>

                                <div class="modal fade" id="modal-{{$finance->id}}" style="display: none;" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Edit Bill</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="post" action="{{ route('finance.update', $finance->id) }}" enctype="multipart/form-data">
               										@csrf
									                @method('PATCH')
									                <div class="card-body">
									                    <div class="form-group">
									                        <label for="finance-name">Name</label>
									                        <input type="text" class="form-control" id="finance-name" value="{{ $finance->name }}" name="name">
									                    </div>
									                    <div class="form-group">
									                        <label for="service">Service Name</label>
									                        <input type="text" class="form-control" id="exampleInputEmail1" value="{{ $finance->service_name }}" name="service_name">
									                    </div>
									                    <div class="form-group">
									                        <label for="cost">Service Cost</label>
									                        <input type="number" class="form-control" id="input1" value="{{ $finance->service_cost }}" onchange="calculateAmount(this.value)" placeholder="service cost" name="service_cost">
									                    </div>
									                    <div class="form-group">
									                        <label for="speciality">Total Day</label>
									                        <input type="text" class="form-control" id="input2" value="{{ $finance->total_day }}"  onchange="calculateAmount(this.value)" placeholder="total day" name="total_day">
									                    </div>
									                    
									                </div>
									                <!-- /.card-body -->
									                <div class="card-footer">
									                    <button type="submit" class="btn btn-primary">Update Bill</button>
									                </div>
									            </form>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </td>
							<td>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete-{{$finance->id}}">Delete</button>

                                <div class="modal fade" id="delete-{{$finance->id}}" style="display: none;" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Delete Bill</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
											  <p>Are You Want To Delete <b><i>{{ $finance->name }}</i></b>??</p>
                                            </div>
											<div class="modal-footer">
                                                <form action="{{ route('finance.delete', $finance->id)}}" method="post">
                                                    @csrf
													@method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Yes</button>													
												</form>
												
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
											</div>
                                        </div>

                                    </div>

                                </div>
                            </td>
						</tr>
					@endforeach
					</tbody>
				</table>
			</div>
			<!-- /.card-body -->
		</div>
		<!-- /.card -->
	</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
<script>
    function calculateAmount(value) {
        var price = document.getElementById('input1').value;
        price = parseInt(price);
        var day = document.getElementById('input2').value;
        day = parseInt(day);
        var tot_price = price * day;
        var divobj = document.getElementById('tot_amount').innerHTML = tot_price;
    }
</script>

@endsection

</x-admin.admin-master>