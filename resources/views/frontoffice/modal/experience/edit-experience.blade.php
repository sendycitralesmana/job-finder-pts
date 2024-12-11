<div class="modal fade" id="edit-experience-{{ $experience->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 9999">
    <div class="modal-dialog modal-dialog-centered">
        <form action="/account/experience/{{ $experience->id }}/update" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah pengalaman</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="company">Perusahaan</label>
                        <input type="text" class="form-control" name="company" id="company" required value="{{ $experience->company }}"
                        oninvalid="this.setCustomValidity('Perusahaan harus diisi')" oninput="this.setCustomValidity('')">
                    </div>
                    <div class="form-group">
                        <label for="position">Posisi</label>
                        <input type="text" class="form-control" name="position" id="position" required value="{{ $experience->position }}"
                        oninvalid="this.setCustomValidity('Posisi harus diisi')" oninput="this.setCustomValidity('')">
                    </div>
                    <div class="form-group">
                        <label for="type">Tipe</label>
                        <input type="text" class="form-control" name="type" id="type" required value="{{ $experience->type }}" placeholder="contoh: Full Time / Part Time / Internship / Freelance / Remote / Contract"
                        oninvalid="this.setCustomValidity('Tipe harus diisi, contoh: Full Time / Part Time / Internship / Freelance / Remote / Contract')" oninput="this.setCustomValidity('')">
                        <small>Contoh: Full Time / Part Time / Internship / Freelance / Remote / Contract</small>
                    </div>
                    {{-- <div class="d-flex">
                        <div class="form-group">
                            <div>
                                <label for="type">Type</label>
                            </div>
                            <div>
                                <select name="type" class="form-control" id="">
                                    <option value="Full Time" @if ($experience->type == 'Full Time') selected @endif>Full Time</option>
                                    <option value="Part Time" @if ($experience->type == 'Part Time') selected @endif>Part Time</option>
                                    <option value="Internship" @if ($experience->type == 'Internship') selected @endif>Internship</option>
                                    <option value="Freelance" @if ($experience->type == 'Freelance') selected @endif>Freelance</option>
                                    <option value="Remote" @if ($experience->type == 'Remote') selected @endif>Remote</option>
                                    <option value="Contract" @if ($experience->type == 'Contract') selected @endif>Contract</option>
                                </select>
                            </div>
                        </div>
                    </div> --}}
                    <div class="form-group">
                        <label for="start_year">Tahun Mulai</label>
                        <input type="text" class="form-control" name="start_year" id="start_year" required value="{{ $experience->start_year }}"
                        oninvalid="this.setCustomValidity('Tahun mulai harus diisi')" oninput="this.setCustomValidity('')">
                    </div>
                    <div class="form-group">
                        <label for="end_year">Tahun Selesai</label>
                        <input type="text" class="form-control" name="end_year" id="end_year" required value="{{ $experience->end_year }}"
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