<div class="online-cv cv-bg section-overly pt-90 pb-120"  data-background="{{ asset('assets/jobfinder-master/assets/img/gallery/cv_bg.jpg') }}">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10">
                <div class="cv-caption text-center">
                    <p class="pera1">FEATURED TOURS Packages</p>
                    <p class="pera2"> Make a Difference with Your Online Resume!</p>
                    {{-- <a href="#" class="border-btn2 border-btn4">Upload your cv</a> --}}

                    {{-- cek jika belum login --}}
                    @if (!Auth::check())
                        {{-- <a href="/login" class="border-btn2 border-btn4">Upload your cv</a> --}}
                        <button class="btn btn-primary">
                            Login for upload cv
                        </button>
                        {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cek-login">
                            Login for upload cv
                        </button> --}}
                    @else
                        <a href="/upload-cv" class="border-btn2 border-btn4">Upload your cv</a>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>

{{-- @include('frontoffice.modal.cek-login') --}}