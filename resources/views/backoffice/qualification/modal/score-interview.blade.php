<div class="modal fade" id="score-interview-{{ $jobApplication->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Hasil penilaian tahap 2</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card card-outline card-primary">
                    <div class="card-body">
                        <p>Nilai lisan: <b>{{ $jobApplication->interview->score_verbal }}</b></p>
                        <p>Nilai ujian tulis: <b>{{ $jobApplication->interview->score_exam }}</b></p>
                        <p>Nilai ujian praktek: <b>{{ $jobApplication->interview->score_practice }}</b></p>
                        <p>Nilai hasil interview: <b>{{ number_format(( $jobApplication->interview->score_verbal + $jobApplication->interview->score_exam + $jobApplication->interview->score_practice ) / 3,3) }}</b></p>
                        <p>Nilai hasil tahap 1: <b>{{ number_format($jobApplication->interview->jobApplication->final_score,3) }}</b></p>
                        <p>Nilai akhir: <b>{{ number_format($jobApplication->interview->final_score,3) }}</b></p>
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
