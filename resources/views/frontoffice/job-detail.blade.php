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
                            <h2>{{ $vacancy->name }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero Area End -->

    <!-- job post company Start -->
    <div class="job-post-company pt-120 pb-120">
        <div class="container">

            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session()->get('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="row justify-content-between">
                <!-- Left Content -->
                <div class="col-xl-7 col-lg-8">
                    <!-- job single -->
                    <div class="single-job-items mb-50">
                        <div class="job-items">
                            <div class="company-img company-img-details">
                                <a href="/">
                                    <img src="{{ asset('images/logo.jpeg') }}" class="img-fluid" alt=""
                                    style="height: 100px">
                                </a>
                            </div>
                            <div class="job-tittle">
                                <a href="#">
                                    <h4>{{ $vacancy->name }}</h4>
                                </a>
                                <ul>
                                    {{-- <li></li> --}}
                                    <li>Rp. {{ number_format($vacancy->start_salary) }} - Rp. {{ number_format($vacancy->end_salary) }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- job single End -->

                    <div class="job-post-details">
                        {!! $vacancy->description !!}
                    </div>

                </div>
                <!-- Right Content -->
                <div class="col-xl-4 col-lg-4">
                    <div class="post-details3  mb-50">
                        <!-- Small Section Tittle -->
                        <div class="small-section-tittle">
                            <h4>Job Overview</h4>
                        </div>
                        <ul>
                            <li>Posted date : <span>{{ \Carbon\Carbon::parse($vacancy->created_at)->locale('id')->isoFormat('dddd, D MMMM YYYY') }}</span></li>
                            <li>Job nature : <span>Full time</span></li>
                            <li>Salary : <span>Rp. {{ number_format($vacancy->start_salary) }} - Rp. {{ number_format($vacancy->end_salary) }}</span></li>
                            <li>End date : <span>{{ \Carbon\Carbon::parse($vacancy->end_date)->locale('id')->isoFormat('dddd, D MMMM YYYY') }}</span></li>
                            <li>Skills : 
                                <div class="d-flex flex-wrap justify-content-center">
                                    @foreach ($vacancy->skills as $skill)
                                        <span class="badge badge-info px-4 py-2 m-2">{{ $skill->name }}</span>
                                    @endforeach
                                </div>
                            </li>
                        </ul>
                        <div class="apply-btn2">
                            @if (!Auth::check())
                                <button class="btn">
                                    Login for apply
                                </button>
                            @else
                                @if (auth()->user()->jobApplications->where('vacancy_id', $vacancy->id)->count() > 0)
                                    <button type="button" class="btn btn-default" disabled>
                                        @if (auth()->user()->jobApplications->where('vacancy_id', $vacancy->id)->first()->status == 'lulus kualifikasi')
                                            <span class="fa fa-check"></span> {{ auth()->user()->jobApplications->where('vacancy_id', $vacancy->id)->first()->status }}
                                        @else
                                            <span class="fa fa-spinner fa-spin"></span> {{ auth()->user()->jobApplications->where('vacancy_id', $vacancy->id)->first()->status }}
                                        @endif
                                    </button>
                                    {{-- <hr>
                                    <div>
                                        Surat Lamaran : 
                                        <a href="/job/{{ $->id }}/application-letter-preview" class="badge badge-info mx-2 my-1" target="_blank">
                                            <span class="fa fa-eye"></span> Lihat
                                        </a>
                                        <a href="/" class="badge badge-info mx-2 my-1" target="_blank">
                                            <span class="fa fa-edit"></span> Ganti
                                        </a>
                                    </div> --}}
                                @else
                                    <div type="button" class="btn" data-toggle="modal" data-target="#apply-job-{{ $vacancy->id }}">
                                        Apply Now
                                    </div>
                                @endif
                            @endif
                        </div>
                    </div>
                    <div class="post-details4  mb-50">
                        <!-- Small Section Tittle -->
                        <div class="small-section-tittle">
                            <h4>Company Information</h4>
                        </div>
                        <span>{{ $office->name }}</span>
                        <p>{{ $office->address }}</p>
                        <ul>
                            <li>Web : <span> https://pratamatechsolution.co.id/</span></li>
                            <li>Email: <span>{{ $office->email }}</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- job post company End -->

    @include('frontoffice.modal.job.apply-job')

@endsection