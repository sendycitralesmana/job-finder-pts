@extends('frontoffice.layout.main')

@section('content')

<!-- Hero Area Start-->
<div class="slider-area ">
    <div class="single-slider section-overly slider-height2 d-flex align-items-center"
        data-background="{{ asset('assets/jobfinder-master/assets/img/hero/about.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center">
                        <h2>About us</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Hero Area End -->
<div style="margin-top: 150px">

</div>
<!-- Support Company Start-->
@include('frontoffice.support-company')
<!-- Support Company End-->
<!-- How  Apply Process Start-->
@include('frontoffice.how-apply')
<!-- How  Apply Process End-->
<!-- Online CV Area Start -->
@include('frontoffice.online-cv')
<!-- Online CV Area End-->
<div style="margin-top: 150px">

</div>

@endsection