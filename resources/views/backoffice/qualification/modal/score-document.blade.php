<div class="modal fade" id="score-document-{{ $jobApplication->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Hasil penilaian tahap 1</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card card-outline card-primary">
                    <div class="card-body">
                        <p>Nilai pengalaman: <b>{{ $jobApplication->interview->jobApplication->score_experience }}</b></p>
                        <p>Nilai keahlian: <b>{{ $jobApplication->interview->jobApplication->score_skill }}</b></p>
                        <p>Nilai pendidikan: <b>{{ $jobApplication->interview->jobApplication->score_education }}</b></p>
                        <p>Hasil nilai: <b>{{ number_format($jobApplication->interview->jobApplication->final_score,3)}}</b></p>
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
