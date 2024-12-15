<div class="modal fade" id="schedule-interview-{{ $vacancy->id }}">
    <div class="modal-dialog modal-lg">
        <form action="/backoffice/vacancy/{{ $vacancy->id }}/schedule-interview" method="POST">
        @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Jadwal interview {{ $vacancy->name }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="card card-outline card-primary">
                                <div class="card-header">
                                    <h3 class="card-title"><b>Jadwal interview</b></h3>
                                </div>
                                <div class="card-body">
                                    <h5><b>Tanggal: </b> 
                                        @if ($vacancy->interviewSchedule)
                                            {{ \Carbon\Carbon::parse($vacancy->interviewSchedule->date)->locale('id')->isoFormat('dddd, D MMMM YYYY') }}
                                        @else
                                            Belum ditentukan
                                        @endif
                                    </h5>
                                    <hr>
                                    <h5><b>Waktu: </b>
                                        @if ($vacancy->interviewSchedule)
                                            {{ \Carbon\Carbon::parse($vacancy->interviewSchedule->time)->locale('id')->isoFormat('HH:mm') }}
                                        @else
                                            Belum ditentukan
                                        @endif
                                    </h5>
                                    <hr>
                                    <h5><b>Lokasi: </b> 
                                        @if ($vacancy->interviewSchedule)
                                            {{ $vacancy->interviewSchedule->location }}
                                        @else
                                            Belum ditentukan
                                        @endif
                                    </h5>
                                    <hr>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card card-outline card-primary">
                                <div class="card-header">
                                    <h3 class="card-title"><b>
                                        @if ($vacancy->interviewSchedule)
                                            Ubah jadwal interview
                                        @else
                                            Tambah jadwal interview
                                        @endif
                                    </b></h3>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-4">
                                        <label for="date">Tanggal</label>
                                        <input type="date" name="date" id="date" class="form-control ml-2" required
                                        oninvalid="this.setCustomValidity('Tanggal harus diisi')" oninput="this.setCustomValidity('')">
                                    </div>
                                    <div class="d-flex align-items-center mb-4">
                                        <label for="time">Waktu</label>
                                        <input type="time" name="time" id="time" class="form-control ml-2" required
                                        oninvalid="this.setCustomValidity('Waktu harus diisi')" oninput="this.setCustomValidity('')">
                                    </div>
                                    <div class="form-group">
                                        <label for="location">Lokasi</label>
                                        <textarea name="location" id="location" rows="4" class="form-control" required
                                        oninvalid="this.setCustomValidity('Lokasi harus diisi')" oninput="this.setCustomValidity('')"></textarea>
                                    </div>
                                    <button class="btn btn-success btn-block" type="submit">
                                        <i class="fas fa-edit"></i> 
                                        @if ($vacancy->interviewSchedule)
                                            Ubah jadwal
                                        @else
                                            Tambah jadwal
                                        @endif
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-warning" data-dismiss="modal">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </button>
                    {{-- <button type="submit" class="btn btn-success">
                        <i class="fas fa-check"></i>
                    </button> --}}
                    {{-- <a href="/backoffice/job-application/{{ $vacancy->id }}/send-email" class="btn btn-success">
                        <i class="fas fa-envelope"></i> Kirim
                    </a> --}}
                </div>
            </div>
        </form>
    </div>
</div>
