<x-admin.admin-master>

@section('content')

{{-- <div class="row">
    <div class="offset-md-1 col-md-10">
        <div class="card card-primary my-5">
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
                        <input type="text" class="form-control" id="name" placeholder="Name" name="service_name">
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
                        <input type="hidden" name="total_bill" id="total_bills">
                        <span class="form-control" name="total_bill" id="total_bill" readonly></span>
    
                    </div>
                   
                </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Create Bill</button>
                </div>

                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <form action="" method="post">
                            <div class="input_fields_wrap">

                            <button type="button" class="add_field_button">Add More Fields</button>
                            <input type="text" class="form-control mb-3" name="mytext[]" placeholder="Enter Price">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                    <div class="col-md-4"></div>
                </div>

            </form>
        </div>
    </div>
</div> --}}



    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="p-l-30 p-r-30">
            <div class="header-icon"><i class="pe-7s-world"></i></div>
            <div class="header-title">
                <h1>Billing</h1>
            </div>
        </div>
    </section>
    <!-- Main content -->
    <div class="content">
        <div id="demoModeEnable"></div>
        @csrf
        <!-- alert message -->

        <!-- content -->
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <div class="panel panel-bd billing-panel">
                    <div class="panel-heading no-print row">
                        {{-- <div class="btn-group col-md-4 col-xs-12">
                            <a class="btn btn-primary" href="https://hospitalnew.bdtask.com/demo7/billing/bill"> <i class="fa fa-list"></i> Bill List </a>
                        </div> --}}
                        <h2 class="col-md-8 col-xs-12 text-left text-primary">Add Bill</h2>
                    </div>

                    <div class="panel-body">
                        <form action="{{ route('finance.store') }}" class="billig-form" method="post" accept-charset="utf-8">
                            @csrf
                            <div class="row">
                                <div class="col-sm-9">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-6">

                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="patient_id" placeholder="Patient ID"  />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <input name="bill_date" type="text" class="form-control datepicker hasDatepicker"  id="bill_date" placeholder="Bill Date" />
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="patient_name" placeholder="Patient  Name" />
                                                <input type="hidden" name="patient_id" />
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="date_of_birth" placeholder="AGE" />
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-6">
                                            <div class="form-group row">
                                                <label for="sex" class="col-sm-4 col-md-2 col-form-label">Sex</label>
                                                <div id="sex" class="col-sm-8 col-md-10">
                                                    <div class="radio radio-info radio-inline">
                                                        <input type="radio" id="male" />
                                                        <label for="male">Male</label>
                                                    </div>
                                                    <div class="radio radio-inline">
                                                        <input type="radio" id="female" />
                                                        <label for="female">Female</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <div class="col-xs-12 col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="doctor_name" placeholder="Doctor Name"   />
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="avatar-img center-block">
                                        <img id="picture" src="https://hospitalnew.bdtask.com/demo7/assets/images/staff.png" class="img-responsive img-hw-200" alt="" />
                                    </div>
                                </div>
                            </div>

                            <!--<hr>-->
                            <div class="form-horizontal">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group row">
                                            <label for="admission_date" class="col-sm-4 col-form-label">Admission Date</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text" placeholder="Admission Date" id="admission_date"  />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group row">
                                            <label for="total_days" class="col-sm-4 col-form-label">
                                                Total Days<br />
                                                &nbsp;
                                            </label>
                                            <div class="col-sm-8">
                                                <input class="form-control" name="total_day" type="text" placeholder="Total Days" id="total_days" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="form-group row">
                                            <label for="discharge_date" class="col-sm-4 col-form-label">Discharge Date</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="date" value="" placeholder="Discharge Date" id="discharge_date" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="parentx" class="table-responsive" style="overflow: auto;">
                                <table id="fixTable" class="table table-bordered table-striped">      
                                <thead>
                                    <tr>
                                        <th style="background-color: rgb(235, 237, 242); position: relative; top: 0px;">Service Name</th>
                                        <th style="background-color: rgb(235, 237, 242); position: relative; top: 0px;">Quantity</th>
                                        <th style="background-color: rgb(235, 237, 242); position: relative; top: 0px;">Rate</th>
                                        <th style="background-color: rgb(235, 237, 242); position: relative; top: 0px;">Sub Total</th>
                                        <th width="100" style="background-color: rgb(235, 237, 242); position: relative; top: 0px;"><i class="fa fa-cogs"></i></th>
                                    </tr>
                                </thead>
                                </table>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="input_fields_wrap">
                                                <div class="input-group mb-3">
                                                    <label class="sr-only" for="inlineFormInputName2">Service Name</label>
                                                    <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" name="service_name[]" placeholder="Enter Service Name">
                                                    
                                                    <label class="sr-only" for="inlineFormInputName2">Quantity</label>
                                                    <input type="text" class="form-control mb-2 mr-sm-2" name="service_quantity[]" id="input1" onchange="calculateAmount(this.value)" placeholder="Enter Quantity">

                                                    <label class="sr-only" for="inlineFormInputName2">Cost</label>
                                                    <input type="text" class="form-control mb-2 mr-sm-2" name="service_cost[]" id="input2" onchange="calculateAmount(this.value)" placeholder="Enter cost">

                                                    <label class="sr-only" for="inlineFormInputName2">Total Bill</label>
                                                    <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" id="total_bill" name="service_cost[]" placeholder="Total">
                                                    {{-- <input placeholder="Total Price" type="text" name="total_bill[]" class="form-control"> --}}
                                                    
                                                    <div class="input-group-append">
                                                        <button type="button" class="add_field_button btn btn-sm btn-success mb-2">Add</button>
                                                    </div>
                                                </div>
                                            {{-- <button type="button" class="">Add More Fields</button>
                                            <input type="text" class="form-control mb-3" name="mytext[]" placeholder="Enter Price"> --}}
                                        </div>
                                    </div>
                                </div>
                            </div> 

                            <div class="col-sm-4">
                                <div class="table-responsive m-b-20">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Total</th>
                                                <th>Receipt</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Total</td>
                                                <td><input name="total_bill" type="text" class="form-control grand-calc" id="total_bill" value=""></td>
                                            </tr>
                                    </table>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <textarea name="note" class="form-control" rows="5" placeholder="Notes"></textarea>
                            </div>

                            <div class="form-group">
                                <div class="form-check">
                                    <label class="radio-inline"><input type="radio" name="payment_status" value="0" checked="" />Unpaid</label>
                                    <label class="radio-inline"><input type="radio" name="payment_status" value="1" />Paid</label>
                                </div>
                            </div>

                            <div class="panel-footer text-center">
                                <button type="submit" class="btn btn-primary w-md">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
