<div class="slider-area ">
    <!-- Mobile Menu -->
    <div class="slider-active">
        <div class="single-slider slider-height d-flex align-items-center" data-background="{{ asset('assets/jobfinder-master/assets/img/hero/h1_hero.jpg') }}">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-9 col-md-10">
                        <div class="hero__caption">
                            <h1>Find the most exciting startup jobs</h1>
                        </div>
                    </div>
                </div>
                <!-- Search Box -->
                <div class="row">
                    <div class="col-xl-8">
                        <!-- form -->
                        <form action="/job" class="search-box">
                            <div class="input-form">
                                <input type="text" name="name" placeholder="Job Tittle or keyword">
                            </div>
                            <div class="select-form">
                                <div class="select-itms">
                                    <select id="select1" name="type">
                                        <option value="">Select Type</option>
                                        <option value="full time">Full Time</option>
                                        <option value="part time">Part Time</option>
                                        <option value="freelancer">Freelancer</option>
                                        <option value="Internship">Internship</option>
                                    </select>
                                </div>
                            </div>
                            <div class="search-form">
                                <button class="btn" type="submit">
                                    <i class="ti-search"></i>
                                    Find job
                                </button>
                                {{-- <a href="" type="submit">Find job</a> --}}
                            </div>	
                        </form>	
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>