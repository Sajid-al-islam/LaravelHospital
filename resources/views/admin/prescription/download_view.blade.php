<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Prescription</title>
        <style>
            * { box-sizing: border-box; }
            .clearfix::after {
              content: "";
              clear: both;
              display: table;
            }

            .pres--container {
                width: 80vw;
                min-height: 100vh;
                margin: 0 auto;
            }

            .pres--header {
                background-color: rgb(5, 71, 120);
                color: rgb(230, 234, 237);
                font-size: 20px;
            }

            .pres--header__div-1 {
                float: left;
                margin-left: 16px;
            }

            .pres--header__div-2 {
                float: right;
                margin-right: 16px;
            }

            .button {
                background-color: #4CAF50; /* Green */
                border: none;
                color: white;
                padding: 16px 32px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                margin: 4px 2px;
                transition-duration: 0.4s;
                cursor: pointer;
            }

            .button4 {
                background-color: white;
                color: black;
                border: 2px solid #e7e7e7;
            }

            .button4:hover {background-color: #e7e7e7;}

            .button5 {
                background-color: white;
                color: black;
                border: 2px solid #555555;
            }

            .button5:hover {
                background-color: #555555;
                color: white;
            }

            .pres--content {
                padding: 10px 24px;
            }

            .doctor--info {
                min-height: 20vh;
                border: 2px solid rgb(222, 225, 227);
                padding: 10px;
            }
            .doctor--info_1 { float: left; }
            .doctor--info_2 { float: right; margin-right: 25px; }
            .doc-name { font-weight: bold; font-size: 18px; }
            .address { font-weight: bold; display: block; padding: 10px 0; }

            .content--head {
                border: 2px solid rgb(222, 225, 227);
                padding: 8px 7px;
            }
            .name, .age, .gender { font-weight: bold; font-size: 18px; }
            .age, .gender { margin-left: 15px; }

            .pres--content_1 {
                width: 30%;
                min-height: 85vh;
                float: left;
            }

            .pres--content_1--symptomps,
            .pres--content_1--test,
            .pres--content_1--advice {
                border: 2px solid rgb(222, 225, 227);
                min-height: 30vh;
                font-size: 18px;
            }

            .pres--content_2 {
                border: 2px solid rgb(222, 225, 227);
                width: 61.8%;
                min-height: 90vh;
                float: left;
                padding: 20px 25px;
            }

            .head {
                background-color: rgb(5, 71, 120);
                padding: 5px;
                font-size: 18px;
                font-weight: bold;
                text-align: center;
                color: rgb(230, 234, 237);
            }
        </style>
    </head>
    <body>
        
        <div class="pres--container">
            <div class="pres--header">
                <div class="pres--header__div-1">
                    <p><span style="font-weight: bold;">Date</span> : {{ $prescription->date }}</p>
                </div>
                
                <div class="clearfix"></div>
            </div>
            <div class="pres--content">
                <div class="doctor--info">
                    <div class="doctor--info_1">
                        <span class="doc-name">{{ $prescription->doctor_name }}</span>
                        <span class="address">Speciality</span>
                        <span>01876555555</span>
                    </div>
                    <div class="doctor--info_2">
                        <span class="address">Muradpur</span>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="content--head">
                    <span class="name">Patient Name:</span> <span>{{ $prescription->name }}</span>
                    <span class="age">Age:</span> <span>25Yrs</span>
                    <span class="gender">Gender: </span><span>{{ $prescription->gender }}</span>
                </div>
                <div class="pres--content_1">
                    <div class="pres--content_1--symptomps">
                        <div class="head">Symptoms</div>
                        <div style="padding: 5px;">{{ $prescription->symptoms }}</div>
                    </div>
                    <div class="pres--content_1--test">
                        <div class="head">Test</div>
                        <div style="padding: 5px;">{{ $prescription->test }}</div>
                    </div>
                    <div class="pres--content_1--advice">
                        <div class="head">Advice</div>
                        <div style="padding: 5px;">advice</div>
                    </div>
                </div>
                <div class="pres--content_2">
                    <p>{{ $prescription->description }}</p>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </body>
</html>