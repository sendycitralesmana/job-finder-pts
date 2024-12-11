@extends('frontoffice.layout.main')

@section('content')
        <!-- slider Area Start-->
        @include('frontoffice.slider')
        <!-- slider Area End-->
        <!-- Our Services Start -->
        {{-- @include('frontoffice.our-services') --}}
        <!-- Our Services End -->
        <div class="mb-50"></div>
        <!-- Online CV Area Start -->
        @include('frontoffice.online-cv')
        <!-- Online CV Area End-->
        <!-- Featured_job_start -->
        @include('frontoffice.featured-job')
        <!-- Featured_job_end -->
        <!-- How  Apply Process Start-->
        @include('frontoffice.how-apply')
        <!-- How  Apply Process End-->
        <!-- Testimonial Start -->
        {{-- @include('frontoffice.testimonial') --}}
        <!-- Testimonial End -->
        <!-- Support Company Start-->
        @include('frontoffice.support-company')
        <div class="mb-50"></div>
        <!-- Support Company End-->
        <!-- Blog Area Start -->
        {{-- @include('frontoffice.blog') --}}
        <!-- Blog Area End -->

@endsection