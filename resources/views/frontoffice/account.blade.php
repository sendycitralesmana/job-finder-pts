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
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h3 class="card-title">Profil</h3>
                        </div>
                        <div>
                            <a href="/account/{{ auth()->user()->id }}/edit" class="px-3 py-1" style="border: 2px solid #08466c; border-radius: 5px; cursor: pointer; color: #08466c"
                                title="ubah data">
                                <i class="fa fa-edit"></i> edit
                            </a>
                            <a href="/account/{{ auth()->user()->id }}/edit-password" class="px-3 py-1 ml-2" style="border: 2px solid #08466c; border-radius: 5px; cursor: pointer; color: #08466c"
                                title="ganti password">
                                <i class="fa fa-lock"></i> ganti password
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="image text-center">
                                @if (auth()->user()->foto == null)
                                    <img src="{{ asset('images/profile-default.jpg') }}"
                                        class="img-fluid rounded" style="height: 240px; width: 80%" alt="Responsive image">
                                @else
                                    <img src="{{ Storage::disk('local')->url(auth()->user()->foto) }}" class="img-fluid rounded" style="height: 240px; width: 80%" alt="Responsive image">
                                @endif
                                <div class="d-flex justify-content-around mt-2" style="color: #08466c">
                                    @if (auth()->user()->foto == null)
                                        <div type="button" class="px-3 py-1 mr-2" data-toggle="modal" data-target="#upload-foto-{{ auth()->user()->id }}"
                                            style="border: 2px solid #08466c; border-radius: 5px; cursor: pointer">
                                            <span class="fa fa-upload"></span> Upload foto
                                        </div>
                                    @else
                                        <div type="button" class="px-3 py-1" data-toggle="modal" data-target="#edit-foto-{{ auth()->user()->id }}"
                                            style="border: 2px solid #08466c; border-radius: 5px; cursor: pointer">
                                            <span class="fa fa-edit"></span> Ganti foto
                                        </div>
                                        <div type="button" class="px-3 py-1" data-toggle="modal" data-target="#delete-foto-{{ auth()->user()->id }}"
                                            style="border: 2px solid #08466c; border-radius: 5px; cursor: pointer">
                                            <span class="fa fa-trash"></span> Hapus foto
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <hr>
                            <div class="cv text-center">
                                <p>Curriculum Vitae / CV</p>
                                <div class="d-flex align-items-center justify-content-center">
                                    <div class="mr-2">
                                        <img src="{{ asset('images/pdf.jpeg') }}" 
                                        class="img-fluid rounded" style="height: 90px; width: 90px" alt="Responsive image">
                                    </div>
                                    <div>
                                        <div style="color: #08466c">
                                            @if (auth()->user()->cv == null)
                                                <div type="button" class="px-3 py-1 mr-2" data-toggle="modal" data-target="#upload-cv-{{ auth()->user()->id }}"
                                                    style="border: 2px solid #08466c; border-radius: 5px; cursor: pointer">
                                                    <span class="fa fa-upload"></span> Upload CV
                                                </div>
                                            @else
                                                <a href="/account/{{ auth()->user()->id }}/preview-cv" class="px-3 py-1" style="border: 2px solid #08466c; border-radius: 5px; cursor: pointer; color: #08466c"
                                                    title="lihat cv" target="_blank">
                                                    <i class="fa fa-eye"></i> Lihat
                                                </a>
                                            @endif
                                        </div>
                                        <div style="color: #08466c">
                                            @if (auth()->user()->cv)
                                            <div class="d-flex justify-content-between mt-2">
                                                <div type="button" class="px-3 py-1 mr-2" data-toggle="modal" data-target="#edit-cv-{{ auth()->user()->id }}"
                                                    style="border: 2px solid #08466c; border-radius: 5px; cursor: pointer">
                                                    <span class="fa fa-edit"></span> Ganti
                                                </div>
                                                <div type="button" class="px-3 py-1" data-toggle="modal" data-target="#delete-cv-{{ auth()->user()->id }}"
                                                    style="border: 2px solid #08466c; border-radius: 5px; cursor: pointer">
                                                    <span class="fa fa-trash"></span> Hapus
                                                </div>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <hr class="d-lg-none">
                            <h4 class="mb-4">Nama : {{ auth()->user()->name }}</h4>
                            <h4 class="mb-4">Email : {{ auth()->user()->email }}</h4>
                            <h4 class="mb-4">No Hp : {{ auth()->user()->no_hp }}</h4>
                            <h4 class="mb-4">Jenis Kelamin : {{ auth()->user()->gender }}</h4>
                            <h4 class="mb-4">Alamat : {{ auth()->user()->address }}</h4>
                            <h4 class="mb-4">Agama : {{ auth()->user()->religion }}</h4>
                            <h4 class="mb-4">Tempat Lahir : {{ auth()->user()->place_birth }}</h4>
                            <h4 class="mb-4">Tanggal Lahir : {{ auth()->user()->date_birth }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-md-4">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h3 class="card-title">Pendidikan</h3>
                        </div>
                        <div>
                            <div type="button" class="px-3 py-1 mr-2" data-toggle="modal" data-target="#add-education-{{ auth()->user()->id }}"
                             style="border: 2px solid #08466c; border-radius: 5px; cursor: pointer">
                                <span class="fa fa-plus"></span> Tambah
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @foreach (auth()->user()->educations as $education )
                        <div class="d-flex justify-content-between">
                            <div>
                                <h4 class="">{{ $education->school }}</h4>
                                <p>{{ $education->study }} / {{ $education->start_year }} - {{ $education->end_year }}</p>
                            </div>
                            <div>
                                <div type="button" class="px-3  mr-2 mb-2" data-toggle="modal" data-target="#edit-education-{{ $education->id }}"                               style="border: 2px solid #08466c; border-radius: 5px; cursor: pointer">
                                    <span class="fa fa-edit"></span>
                                </div>
                                <div type="button" class="px-3  mr-2 mb-2" data-toggle="modal" data-target="#delete-education-{{ $education->id }}"
                                style="border: 2px solid #08466c; border-radius: 5px; cursor: pointer">
                                    <span class="fa fa-trash"></span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <hr class="d-lg-none">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h3 class="card-title">Keahlian</h3>
                        </div>
                        <div>
                            <div type="button" class="px-3 py-1 mr-2" data-toggle="modal" data-target="#add-skill-{{ auth()->user()->id }}"
                             style="border: 2px solid #08466c; border-radius: 5px; cursor: pointer">
                                <span class="fa fa-plus"></span> Tambah
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="d-flex flex-wrap justify-content-center">
                        @foreach (auth()->user()->skills as $skill )
                        <div class="d-flex mb-2 mr-2">
                            <div type="button" class="px-1" data-toggle="modal" data-target="#edit-skill-{{ $skill->id }}"
                            style="border: 2px solid #007bff; border-radius: 5px; cursor: pointer">
                                <span class="fa fa-edit"></span>
                            </div>
                            <div class="badge badge-primary px-4 py-2 ">{{ $skill->skill }}</div>
                            <div type="button" class="px-1" data-toggle="modal" data-target="#delete-skill-{{ $skill->id }}"
                            style="border: 2px solid #007bff; border-radius: 5px; cursor: pointer">
                                <span class="fa fa-trash"></span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <hr class="d-lg-none">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h3 class="card-title">Pengalaman</h3>
                        </div>
                        <div>
                            <div type="button" class="px-3 py-1 mr-2" data-toggle="modal" data-target="#add-experience-{{ auth()->user()->id }}"
                             style="border: 2px solid #08466c; border-radius: 5px; cursor: pointer">
                                <span class="fa fa-plus"></span> Tambah
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if (auth()->user()->experiences->count() > 3)
                        @foreach (auth()->user()->experiences as $experience )
                        <div style="overflow-y: scroll; height: 400px">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h4 class="">{{ $experience->position }}</h4>
                                    <p>{{ $experience->company }} <br>
                                    {{ $experience->type }} / {{ $experience->start_year }} - {{ $experience->end_year }}</p>
                                </div>
                                <div>
                                    <div type="button" class="px-3 py-1 mr-2 mb-2" data-toggle="modal" data-target="#edit-experience-{{ $experience->id }}"
                                    style="border: 2px solid #08466c; border-radius: 5px; cursor: pointer">
                                        <span class="fa fa-edit"></span>
                                    </div>
                                    <div type="button" class="px-3 py-1 mr-2 mb-2" data-toggle="modal" data-target="#delete-experience-{{ $experience->id }}"}"
                                    style="border: 2px solid #08466c; border-radius: 5px; cursor: pointer">
                                        <span class="fa fa-trash"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @else
                        @foreach (auth()->user()->experiences as $experience )
                        <div class="d-flex justify-content-between">
                            <div>
                                <h4 class="">{{ $experience->position }}</h4>
                                <p>{{ $experience->company }} <br>
                                {{ $experience->type }} / {{ $experience->start_year }} - {{ $experience->end_year }}</p>
                            </div>
                            <div>
                                <div type="button" class="px-3 py-1 mr-2 mb-2" data-toggle="modal" data-target="#edit-experience-{{ $experience->id }}"
                                style="border: 2px solid #08466c; border-radius: 5px; cursor: pointer">
                                    <span class="fa fa-edit"></span>
                                </div>
                                <div type="button" class="px-3 py-1 mr-2 mb-2" data-toggle="modal" data-target="#delete-experience-{{ $experience->id }}"}"
                                style="border: 2px solid #08466c; border-radius: 5px; cursor: pointer">
                                    <span class="fa fa-trash"></span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @endif
                    {{-- <div style="overflow-y: scroll; height: 400px">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h4 class="">Web Developer</h4>
                                <p>PT Pratama Teknologi Solusi <br>
                                Fulltime / 2000 - 2001</p>
                            </div>
                            <div>
                                <div type="button" class="px-3 py-1 mr-2 mb-2" data-toggle="modal" data-target="#edit-foto-{{ auth()->user()->id }}"
                                style="border: 2px solid #08466c; border-radius: 5px; cursor: pointer">
                                    <span class="fa fa-edit"></span>
                                </div>
                                <div type="button" class="px-3 py-1 mr-2 mb-2" data-toggle="modal" data-target="#edit-foto-{{ auth()->user()->id }}"
                                style="border: 2px solid #08466c; border-radius: 5px; cursor: pointer">
                                    <span class="fa fa-trash"></span>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Change Password</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <form action="/change-password" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" name="password" id="password">
                                </div>
                                <div class="form-group">
                                    <label for="konfirmasi_password">Konfirmasi Password</label>
                                    <input type="password" class="form-control" name="konfirmasi_password"
                                        id="konfirmasi_password">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Change Password</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
</div>

<div style="margin-top: 150px">

</div>

{{-- foto --}}
@include('frontoffice.modal.foto.upload-foto')
@include('frontoffice.modal.foto.edit-foto')
@include('frontoffice.modal.foto.delete-foto')

{{-- cv --}}
@include('frontoffice.modal.cv.upload-cv')
@include('frontoffice.modal.cv.edit-cv')
@include('frontoffice.modal.cv.delete-cv')

{{-- education --}}
@include('frontoffice.modal.education.add-education')
@foreach (auth()->user()->educations as $education )
    @include('frontoffice.modal.education.edit-education')
    @include('frontoffice.modal.education.delete-education')
@endforeach

{{-- skill --}}
@include('frontoffice.modal.skill.add-skill')
@foreach (auth()->user()->skills as $skill )
    @include('frontoffice.modal.skill.edit-skill')
    @include('frontoffice.modal.skill.delete-skill')
@endforeach

{{-- experience --}}
@include('frontoffice.modal.experience.add-experience')
@foreach (auth()->user()->experiences as $experience )
        @include('frontoffice.modal.experience.edit-experience')
        @include('frontoffice.modal.experience.delete-experience')
@endforeach

@endsection