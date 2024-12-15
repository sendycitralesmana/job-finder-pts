@extends('backoffice.layout.main')

@section('content')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Data Pelamar Memenuhi Kualifikasi</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item active">Data Pelamar Memenuhi Kualifikasi</li>
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
                  <b>Data Lowonan Kerja</b>
                </h3>
              </div>

              <div class="pl-4">

              </div>
              <div class="d-flex justify-content-evenly">
                <label for="">Cari: </label>
                <div class="ml-2"></div>
                <select name="name" class="form-control select2" style="">
                  <option value="">-- Lowongan Kerja --</option>
                  @foreach ($getVacancies as $vacancy)
                    <option value="{{ $vacancy->name }}" @if ($name == $vacancy->name)
                      selected
                    @endif>{{ $vacancy->name }}</option>
                  @endforeach
                </select>
                <div class="ml-2"></div>
                <select name="type" class="form-control ml-2 select2">
                  <option value="">-- Tipe --</option>
                  <option value="full time" @if ($type == 'full time') selected @endif >Full Time</option>
                  <option value="part time" @if ($type == 'part time') selected @endif >Part Time</option>
                  <option value="freelance" @if ($type == 'freelance') selected @endif >Freelance</option>
                  <option value="intern" @if ($type == 'intern') selected @endif>Intern</option>
                </select>
              </div>
              <div class="input-group ml-2">
                <button type="submit" class="btn btn-success btn-sm">
                  <i class="fas fa-search"></i>
                </button>
              </div>

              @if ($name || $type)
              <div class="input-group ml-2">
                <a href="/backoffice/qualification" class="btn btn-primary btn-sm">
                  <i class="fas fa-sync-alt"></i>
                </a>
              </div>
              @endif

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

          @if(session('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Berhasil </strong>{{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          @endif

          @if ($name || $type)
          <div class="search">
            <div class="text-center">
              <span class="fa fa-search"></span> Hasil Pencarian dari: <b>
                @if ($name)
                Lowongan Kerja
                @endif
                {{ $name }}
                |
                @if ($type)
                Tipe
                @endif
                {{ $type }}
              </b>
            </div>
            <hr>
          </div>
          @endif

          <div class="row">

            @foreach ($vacancies as $vacancy)
              <div class="col-md-4">
                <div class="card bg-light card-outline card-primary">
                  <div class="card-header">
                    <h3 class="card-title"><b>{{ $vacancy->name }}</b></h3>
                    <div class="card-tools">
                      <a href="/backoffice/qualification/{{ $vacancy->id }}/detail" class="btn btn-tool btn-sm">
                        <span class="fa fa-eye"></span>
                      </a>
                      <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                    </div>
                  </div>
                  <div class="card-body text-center">
                    -- Kualifikasi posisi --
                    <div class="d-flex flex-wrap justify-content-center">
                      @foreach ($vacancy->skills as $skill)
                        <div class="mx-1  my-1">
                          <span class="badge badge-primary ">{{ $skill->name }}</span>
                        </div>
                      @endforeach
                    </div>
                    <hr>
                    <div class="d-flex justify-content-start mt-2 flex-wrap">
                      <span class="badge badge-dark">{{ $vacancy->type }}</span>
                      <span class="badge badge-warning ml-2">Rp. {{ number_format($vacancy->start_salary) }} - Rp. {{ number_format($vacancy->end_salary) }}</span>
                      @if ($vacancy->status == 'aktif')
                      <span class="badge badge-success ml-2">
                        {{ $vacancy->status }}
                      </span>
                      @else
                      <span class="badge badge-danger ml-2">
                        {{ $vacancy->status }}
                      </span>
                      @endif
                      <span class="badge badge-info ml-2">s/d {{ \Carbon\Carbon::parse($vacancy->end_date)->locale('id')->isoFormat('dddd, D MMMM YYYY') }}</span>
                    </div>
                  </div>
                  <div class="card-footer">
                    <div class="d-flex justify-content-around">
                      <div class="btn btn-primary btn-sm">
                        <i class="fas fa-user-friends"></i>
                        {{ $vacancy->jobApplications->where('status', 'lulus kualifikasi')->count() }} pelamar telah memenuhi kualifikasi
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach

          </div>

        </div>

      </div>

    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="d-flex justify-content-end">
        {{ $vacancies->links() }}
      </div>
    </div>
  </div>

</section>

@endsection