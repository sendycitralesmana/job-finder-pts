<div class="modal fade" id="add-experience-{{ auth()->user()->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 9999">
    <div class="modal-dialog modal-dialog-centered">
        <form action="/account/{{ auth()->user()->id }}/experience/create" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah pengalaman</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="company">Perusahaan</label>
                        <input type="text" class="form-control" name="company" id="company" required
                        oninvalid="this.setCustomValidity('Perusahaan harus diisi')" oninput="this.setCustomValidity('')">
                    </div>
                    <div class="form-group">
                        <label for="position">Posisi</label>
                        <input type="text" class="form-control" name="position" id="position" required
                        oninvalid="this.setCustomValidity('Posisi harus diisi')" oninput="this.setCustomValidity('')">
                    </div>
                    <div class="form-group">
                        <label for="type">Tipe</label>
                        <input type="text" class="form-control" name="type" id="type" required placeholder="contoh: Full Time / Part Time / Internship / Freelance / Remote / Contract"
                        oninvalid="this.setCustomValidity('Tipe harus diisi, contoh: Full Time / Part Time / Internship / Freelance / Remote / Contract')" oninput="this.setCustomValidity('')">
                        <small>Contoh: Full Time / Part Time / Internship / Freelance / Remote / Contract</small>
                    </div>
                    {{-- <div class="d-flex">
                        <div class="form-group">
                            <div>
                                <label for="type">Tipe</label>
                            </div>
                            <div class="select-form">
                                <div class="select-itms">
                                    <select name="type" class="d-block form-control" id="type" required
                                    oninvalid="this.setCustomValidity('Tipe harus diisi')" oninput="this.setCustomValidity('')">
                                        <option value="">Pilih Tipe</option>
                                        <option value="Full Time">Full Time</option>
                                        <option value="Part Time">Part Time</option>
                                        <option value="Internship">Internship</option>
                                        <option value="Freelance">Freelance</option>
                                        <option value="Remote">Remote</option>
                                        <option value="Contract">Contract</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <div class="form-group">
                        <label for="start_year">Tahun Mulai</label>
                        <input type="text" class="form-control" name="start_year" id="start_year" required
                        oninvalid="this.setCustomValidity('Tahun mulai harus diisi')" oninput="this.setCustomValidity('')">
                    </div>
                    <div class="form-group">
                        <label for="end_year">Tahun Selesai</label>
                        <input type="text" class="form-control" name="end_year" id="end_year" required
                        oninvalid="this.setCustomValidity('Tahun selesai harus diisi')" oninput="this.setCustomValidity('')">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>