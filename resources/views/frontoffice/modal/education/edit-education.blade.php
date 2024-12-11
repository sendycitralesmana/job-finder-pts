<div class="modal fade" id="edit-education-{{ $education->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 9999">
    <div class="modal-dialog modal-dialog-centered">
        <form action="/account/education/{{ $education->id }}/update" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah pendidikan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="school">Sekolah</label>
                        <input type="text" class="form-control" name="school" id="school" required value="{{ $education->school }}"
                        oninvalid="this.setCustomValidity('Sekolah harus diisi')" oninput="this.setCustomValidity('')">
                    </div>
                    <div class="form-group">
                        <label for="study">Studi / Jurusan</label>
                        <input type="text" class="form-control" name="study" id="study" required value="{{ $education->study }}"
                        oninvalid="this.setCustomValidity('Studi / jurusan harus diisi')" oninput="this.setCustomValidity('')">
                    </div>
                    <div class="form-group">
                        <label for="start_year">Tahun Mulai</label>
                        <input type="text" class="form-control" name="start_year" id="start_year" required value="{{ $education->start_year }}"
                        oninvalid="this.setCustomValidity('Tahun mulai harus diisi')" oninput="this.setCustomValidity('')">
                    </div>
                    <div class="form-group">
                        <label for="end_year">Tahun Selesai</label>
                        <input type="text" class="form-control" name="end_year" id="end_year" required value="{{ $education->end_year }}"
                        oninvalid="this.setCustomValidity('Tahun selesai harus diisi')" oninput="this.setCustomValidity('')">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                    <button type="submit" class="btn btn-primary">Ubah</button>
                </div>
            </div>
        </form>
    </div>
</div>