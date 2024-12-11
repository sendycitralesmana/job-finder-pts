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
                        <h2>Your Account</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Hero Area End -->
<div style="margin-top: 150px">

</div>

<div class="container">
    <form action="/account/{{ auth()->user()->id }}/update-password" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h3 class="card-title">Ubah password</h3>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                        @if (session()->has('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        @if (session()->has('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('error') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password_sekarang">Password sekarang</label>
                                    <input type="password" class="form-control" name="password_sekarang" id="password_sekarang" required
                                    oninvalid="this.setCustomValidity('Password harus diisi')" oninput="this.setCustomValidity('')" >
                                </div>
                                <div class="form-group">
                                    <label for="password_baru">Password Baru</label>
                                    <input type="password" class="form-control" name="password_baru" id="password_baru" required
                                    oninvalid="this.setCustomValidity('Password harus diisi')" oninput="this.setCustomValidity('')" >
                                </div>
                                <div class="form-group">
                                    <label for="konfirmasi_password">Konfirmasi Password</label>
                                    <input type="password" class="form-control" name="konfirmasi_password" id="konfirmasi_password" required
                                    oninvalid="this.setCustomValidity('Password harus diisi')" oninput="this.setCustomValidity('')" >
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary f-right">Simpan</button>
                    </div>

                </div>
            </div>
        </div>
    </form>
</div>

<div style="margin-top: 150px">

</div>

@endsection