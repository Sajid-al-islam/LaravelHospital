<div class="our_department_area">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="section_title text-center mb-55">
                    <h3>Our Departments</h3>
                    <p>
                        Esteem spirit temper too say adieus who direct esteem. <br />
                        It esteems luckily or picture placing drawing.
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
        @foreach($departments as $department)
            <div class="col-xl-4 col-md-6 col-lg-4">
                <div class="single_department">
                    <div class="department_thumb">
                        <img src="{{ $department->photo }}" alt=""/>
                    </div>
                    <div class="department_content">
                        <h3><a href="#">{{ $department->name }}</a></h3>
                        <p>{{ $department->description }}</p>
                        <a href="#" class="learn_more">Learn More</a>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>
</div>