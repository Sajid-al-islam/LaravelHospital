<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        <script src="{{ asset('/css/bootstrap.min.js')}}"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <style media="all">
            #patient-name {
                color: red;
                font-size: 30px;
            }
            .card {
              box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
              max-width: 300px;
              margin: auto;
              text-align: center;
              font-family: arial;
            }

            .title {
              color: grey;
              font-size: 18px;
            }

            button {
              border: none;
              outline: 0;
              display: inline-block;
              padding: 8px;
              color: white;
              background-color: #000;
              text-align: center;
              cursor: pointer;
              width: 100%;
              font-size: 18px;
            }

            a {
              text-decoration: none;
              font-size: 22px;
              color: black;
            }

            button:hover, a:hover {
              opacity: 0.7;
            }
        </style>
    </head>
    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="container">
            <div class="row m-3">
                <div class="offset-md-1 col-md-10">
                    <div class="card card-primary">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="patient-name">Patient Name</label>
                                    <input type="text" class="form-control" id="patient-name" value="{{ $patient->name }}">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="age">Age</label>
                                    <input type="text" class="form-control" id="age" value="{{ $patient->age }}">
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Sex</label>
                                    <input type="text" class="form-control" id="sex" value="{{ $patient->sex }}">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="phone">Phone</label>
                                    <input type="text" class="form-control" id="phone" value="{{ $patient->phone }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="guardian_name">Guardian Name</label>
                                    <input type="text" class="form-control" id="guardian_name" value="{{ $patient->guardian_name }}">
                                
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="guardian_phone">Guardian Phone</label>
                                    <input type="text" class="form-control" id="guardian_phone" value="{{ $patient->guardian_phone }}">
                                
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="symptoms">Symptoms</label>
                                    <textarea class="form-control" rows="6" id="symptoms">{{ $patient->symptoms }}</textarea>
                                
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="condition">Condition</label>
                                    <textarea class="form-control" rows="6" id="condition">{{ $patient->condition }}</textarea>
                                
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="note">Note</label>
                                    <textarea class="form-control" rows="6" id="note">{{ $patient->note }}</textarea>
                                
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Blood Group</label>
                                    <input type="text" class="form-control" id="blood_group" value="{{ $patient->blood_group }}">
                                
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Department</label>
                                    <input type="text" class="form-control" id="department" value="{{ $patient->department->name }}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Doctor</label>
                                    <input type="text" class="form-control" id="doctor_id" value="{{ $patient->doctor->name }}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Floor</label>
                                    <input type="text" class="form-control" id="floor_id" value="{{ $patient->floor->name }}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Bed Category</label>
                                    <input type="text" class="form-control" id="bed_category_id" value="{{ $patient->bedCategory->name }}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Bed</label>
                                    <input type="text" class="form-control" id="bed_id" value="{{ $patient->bed->name }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      
    <h2 style="text-align:center">User Profile Card</h2>

<div class="card">
  <img src="/w3images/team2.jpg" alt="John" style="width:100%">
  <h1>John Doe</h1>
  <p class="title">CEO & Founder, Example</p>
  <p>Harvard University</p>
  <div style="margin: 24px 0;">
    <a href="#"><i class="fa fa-dribbble"></i></a> 
    <a href="#"><i class="fa fa-twitter"></i></a>  
    <a href="#"><i class="fa fa-linkedin"></i></a>  
    <a href="#"><i class="fa fa-facebook"></i></a> 
  </div>
  <p><button>Contact</button></p>
</div>

    </body>
</html>