@extends('backoffice.layout.main')

@section('content')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Data Jadwal Training</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item active">Data Jadwal Training</li>
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

          <div class="row flex justify-content-between mt-2">
            <form action="" class="form-inline">
              <div class="pr-4" style="border-right: 3px solid #0d6efd">
                <h3 class="card-title">
                  <b>Jadwal Training</b>
                </h3>
              </div>

              {{-- <div class="pl-4">

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
              </div>
              <div class="input-group ml-2">
                <button type="submit" class="btn btn-success btn-sm">
                  <i class="fas fa-search"></i>
                </button>
              </div>

              @if ($name)
              <div class="input-group ml-2">
                <a href="/backoffice/vacancy" class="btn btn-primary btn-sm">
                  <i class="fas fa-sync-alt"></i>
                </a>
              </div>
              @endif --}}

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

          @if ($name)
          <div class="search">
            <div class="text-center">
              <span class="fa fa-search"></span> Hasil Pencarian dari: <b>
                @if ($name)
                Lowongan Kerja
                @endif
                {{ $name }}
              </b>
            </div>
            <hr>
          </div>
          @endif

          <div class="row">

            <div class="col-md-12">
              <table class="table table-bordered table-hover text-center" id="example1">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Lowongan Kerja</th>
                    <th>Tanggal</th>
                    <th>Waktu</th>
                    <th>Lokasi</th>
                    {{-- <th>Kandidat</th> --}}
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>

                  @foreach($schedules as $key => $schedule)
                  <tr>
                    <td>{{ $key+1 }}</td>
                    <td>
                      {{ $schedule->vacancy->name }}
                      {{-- <a href="/backoffice/vacancy/{{ $schedule->vacancy->id }}/detail" class="text-primary">
                        {{ $schedule->vacancy->name }}
                      </a> --}}
                    </td>
                    <td>{{ \Carbon\Carbon::parse($schedule->date)->locale('ID')->isoFormat('dddd, D MMMM YYYY') }}</td>
                    <td>{{ $schedule->time }}</td>
                    <td>{{ $schedule->location }}</td>
                    {{-- <td>


                      {{ $schedule->vacancy->jobApplications->where('status', 'kualifikasi training')->count() }} 
                      pelamar</td> --}}
                    <td>
                      <button title="edit" type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                          data-target="#edit-schedule-{{ $schedule->vacancy->id }}">
                          <span class="fa fa-calendar-alt"></span> Ubah
                      </button>
                      @include('backoffice.training.modal.edit-schedule')
                      <a href="/backoffice/training/{{ $schedule->id }}/detail" class="btn btn-primary btn-sm">
                        <i class="fas fa-info-circle"></i> Detail
                      </a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>

              @foreach ($schedules as $key => $schedule)
                {{-- @include('backoffice.vacancy.modal.user')
                @if ($key + 1 < 3)
                  @include('backoffice.vacancy.modal.invite-training') 
                @endif --}}
              @endforeach

            </div>

          </div>

        </div>

      </div>

    </div>
  </div>

</section>

@endsection