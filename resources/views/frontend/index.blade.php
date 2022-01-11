<x-frontend.frontend-master>

@section('content')

	<x-frontend.frontend-slider></x-frontend.frontend-slider>

    @include('frontend.layouts.service')

    <x-frontend.frontend-docmed_area></x-frontend.frontend-docmed_area>

    @include('frontend.layouts.department')
    
    <!-- <x-frontend.frontend-testmonial></x-frontend.frontend-testmonial> -->
    <!-- <x-frontend.frontend-business_expert></x-frontend.frontend-business_expert> -->
    
    @include('frontend.layouts.doctor')

    <x-frontend.frontend-emergency_contact></x-frontend.frontend-emergency_contact>
    
    <form id="test-form" class="white-popup-block mfp-hide" method="post" action="{{ route('icu.ccu.store') }}">
        @csrf
        <div class="popup_box ">
            <div class="popup_inner">
                <h3>BOOK ICU BED</h3>
                
                <div class="row">
                    <div class="col-xl-12">
                        <select class="form-select wide" id="default-select" style="display: none;" name="bed_id">
                            <option>Select ICU BED</option>
                            @foreach($icu as $bed)
                            <option value="{{ $bed->id }}" @if($bed->limit == 0) disabled @endif>
                                {{ $bed->name }} @if($bed->limit > 0) (Available) @elseif($bed->limit == 0) (Not Availale) @endif
                            </option>
                            @endforeach
                        </select>
                    @error('bed_id')
                        <span style="color: red;">{{ $message }}</span>
                    @enderror
                    </div>
                    <div class="col-xl-6">
                        <input type="text" placeholder="Patient Name" name="patient_name">
                    @error('patient_name')
                        <span style="color: red;">{{ $message }}</span>
                    @enderror
                    </div>
                    <div class="col-xl-6">
                        <input type="text" placeholder="Phone no." name="phone">
                    @error('phone')
                        <span style="color: red;">{{ $message }}</span>
                    @enderror
                    </div>
                    <div class="col-xl-12">
                        <button type="submit" class="boxed-btn3">Request</button>
                    </div>
                </div>
                
            </div>
        </div>
    </form>

    <form id="test-form-two" class="white-popup-block mfp-hide" method="post" action="{{ route('ccu.store') }}">
        @csrf
        <div class="popup_box ">
            <div class="popup_inner">
                <h3>BOOK CCU BED</h3>
                
                <div class="row">
                    <div class="col-xl-12">
                        <select class="form-select wide" id="default-select" style="display: none;" name="bed_id">
                            <option>Select CCU BED</option>
                            @foreach($ccu as $bed)
                            <option value="{{ $bed->id }}" @if($bed->limit == 0) disabled @endif>
                                {{ $bed->name }} @if($bed->limit > 0) (Available) @elseif($bed->limit == 0) (Not Availale) @endif
                            </option>
                            @endforeach
                        </select>
                    @error('bed_id')
                        <span style="color: red;">{{ $message }}</span>
                    @enderror
                    </div>
                    <div class="col-xl-6">
                        <input type="text" placeholder="Patient Name" name="patient_name">
                    @error('patient_name')
                        <span style="color: red;">{{ $message }}</span>
                    @enderror
                    </div>
                    <div class="col-xl-6">
                        <input type="text" placeholder="Phone no." name="phone">
                    @error('phone')
                        <span style="color: red;">{{ $message }}</span>
                    @enderror
                    </div>
                    <div class="col-xl-12">
                        <button type="submit" class="boxed-btn3">Request</button>
                    </div>
                </div>
                
            </div>
        </div>
    </form>
@endsection
  
</x-frontend.frontend-master>