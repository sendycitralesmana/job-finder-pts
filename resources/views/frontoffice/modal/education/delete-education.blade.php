<div class="modal fade" id="delete-education-{{ $education->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 9999">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus pendidikan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah anda yakin akan menghapus pendidikan?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                <a href="/account/education/{{ $education->id }}/delete" class="btn head-btn1">
                    Hapus
                </a>
            </div>
        </div>
    </div>
</div>