<div class="modal fade" id="send-email-{{ $jobApplication->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Kirim pesan email ke {{ $jobApplication->user->name }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card card-outline card-primary">
                    <div class="card-body">
                        <p>Apakah anda yakin akan kirim pesan email ke {{ $jobApplication->user->email }}?</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-warning" data-dismiss="modal">
                    <i class="fas fa-arrow-left"></i> Kembali
                </button>
                <a href="/backoffice/job-application/{{ $jobApplication->id }}/send-email" class="btn btn-success">
                    <i class="fas fa-envelope"></i> Kirim
                </a>
            </div>
        </div>
    </div>
</div>
