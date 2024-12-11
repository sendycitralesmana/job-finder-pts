<section class="featured-job-area feature-padding">
    <div class="container">
        <!-- Section Tittle -->
        <div class="row">
            <div class="col-lg-12">
                <div class="section-tittle text-center">
                    <span>Recent Job</span>
                    <h2>Featured Jobs</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-xl-10">
                <!-- single-job-content -->
                @foreach ($recentVacancies as $recentVacancy)
                    <div class="single-job-items mb-30">
                        <div class="job-items">
                            <div class="company-img">
                                <a href="/job/{{ $recentVacancy->id }}/detail">
                                    <img src="{{ asset('images/logo.jpeg') }}" class="img-fluid" alt=""
                                    style="height: 100px">
                                </a>
                            </div>
                            <div class="job-tittle">
                                <a href="/job/{{ $recentVacancy->id }}/detail"><h4>{{ $recentVacancy->name }}</h4></a>
                                <ul>
                                    <li>{{ $office->name }}</li>
                                    <li>Rp. {{ number_format($recentVacancy->start_salary) }} - Rp. {{ number_format($recentVacancy->end_salary) }}</li>
                                </ul>
                            </div>
                        </div>
                        <div class="items-link f-right">
                            <a href="/job/{{ $recentVacancy->id }}/detail">{{ $recentVacancy->type }}</a>
                            <span>{{ \Carbon\Carbon::parse($recentVacancy->created_at)->locale('id')->diffForHumans() }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>