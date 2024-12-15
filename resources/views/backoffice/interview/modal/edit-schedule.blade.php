<div class="modal fade" id="edit-schedule-{{ $schedule->vacancy->id }}">
    <div class="modal-dialog">
        <form action="/backoffice/vacancy/{{ $schedule->vacancy->id }}/schedule-interview" method="POST">
        @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ubah jadwal interview</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card card-outline card-primary">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-4">
                                <label for="date">Tanggal</label>
                                <input type="date" name="date" id="date" class="form-control ml-2" required value="{{ $schedule->date }}"
                                oninvalid="this.setCustomValidity('Tanggal harus diisi')" oninput="this.setCustomValidity('')">
                            </div>
                            <div class="d-flex align-items-center mb-4">
                                <label for="time">Waktu</label>
                                <input type="time" name="time" id="time" class="form-control ml-2" required value="{{ $schedule->time }}"
                                oninvalid="this.setCustomValidity('Waktu harus diisi')" oninput="this.setCustomValidity('')">
                            </div>
                            <div class="form-group">
                                <label for="location">Lokasi</label>
                                <textarea name="location" id="location" rows="4" class="form-control" required
                                oninvalid="this.setCustomValidity('Lokasi harus diisi')" oninput="this.setCustomValidity('')">{{ $schedule->location }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-warning" data-dismiss="modal">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </button>
                    <button type="submit" class="btn btn-success"><span class="fa fa-edit"></span> Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
