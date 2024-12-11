@extends('backoffice.layout.main')

@section('content')

<meta name="csrf-token" content="{{ csrf_token() }}">

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Kantor</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">Data Kantor</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Kantor</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                            data-target="#edit" title="Unduh">
                            <span><i class="fa fa-edit"></i></span>
                        </button>
                        @include('backoffice.office.modal.edit')
                        <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse"
                            data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">

                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" office="alert">
                        <strong class="ml-2 mr-2">Berhasil </strong> | {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif

                    <div class="row">
                        <div class="col-md-4">
                            <div class="card card-outline card-primary">
                                <div class="card-body">
                                    <div class="text-center">
                                        <img src="{{ asset('images/logo.jpeg') }}" class="img-fluid" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card card-outline card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Detail Kantor</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p><b>Nama Kantor</b></p>
                                            <p>{{ $office->name }}</p>
                                            <p><b>Alamat Kantor</b></p>
                                            <p>{{ $office->address }}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <p><b>No Telpon</b></p>
                                            <p>{{ $office->no_telp }}</p>
                                            <p><b>Email</b></p>
                                            <p>{{ $office->email }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

</section>

@endsection