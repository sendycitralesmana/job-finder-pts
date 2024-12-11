@extends('backoffice.layout.main')

@section('content')
    
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Data Pelamar</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Data Pelamar</li>
          </ol>
        </div>
      </div>
    </div>
</section>

<section class="content">

    <div class="row justify-content-center">
        <div class="col-md-12">

            <!-- Default box -->
            <div class="card card-outline card-primary">
                <div class="card-header">

                    {{-- <div class="row">
                        <h3 class="card-title">Pelamar</h3>
                    </div> --}}

                    <div class="row flex justify-content-between mt-2">
                        <form action="" class="form-inline">
                            <div class="pr-4" style="border-right: 3px solid #0d6efd">
                                <h3 class="card-title">
                                    <b>Pelamar</b>
                                </h3>
                            </div>

                            <div class="pl-4">

                            </div>

                        </form>
    
                        <div class="card-tools">
                            {{-- <a href="/backoffice/user/tambah" class="btn btn-success btn-sm" title="Tambah">
                                <i class="fas fa-plus"></i> Tambah
                            </a> --}}
                            {{-- <button title="Tambah" type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#tambah">
                                <span class="fa fa-plus"></span> Tambah
                            </button>
                            @include('backoffice.user.modal.tambah') --}}
    
                            @if ($errors->any())
    
                            <script>
                                jQuery(function() {
                                    $('#tambah').modal('show');
                                });
                            </script>
    
                            @endif
    
                            <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse"
                                data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                        </div>
                    </div>

                </div>
                <div class="card-body">

                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Berhasil </strong>{{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif

                    <table class="table table-bordered table-hover text-center" id="example1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Foto</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Status Email</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($users as $key => $user)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>
                                    @if ($user->foto)
                                    <img src="{{ asset('storage/'.$user->foto) }}" class="img-fluid rounded" style="width: 100px; height: 100px">
                                    @else
                                    <img src="{{ asset('images/profile-default.jpg') }}" class="img-fluid rounded" style="width: 100px; height: 100px">
                                    @endif
                                </td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <h5>
                                        @if ($user->email_verified_at)
                                            <span class="badge badge-success">
                                                <i class="fas fa-check"></i> Terverifikasi
                                            </span>
                                        @else
                                            <span class="badge badge-danger">
                                                <i class="fas fa-times"></i> Belum Terverifikasi
                                            </span>
                                        @endif
                                    </h5>
                                </td>
                                <td>
                                    <button type="button" class="badge badge-light pl-2 pr-2" data-toggle="modal" data-target="#detail-{{ $user->id }}" title="Lihat detail">
                                        <i class="fa fa-eye"></i> Detail
                                    </button>
                                    @if ($user->id != Auth::user()->id)
                                        {{-- <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit-{{ $user->id }}" title="Ubah">
                                            <i class="fa fa-edit"></i> Ubah
                                        </button> --}}
                                        {{-- <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete-{{ $user->id }}" title="Hapus">
                                            <i class="fa fa-trash"></i> Hapus
                                        </button> --}}
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{-- modal --}}
                    @foreach ($users as $user)
                        {{-- @include('backoffice.user.modal.delete') --}}
                        @include('backoffice.user.modal.edit')
                        @include('backoffice.user.modal.detail')
                    @endforeach

                </div>

            </div>

        </div>
    </div>

    <script type="text/javascript">
        $(function () {
            const Toast = Swal.mixin({
              toast: true,
              position: 'top-end',
              showConfirmButton: false,
              timer: 3000
            });

            // munculkan toast.fire tanpa harus di click
            document.addEventListener('DOMContentLoaded', () => {
                Toast.fire({
                    icon: 'success',
                    title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                })
            });
      
            // $('.swalDefaultSuccess').click(function () {
            //   Toast.fire({
            //     icon: 'success',
            //     title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            //   })
            // });
          });
      </script>

</section>

@endsection