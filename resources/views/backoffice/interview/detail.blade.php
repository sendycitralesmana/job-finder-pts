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
              {{-- <button title="edit" type="button" class="btn btn-tool btn-sm" data-toggle="modal"
                data-target="#edit-{{ $schedule->vacancy->id }}">
                <span class="fa fa-edit"></span>
              </button>
              @include('backoffice.vacancy.modal.edit')
              <button title="jadwal interview" type="button" class="btn btn-tool btn-sm" data-toggle="modal"
                data-target="#schedule-interview-{{ $schedule->vacancy->id }}">
                <span class="fa fa-calendar-alt"></span>
              </button>
              @include('backoffice.vacancy.modal.schedule-interview') --}}
              <button title="jadwal interview" type="button" class="btn btn-tool btn-sm" data-toggle="modal"
                data-target="#schedule-interview-{{ $schedule->vacancy->id }}">
                <span class="fa fa-calendar-alt"></span>
              </button>
              @include('backoffice.interview.modal.schedule-interview')
              <button title="jadwal training" type="button" class="btn btn-tool btn-sm" data-toggle="modal"
                data-target="#schedule-training-{{ $schedule->vacancy->id }}">
                <span class="fa fa-calendar-alt"></span>
              </button>
              @include('backoffice.interview.modal.schedule-training')
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
                  <h3><b>{{ $schedule->vacancy->name }}</b></h3>
                </div>
                <div class="card-body">
                  <div>{!! $schedule->vacancy->description !!}</div>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="card card-outline card-primary bg-light">
                <div class="card-body">
                  <div class="mb-2">
                    <h4>Status</h4>
                    @if ($schedule->vacancy->status == 'aktif')
                    <span class="badge badge-success px-4 py-2">{{ strtoupper($schedule->vacancy->status) }}</span></span>
                    @else
                    <span class="badge badge-danger px-4 py-2">{{ strtoupper($schedule->vacancy->status) }}</span></span>
                    @endif
                  </div>
                  <div>
                    <h4>Tipe</h4>
                    <p>{{ $schedule->vacancy->type }}</p>
                  </div>
                  <div>
                    <h4>Berlaku sampai</h4>
                    <p>{{ \Carbon\Carbon::parse($schedule->vacancy->end_date)->locale('id')->isoFormat('dddd, D MMMM YYYY') }}</p>
                  </div>
                  <div>
                    <h4>Salary</h4>
                    <p>Rp. {{ number_format($schedule->vacancy->start_salary, 0, ',', '.') }} - Rp. {{
                      number_format($schedule->vacancy->end_salary, 0, ',', '.') }}</p>
                  </div>
                  <div>
                    <h4>Kualifikasi Skill</h4>
                    <div class="d-flex flex-wrap justify-content-center">
                      @foreach ($schedule->vacancy->skills as $skill)
                      <div class="mx-1 p-1 my-1" style="border: #0d6efd 1px solid; border-radius: 5px">
                        {{-- <button title="edit" type="button" class="btn btn-tool btn-sm" data-toggle="modal"
                          data-target="#edit-skill-{{ $skill->id }}">
                          <span class="fa fa-edit"></span>
                        </button>
                        @include('backoffice.vacancy.modal.skill.edit-skill') --}}
                        <span class="badge badge-primary px-2 py-1">{{ $skill->name }}</span>
                        {{-- <button title="delete" type="button" class="btn btn-tool btn-sm" data-toggle="modal"
                          data-target="#delete-skill-{{ $skill->id }}">
                          <span class="fa fa-trash"></span>
                        </button>
                        @include('backoffice.vacancy.modal.skill.delete-skill') --}}
                      </div>
                      @endforeach
                      {{-- <div class="d-flex align-items-center ml-2" style="border: #0d6efd 1px solid; border-radius: 5px">
                        <button title="delete" type="button" class="btn btn-tool btn-sm" data-toggle="modal"
                          data-target="#add-skill-{{ $schedule->vacancy->id }}">
                          <span class="fa fa-plus"></span>
                        </button>
                        @include('backoffice.vacancy.modal.skill.add-skill')
                      </div> --}}
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
            <div class="pr-4" style="border-right: 3px solid #0d6efd">
              <h3 class="card-title">
                <b>Kandidat sebagai {{ $schedule->vacancy->name }}</b>
              </h3>
            </div>

            <div class="card-tools">
              <b>Status penilaian:</b>
              @if ($schedule->vacancy->score_interview == 'aktif')
                <a href="/backoffice/vacancy/{{ $schedule->vacancy->id }}/interview-nonaktif" class="">
                  <b class="text-danger">Nonaktifkan</b> 
                </a>
                <span class="fa fa-toggle-on text-success mx-1"></span> <b class="text-success">Aktif</b>
              @else
                <b class="text-danger">Nonaktif</b> 
                <a href="/backoffice/vacancy/{{ $schedule->vacancy->id }}/interview-aktif" class="">
                  <span class="fa fa-toggle-off text-danger mx-1"></span> <b class="text-success">Aktifkan</b>
                </a>
              @endif
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
                    <th>Surat Lamaran</th>
                    <th>Nilai Lisan</th>
                    <th>Nilai Ujian Tulis</th>
                    <th>Nilai Praktek</th>
                    <th>Nilai Interview</th>
                    <th>Nilai Pemberkasan</th>
                    <th>Nilai Akhir</th>
                    <th>Aksi</th>
                    <th>Status</th>
                    <th>Kualifikasi</th>
                  </tr>
                </thead>
                <tbody>

                  @foreach($jobApplications as $key => $jobApplication)
                  <tr>
                    <td>{{ $key+1 }}</td>
                    <td>
                      <button type="button" class="badge badge-light pl-2 pr-2" data-toggle="modal"
                        data-target="#detail-{{ $jobApplication->jobApplication->user->id }}" title="Lihat detail">
                        <i class="fa fa-eye"></i> {{ $jobApplication->jobApplication->user->name }}
                      </button>
                    </td>
                    <td>
                      @if ($jobApplication->jobApplication->user->cv)
                      <a href="/backoffice/user/{{ $jobApplication->jobApplication->user_id }}/preview-cv" target="_blank"
                        class="btn btn-primary btn-sm">
                        <span class="fa fa-file-pdf"></span> 
                        {{-- Lihat --}}
                      </a>
                      @endif
                    </td>
                    <td>
                      @if ($jobApplication->jobApplication->application_letter)
                      <a href="/backoffice/job-application/{{ $jobApplication->jobApplication->id }}/preview-application-letter" target="_blank"
                        class="btn btn-primary btn-sm">
                        <span class="fa fa-file-pdf"></span> 
                        {{-- Lihat --}}
                      </a>
                      @endif
                    </td>
                    <td>
                      <form action="/backoffice/interview/{{ $jobApplication->id }}/score" method="POST">
                      @csrf
                      <input type="number" name="score_verbal" value="{{ $jobApplication->score_verbal }}" class="form-control" required
                      oninvalid="this.setCustomValidity('Nilai lisan harus diisi')" oninput="this.setCustomValidity('')">
                    </td>
                    <td>
                      <input type="number" name="score_exam" value="{{ $jobApplication->score_exam }}" class="form-control" required
                      oninvalid="this.setCustomValidity('Nilai ujian tulis harus diisi')" oninput="this.setCustomValidity('')">
                    </td>
                    <td>
                      <input type="number" name="score_practice" value="{{ $jobApplication->score_practice }}" class="form-control" required
                      oninvalid="this.setCustomValidity('Nilai pendidikan harus diisi')" oninput="this.setCustomValidity('')">
                    </td>
                    <td>
                      @if ($jobApplication->final_score)
                        <b>{{ number_format(($jobApplication->score_verbal + $jobApplication->score_exam + $jobApplication->score_practice) / 3,3) }}</b>
                      @else
                        <b>0</b>
                      @endif
                    </td>
                    <td><b>{{ number_format($jobApplication->jobApplication->final_score,3) }}</b></td>
                    <td>
                      @if ($jobApplication->final_score)
                        <b>{{ number_format($jobApplication->final_score,3) }}</b>
                      @else
                        <b>0</b>
                      @endif
                    </td>
                    <td>
                      @if ($jobApplication->jobApplication->vacancy->score_interview == 'aktif')
                        @if ($jobApplication->jobApplication->status == "penilaian interview" || $jobApplication->jobApplication->status == "kualifikasi interview")
                          <button type="submit" class="btn btn-warning btn-sm">
                            <span class="fa fa-edit"></span>
                            @if ($jobApplication->final_score)
                              {{-- Ubah --}}
                            @else
                              {{-- Beri --}}
                            @endif 
                            {{-- nilai --}}
                          </button>
                        @endif
                      @endif
                    </td>
                    <td>{{ $jobApplication->jobApplication->status }}</td>
                    <td>
                      @if ($key + 1 < 3)
                        @if ($jobApplication->final_score && $jobApplication->jobApplication->status == "penilaian interview")
                          <button title="invite training" type="button" class="btn btn-success btn-sm" data-toggle="modal"
                            data-target="#invite-training-{{ $jobApplication->id }}">
                            <span class="fa fa-check"></span>
                          </button>
                        @endif
                      @endif
                    </td>
                    </form>
                  </tr>
                  @endforeach
                </tbody>
              </table>

              @foreach ($jobApplications as $key => $jobApplication)
                @include('backoffice.interview.modal.user')
                @if ($key + 1 < 3)
                  @include('backoffice.interview.modal.invite-training') 
                @endif
              @endforeach

            </div>

          </div>
        </div>

      </div>

    </div>
  </div>

</section>

@endsection