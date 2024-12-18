<div class="modal fade" id="apply-job-{{ $vacancy->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 9999">
    <div class="modal-dialog modal-dialog-centered">
        <form action="/job/{{ $vacancy->id }}/apply" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Apply lamaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Anda yakin akan melamar sebagai {{ $vacancy->name }}?
                    <hr>
                    <div class="form-group">
                        <label for="application_letter">Surat Lamaran</label> 
                        <input type="file" name="application_letter" class="form-control" accept="application/pdf" required
                        oninvalid="this.setCustomValidity('Surat lamaran harus diisi')" oninput="this.setCustomValidity('')">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                    <button type="submit" class="btn btn-primary">Lamar</button>
                </div>
            </div>
        </form>
    </div>
</div>