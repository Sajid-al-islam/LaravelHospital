<!DOCTYPE html>
<html>
    <head>
        <title>Search</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <style>
            *{
                box-sizing: border-box !important;
            }
            .panel-body {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <br />
        <div class="container box">
            <h3 align="center">Search for doctor</h3><br />
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="form-group">
                        <input type="text" name="search" id="search" class="form-control" placeholder="Search doctor here" />
                    </div>
                    <div class="row">
                        
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    
$(document).ready(function(){

 // fetch_customer_data();

 function fetch_doctor_data(query = '')
 {
  $.ajax({
   url:"{{ route('search.doctor') }}",
   method:'GET',
   data:{query:query},
   dataType:'json',
   success:function(data)
   {
    $('.row').html(data.table_data);
    // $('#total_records').text(data.total_data);
   }
  })
 }

 $(document).on('keyup', '#search', function(){
  var query = $(this).val();
  fetch_doctor_data(query);
 });
});
</script>