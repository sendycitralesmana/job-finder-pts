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
                        <h2>History Apply Jobs</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Hero Area End -->
{{--  --}}
<div class="job-listing-area pt-120 pb-120">
    <div class="container">
        <div class="row">
            <!-- Left content -->
            <div class="col-xl-3 col-lg-3 col-md-4">
                <div class="row">
                    <div class="col-12">
                        <div class="small-section-tittle2 mb-45">
                            <div class="ion"> <svg xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="20px" height="12px">
                                    <path fill-rule="evenodd" fill="rgb(27, 207, 107)"
                                        d="M7.778,12.000 L12.222,12.000 L12.222,10.000 L7.778,10.000 L7.778,12.000 ZM-0.000,-0.000 L-0.000,2.000 L20.000,2.000 L20.000,-0.000 L-0.000,-0.000 ZM3.333,7.000 L16.667,7.000 L16.667,5.000 L3.333,5.000 L3.333,7.000 Z" />
                                </svg>
                            </div>
                            <div class="d-flex justify-content-between">
                                <h4>Filter Jobs</h4>
                                @if ($name || $type)
                                <a href="/history" class="">
                                    <p class="badge badge-info px-4 py-2">
                                        <span class="fa fa-times"></span> Delete Filter
                                    </p>
                                </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Job Category Listing start -->
                <div class="job-category-listing mb-50">
                    <form action="">
                        <!-- single one -->
                        <div class="single-listing">
                            <div class="small-section-tittle2">
                                <h4>Job Search</h4>
                            </div>
                            <div class="select-job-items">
                                <input type="text" name="name" class="form-control" placeholder="Job Search" value="{{ $name }}">
                            </div>
                            <!--  Select job items End-->
                            <!-- select-Categories start -->
                            <div class="pt-80 pb-50">
                                <div class="small-section-tittle2">
                                    <h4>Job Type</h4>
                                </div>
                                <div class="d-flex container">
                                    <input type="radio" name="type" class="form-check-input" id="full time" value="full time" @if ($type == 'full time') checked  @endif>
                                    <label for="full time">Full Time</label>
                                </div>
                                <div class="d-flex container">
                                    <input type="radio" name="type" class="form-check-input" id="part time" value="part time" @if ($type == 'part time') checked  @endif >
                                    <label for="part time">Part Time</label>
                                </div>
                                <div class="d-flex container">
                                    <input type="radio" name="type" class="form-check-input" id="freelance" value="freelance" @if ($type == 'freelance') checked  @endif >
                                    <label for="freelance">Freelance</label>
                                </div>
                                <div class="d-flex container">
                                    <input type="radio" name="type" class="form-check-input" id="intern" value="intern" @if ($type == 'intern') checked  @endif >
                                    <label for="intern">Intern</label>
                                </div>
                            </div>
                            <!-- select-Categories End -->
                            <div class="small-section-tittle2">
                                <button class="btn btn-primary btn-block btn-sm" type="submit">
                                    <span class="fa fa-search"></span> Search
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- Job Category Listing End -->
            </div>
            <!-- Right content -->
            <div class="col-xl-9 col-lg-9 col-md-8">
                <!-- Featured_job_start -->
                <section class="featured-job-area">
                    <div class="container">
                        <!-- Count of Job list Start -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="count-job mb-35">
                                    @if ($name || $type)
                                        <span>{{ $histories->count() }} Jobs found</span>
                                    @else
                                        <span>{{ $histories->count() }} Jobs found</span>
                                    @endif
                                    <!-- Select job items start -->
                                    {{-- <div class="select-job-items">
                                        <span>Sort by</span>
                                        <select name="order" class="nice-select">
                                            <option value="">None</option>
                                            <option value="desc">Latest</option>
                                            <option value="asc">Oldest</option>
                                        </select>
                                    </div> --}}
                                    <!--  Select job items End-->
                                </div>
                            </div>
                        </div>
                        <!-- Count of Job list End -->
                        @foreach ($histories as $history)
                            <!-- single-job-content -->
                            <div class="single-job-items mb-30">
                                <div class="d-flex justify-content-between" style="width: 100%">
                                    <div class="job-items">
                                        <div class="company-img">
                                            <a href="/job/{{ $history->vacancy->id }}/detail"><img src="{{ Storage::disk('local')->url($office->image) }}" class="img-fluid" style="height: 100px" alt=""></a>
                                        </div>
                                        <div class="job-tittle job-tittle2">
                                            <a href="/job/{{ $history->vacancy->id }}/detail">
                                                <h4 style="
                                                        white-space: nowrap;
                                                        overflow: hidden;
                                                        text-overflow: ellipsis;
                                                        max-width: 35ch;">
                                                    {{ $history->vacancy->name }}
                                                </h4>
                                            </a>
                                            <ul>
                                                <li>{{ $office->name }}</li>
                                                <li>Rp. {{ number_format($history->vacancy->start_salary) }} - Rp. {{ number_format($history->vacancy->end_salary) }}</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="items-link items-link2 f-right">
                                        <a href="/job/{{ $history->vacancy->id }}/detail">{{ $history->vacancy->type }}</a>
                                        <span>{{ \Carbon\Carbon::parse($history->vacancy->created_at)->locale('id')->diffForHumans() }}</span>
                                    </div>
                                </div>
                                <hr>
                                <div class="job-post-details">
                                    <div class="post-details1">
                                        <p>Apply date : <span>{{ $history->created_at }}</span></p>
                                    </div>
                                    <div class="post-details2">
                                        <p>Apply status : 
                                            @if ($history->status == 'lulus kualifikasi')
                                                <span class="badge badge-success px-5 py-2">
                                                    <span class="fa fa-check"></span> {{ strtoupper($history->status) }}
                                                </span>
                                            @elseif ($history->status != 'pending')
                                                <span class="badge badge-warning px-5 py-2">
                                                    <span class="fa fa-spinner fa-spin"></span> {{ strtoupper($history->status) }}
                                                </span>
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </section>
                <!-- Featured_job_end -->
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 d-flex justify-content-end">
                {{ $histories->links() }}
            </div>
        </div>
    </div>
</div>
{{--  --}}

@endsection