</div>


<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

<script>

    $(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper   		= $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID

    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
    e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            // $(wrapper).append('<div class="input-group mb-3"><input placeholder="Enter Price" type="text" name="mytext[]" class="form-control"><div class="input-group-append"><button class="btn btn-outline-danger remove_field" type="button">Remove</button></div></div>'); //add input box
            $(wrapper).append('<div class="input-group mb-3"><label class="sr-only" for="inlineFormInputName2">Service Name</label><input type="text" class="form-control mb-2 mr-sm-2" name="service_name[]" id="inlineFormInputName2" placeholder="Enter Service Name"><label class="sr-only" for="inlineFormInputName2">Quantity</label><input type="text" class="form-control mb-2 mr-sm-2" name="service_quantity[]" id="inlineFormInputName2" placeholder="Enter Quantity"><label class="sr-only" for="inlineFormInputName2">service cost</label><input type="text" class="form-control mb-2 mr-sm-2" name="service_cost[]" id="inlineFormInputName2" placeholder="Enter Quantity"><input placeholder="Enter Price" type="text" name="total_bill[]" class="form-control"><div class="input-group-append"><button class="btn btn-sm btn-danger remove_field" type="button">Remove</button></div></div>'); //add input box
        }
    });

    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').parent('div').remove(); x--;
        })
    });
    function calculateAmount(value) {
        var price = document.getElementById('input1').value;
        price = parseInt(price);
        var day = document.getElementById('input2').value;
        day = parseInt(day);
        var tot_price = price * day;
        var divobj = document.getElementById('total_bill').innerHTML = tot_price;
        var divobj = document.getElementById('total_bills').value = tot_price;
    }
</script>
@endsection

{{-- <div class="input-group mb-3"><label class="sr-only" for="inlineFormInputName2">Service Name</label><input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Enter Service Name"><label class="sr-only" for="inlineFormInputName2">Quantity</label><input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Enter Quantity"><input placeholder="Enter Price" type="text" name="mytext[]" class="form-control"><div class="input-group-append"><button class="btn btn-sm btn-danger remove_field" type="button">Remove</button></div></div> --}}
{{-- <div class="input-group mb-3"><label class="sr-only" for="inlineFormInputName2">Service Name</label><input type="text" class="form-control mb-2 mr-sm-2" name="service_name[]" id="inlineFormInputName2" placeholder="Enter Service Name"><label class="sr-only" for="inlineFormInputName2">Quantity</label><input type="text" class="form-control mb-2 mr-sm-2" name="service_quantity[]" id="inlineFormInputName2" placeholder="Enter Quantity"><label class="sr-only" for="inlineFormInputName2">service cost</label><input type="text" class="form-control mb-2 mr-sm-2" name="service_cost[]" id="inlineFormInputName2" placeholder="Enter Quantity"><input placeholder="Enter Price" type="text" name="total_bill[]" class="form-control"><div class="input-group-append"><button class="btn btn-sm btn-danger remove_field" type="button">Remove</button></div></div> --}}
</x-admin.admin-master>


