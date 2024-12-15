<div class="modal fade" id="score-training-{{ $jobApplication->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Hasil penilaian tahap akhir</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card card-outline card-primary">
                    <div class="card-body">
                        <p>Nilai teknis: <b>{{ $jobApplication->score_technical }}</b></p>
                        <p>Nilai kerja tim: <b>{{ $jobApplication->score_teamwork }}</b></p>
                        <p>Nilai komunikasi: <b>{{ $jobApplication->score_communication }}</b></p>
                        <p>Nilai pemecahan masalah: <b>{{ $jobApplication->score_problem_solving }}</b></p>
                        <p>Nilai sikap: <b>{{ $jobApplication->score_attitude }}</b></p>
                        <p>Nilai soft skills: <b>{{ $jobApplication->score_soft_skills }}</b></p>
                        <p>Nilai hasil training: <b>{{ number_format(( $jobApplication->score_technical + $jobApplication->score_teamwork + $jobApplication->score_communication + $jobApplication->score_problem_solving + $jobApplication->score_attitude + $jobApplication->score_soft_skills ) / 6,3) }}</b></p>
                        <p>Nilai hasil tahap 2: <b>{{ number_format($jobApplication->interview->final_score,3) }}</b></p>
                        <p>Nilai akhir: <b>{{ number_format($jobApplication->final_score,3) }}</b></p>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-warning" data-dismiss="modal">
                    <i class="fas fa-arrow-left"></i> Kembali
                </button>
            </div>
        </div>
    </div>
</div>
