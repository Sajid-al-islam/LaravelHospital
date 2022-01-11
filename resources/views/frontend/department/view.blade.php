<x-frontend.frontend-master>

@section('content')
    <div class="bradcam_area breadcam_bg bradcam_overlay">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text">
                        <h3>Departments</h3>
                        <p><a href="{{ route('home.index') }}">Home /</a> Departments</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="our_department_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_title text-center mb-55">
                        <h3>Our Departments</h3>
                        <p>Esteem spirit temper too say adieus who direct esteem. <br>
                        It esteems luckily or picture placing drawing. </p>
                    </div>
                </div>
            </div>
            <div class="row">
            @foreach($departments as $department)
                <div class="col-xl-4 col-md-6 col-lg-4">
                    <div class="single_department">
                        <div class="department_thumb">
                            <img src="{{ $department->photo }}" alt="">
                        </div>
                        <div class="department_content">
                            <h3><a href="#">{{ $department->name }}</a></h3>
                            <p>{{ $department->description }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </div>
@endsection

</x-frontend.frontend-master>