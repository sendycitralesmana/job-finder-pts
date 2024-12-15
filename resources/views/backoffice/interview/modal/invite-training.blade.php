<div class="modal fade" id="invite-training-{{ $jobApplication->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Undang pelamar untuk mengikuti training</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card card-outline card-primary">
                    <div class="card-body">
                        <p>Pelamar dengan nama <b>{{ $jobApplication->jobApplication->user->name }}</b> dan nilai akhir <b>{{ number_format($jobApplication->final_score,3) }}</b> memenuhi kualifikasi untuk lowongan kerja {{ $jobApplication->jobApplication->vacancy->name }}</p>
                        <p>Apakah anda yakin akan mengundang pelamar ke sesi training dengan jadwal:</p>
                        <hr>
                        @if ($jobApplication->jobApplication->vacancy->trainingSchedule)
                            <p>Tanggal: <b>{{ \Carbon\Carbon::parse($jobApplication->jobApplication->vacancy->trainingSchedule->date)->locale('ID')->isoFormat('dddd, D MMMM Y') }}</b></p>
                            <p>Waktu: <b>{{ $jobApplication->jobApplication->vacancy->trainingSchedule->time }}</b></p>
                            <p>Lokasi: <b>{{ $jobApplication->jobApplication->vacancy->trainingSchedule->location }}</b></p>
                        @else
                            <p>Belum ada jadwal training</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-warning" data-dismiss="modal">
                    <i class="fas fa-arrow-left"></i> Kembali
                </button>
                @if ($jobApplication->jobApplication->vacancy->trainingSchedule)
                    <a href="/backoffice/interview/{{ $jobApplication->id }}/invite-training" class="btn btn-success">
                        <i class="fas fa-envelope"></i> Undang {{ $jobApplication->jobApplication->user->name }}
                    </a>
                @else
                    <button class="btn btn-warning">
                        <i class="fas fa-exclamation-triangle"></i> Tambah jadwal
                    </button>
                @endif
            </div>
        </div>
    </div>
</div>
