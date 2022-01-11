<x-frontend.frontend-master>

@section('content')
    <div class="bradcam_area breadcam_bg_2 bradcam_overlay">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text">
                        <h3>Doctors</h3>
                        <p><a href="{{ route('home.index') }}">Home /</a> Doctors</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="expert_doctors_area doctor_page">
        <div class="container">
            <div class="row">
            @foreach($doctors as $doctor)
                <div class="col-md-6 col-lg-3">
                    <div class="single_expert mb-40">
                        <div class="expert_thumb">
                            <img src="{{ $doctor->photo }}" alt="">
                        </div>
                        <div class="experts_name text-center">
                            <h3>{{ $doctor->name }}</h3>
                            <span>{{ $doctor->speciality }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </div>
@endsection

</x-frontend.frontend-master>