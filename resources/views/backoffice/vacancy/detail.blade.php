@extends('backoffice.layout.main')

@section('content')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Detail Lowongan Kerja</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item active">Detail Lowongan Kerja</li>
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

          <div class="row flex justify-content-between mt-2">
            <form action="" class="form-inline">
              <div class="pr-4" style="border-right: 3px solid #0d6efd">
                <h3 class="card-title">
                  <b>Lowongan Kerja</b>
                </h3>
              </div>
            </form>

            <div class="card-tools">
              <button title="edit" type="button" class="btn btn-tool btn-sm" data-toggle="modal"
                data-target="#edit-{{ $vacancy->id }}">
                <span class="fa fa-edit"></span>
              </button>
              @include('backoffice.vacancy.modal.edit')
              {{-- <button title="delete" type="button" class="btn btn-tool btn-sm" data-toggle="modal"
                data-target="#delete-{{ $vacancy->id }}">
                <span class="fa fa-trash"></span>
              </button>
              @include('backoffice.vacancy.modal.delete') --}}
              <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip"
                title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>

        </div>
        <div class="card-body">

          @if(session('success'))
          <div class="alert alert-success alert-dismissible fade show p-b-10" role="alert">
            <strong>Berhasil </strong>{{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          @endif

          <div class="row">

            <div class="col-md-8">
              <div class="card card-outline card-primary bg-light">
                <div class="card-header">
                  <h3><b>{{ $vacancy->name }}</b></h3>
                </div>
                <div class="card-body">
                  <div>{!! $vacancy->description !!}</div>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="card card-outline card-primary bg-light">
                <div class="card-body">
                  <div class="mb-2">
                    <h4>Status</h4>
                    @if ($vacancy->status == 'aktif')
                    <span class="badge badge-success px-4 py-2">{{ strtoupper($vacancy->status) }}</span></span>
                    @else
                    <span class="badge badge-danger px-4 py-2">{{ strtoupper($vacancy->status) }}</span></span>
                    @endif
                  </div>
                  <div>
                    <h4>Tipe</h4>
                    <p>{{ $vacancy->type }}</p>
                  </div>
                  <div>
                    <h4>Berlaku sampai</h4>
                    <p>{{ \Carbon\Carbon::parse($vacancy->end_date)->locale('id')->isoFormat('dddd, D MMMM YYYY') }}</p>
                  </div>
                  <div>
                    <h4>Salary</h4>
                    <p>Rp. {{ number_format($vacancy->start_salary, 0, ',', '.') }} - Rp. {{
                      number_format($vacancy->end_salary, 0, ',', '.') }}</p>
                  </div>
                  <div>
                    <h4>Skill</h4>
                    <div class="d-flex flex-wrap justify-content-center">
                      @foreach ($vacancy->skills as $skill)
                      <div class="mx-1 p-1 my-1" style="border: #0d6efd 1px solid; border-radius: 5px">
                        <button title="edit" type="button" class="btn btn-tool btn-sm" data-toggle="modal"
                          data-target="#edit-skill-{{ $skill->id }}">
                          <span class="fa fa-edit"></span>
                        </button>
                        @include('backoffice.vacancy.modal.skill.edit-skill')
                        <span class="badge badge-primary px-2 py-1">{{ $skill->name }}</span>
                        <button title="delete" type="button" class="btn btn-tool btn-sm" data-toggle="modal"
                          data-target="#delete-skill-{{ $skill->id }}">
                          <span class="fa fa-trash"></span>
                        </button>
                        @include('backoffice.vacancy.modal.skill.delete-skill')
                      </div>
                      @endforeach
                      <div class="d-flex align-items-center" style="border: #0d6efd 1px solid; border-radius: 5px">
                        <button title="delete" type="button" class="btn btn-tool btn-sm" data-toggle="modal"
                          data-target="#add-skill-{{ $vacancy->id }}">
                          <span class="fa fa-plus"></span>
                        </button>
                        @include('backoffice.vacancy.modal.skill.add-skill')
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>

      </div>

      <div class="card card-outline card-primary">
        <div class="card-header">

          <div class="row flex justify-content-between mt-2">
            <form action="" class="form-inline">
              <div class="pr-4" style="border-right: 3px solid #0d6efd">
                <h3 class="card-title">
                  <b>Pelamar sebagai {{ $vacancy->name }}</b>
                </h3>
              </div>
            </form>

            <div class="card-tools">
              <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip"
                title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>

        </div>
        <div class="card-body">
          <div class="row">

            <div class="col-md-12">
              <table class="table table-bordered table-hover text-center" id="example1">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Pelamar</th>
                    <th>CV</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>

                  @foreach($jobApplications as $key => $jobApplication)
                  <tr>
                    <td>{{ $key+1 }}</td>
                    <td>
                      <button type="button" class="badge badge-light pl-2 pr-2" data-toggle="modal"
                        data-target="#detail-{{ $jobApplication->user->id }}" title="Lihat detail">
                        <i class="fa fa-eye"></i> {{ $jobApplication->user->name }}
                      </button>
                    </td>
                    <td>
                      <a href="/backoffice/user/{{ $jobApplication->user_id }}/preview-cv" target="_blank"
                        class="btn btn-primary">
                        <span class="fa fa-file-pdf"></span> Lihat
                      </a>
                    </td>
                    <td>
                      @if ($jobApplication->status == 'pending')
                      <h5>
                        <div class="badge badge-warning">
                          <span class="fa fa-spinner fa-spin"></span> PENDING
                        </div>
                      </h5>
                      @endif
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>

              @foreach ($jobApplications as $jobApplication)
              @include('backoffice.vacancy.modal.user')
              @endforeach

            </div>

          </div>
        </div>

      </div>
    </div>
  </div>

</section>

@endsection