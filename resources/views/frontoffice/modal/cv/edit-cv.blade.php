<div class="modal fade" id="edit-cv-{{ auth()->user()->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 9999">
    <div class="modal-dialog modal-dialog-centered">
        <form action="/account/{{ auth()->user()->id }}/update-cv" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ganti CV</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="file" class="form-control" name="cv" required accept="application/pdf"
                    oninvalid="this.setCustomValidity('CV harus diisi')" oninput="this.setCustomValidity('')">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                    <button type="submit" class="btn btn-primary">Ganti</button>
                </div>
            </div>
        </form>
    </div>
</div>