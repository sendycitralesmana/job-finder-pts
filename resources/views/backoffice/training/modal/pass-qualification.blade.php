<div class="modal fade" id="pass-qualification-{{ $jobApplication->id }}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Lulus kualifikasi</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card card-outline card-primary">
                    <div class="card-body">
                        <div class="row">
                            <p>Pelamar dengan nama <b>{{ $jobApplication->interview->jobApplication->user->name }}</b> dan penilaian sebagai berikut: </p>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <p>
                                    Penilaian pemberkasan: <br>
                                    Nilai pengalaman: <b>{{ $jobApplication->interview->jobApplication->score_experience }}</b><br>
                                    Nilai keahlian: <b>{{ $jobApplication->interview->jobApplication->score_skill }}</b><br>
                                    Nilai pendidikan: <b>{{ $jobApplication->interview->jobApplication->score_education }}</b><br>
                                    Hasil nilai: <b>{{ number_format($jobApplication->interview->jobApplication->final_score,3)}}</b>
                                </p>
                            </div>
                            <div class="col-md-4">
                                <p>
                                    Penilaian interview: <br>
                                    Nilai lisan: <b>{{ $jobApplication->interview->score_verbal }}</b><br>
                                    Nilai ujian tulis: <b>{{ $jobApplication->interview->score_exam }}</b><br>
                                    Nilai ujian praktek: <b>{{ $jobApplication->interview->score_practice }}</b><br>
                                    Hasil nilai: <b>{{ number_format(( $jobApplication->interview->score_verbal + $jobApplication->interview->score_exam + $jobApplication->interview->score_practice ) / 3,3) }}</b><br>
                                </p>
                            </div>
                            <div class="col-md-4">
                                <p>
                                    Penilaian training: <br>
                                    Nilai teknis: <b>{{ $jobApplication->score_technical }}</b><br>
                                    Nilai kerja tim: <b>{{ $jobApplication->score_teamwork }}</b><br>
                                    Nilai komunikasi: <b>{{ $jobApplication->score_communication }}</b><br>
                                    Nilai pemecahan masalah: <b>{{ $jobApplication->score_problem_solving }}</b><br>
                                    Nilai sikap: <b>{{ $jobApplication->score_attitude }}</b><br>
                                    Nilai soft skills: <b>{{ $jobApplication->score_soft_skills }}</b><br>
                                    Hasil nilai: <b>{{ number_format(( $jobApplication->score_technical + $jobApplication->score_teamwork + $jobApplication->score_communication + $jobApplication->score_problem_solving + $jobApplication->score_attitude + $jobApplication->score_soft_skills ) / 6,3) }}</b><br>
                                </p>
                            </div>
                        </div>
                        <p>
                            Nilai interview & pemberkasan: <b>{{ number_format($jobApplication->interview->final_score,3) }}</b><br>
                            Penghitungan nilai: <b>( Hasil nilai pemberkasan & hasil nilai interview + hasil nilai training ) / 2</b><br>
                            Simulasi: <b>({{ number_format($jobApplication->interview->final_score,3) }} + {{ number_format(( $jobApplication->score_technical + $jobApplication->score_teamwork + $jobApplication->score_communication + $jobApplication->score_problem_solving + $jobApplication->score_attitude + $jobApplication->score_soft_skills ) / 6,3) }}) / 2</b><br>
                            Nilai akhir: <b>{{ number_format($jobApplication->final_score,3) }}</b>
                        </p>
                        {{-- <hr>
                        @if ($jobApplication->interview->jobApplication->vacancy->interviewSchedule)
                            <p>Tanggal: <b>{{ \Carbon\Carbon::parse($jobApplication->interview->jobApplication->vacancy->interviewSchedule->date)->locale('ID')->isoFormat('dddd, D MMMM Y') }}</b></p>
                            <p>Waktu: <b>{{ $jobApplication->interview->jobApplication->vacancy->interviewSchedule->time }}</b></p>
                            <p>Lokasi: <b>{{ $jobApplication->interview->jobApplication->vacancy->interviewSchedule->location }}</b></p>
                        @else
                            <p>Belum ada jadwal training</p>
                        @endif  --}}
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-warning" data-dismiss="modal">
                    <i class="fas fa-arrow-left"></i> Kembali
                </button>
                @if ($jobApplication->interview->jobApplication->vacancy->interviewSchedule)
                    <a href="/backoffice/training/{{ $jobApplication->id }}/invite-qualification" class="btn btn-success">
                        <i class="fas fa-envelope"></i> Undang {{ $jobApplication->interview->jobApplication->user->name }}
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
