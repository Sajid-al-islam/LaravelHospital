<x-admin.admin-master>

@section('links')
<link rel="stylesheet" href="{{ asset('/') }}css/prescription.css">
@endsection

@section('content')
<div class="row mt-3">

    <div class="pres--container">
        <div class="pres--header">
            <div class="pres--header__div-1">
                <p><span style="font-weight: bold;">Date</span> : {{ $prescription->date }}</p>
            </div>
            <div class="pres--header__div-2">
                <a href="{{ route('prescription.download', $prescription->id) }}" class="button button4">Download Pdf</a>
                <button class="button button5" onclick="window.print()">Print Prescription</button>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="pres--content">
            <div class="doctor--info">
                <div class="doctor--info_1">
                    <span class="doc-name">{{ $prescription->doctor_name }}</span>
                    <span class="address">Surgeon</span>
                    <span>01876555555</span>
                </div>
                <div class="doctor--info_2">
                    <span class="address">Muradpur</span>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="content--head">
                <span class="name">Patient Name:</span> <span>{{ $prescription->name }}</span>
                <span class="age">Age:</span> <span>25 Yrs</span>
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
</div>
@endsection

</x-admin.admin-master>