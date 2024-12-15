<div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 9999">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <form role="form" method="POST" action="/backoffice/vacancy/create" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Lowongan Kerja</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="card card-outline card-primary">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label>Lowongan Kerja <span class="text-danger">*</span></label>
                                        <input type="text" name="name"
                                            class="form-control @if($errors->has('name')) is-invalid @endif"
                                            placeholder="Lowongan kerja" value="{{ old('name') }}" required
                                            oninvalid="this.setCustomValidity('Lowongan kerja harus diisi')"
                                            oninput="this.setCustomValidity('')">
                                        @if($errors->has('name'))
                                        <small class="help-block" style="color: red">{{ $errors->first('name')
                                            }}</small>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Deskripsi <span class="text-danger">*</span></label>
                                        <textarea name="description" id="description"
                                            class="form-control @if($errors->has('description')) is-invalid @endif"
                                            placeholder="Deskripsi"></textarea>
                                        @if($errors->has('description'))
                                        <small class="help-block" style="color: red">{{ $errors->first('description')
                                            }}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Tipe <span class="text-danger">*</span></label>
                                        <select name="type" class="form-control" required
                                        oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('Tipe harus diisi')">
                                            <option value="">-- Pilih --</option>
                                            <option value="full time">Full Time</option>
                                            <option value="part time">Part Time</option>
                                            <option value="freelancer">Freelancer</option>
                                            <option value="internship">Internship</option>
                                        </select>
                                        @if($errors->has('type'))
                                        <small class="help-block" style="color: red">{{ $errors->first('type')
                                            }}</small>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Lowongan berakhir <span class="text-danger">*</span></label>
                                        <input type="date" name="end_date" min="{{ date('Y-m-d') }}"
                                            class="form-control @if($errors->has('end_date')) is-invalid @endif"
                                            placeholder="Lowongan berakhir" value="{{ old('end_date') }}" required
                                            oninvalid="this.setCustomValidity('Lowongan berakhir harus diisi')"
                                            oninput="this.setCustomValidity('')">
                                        @if($errors->has('end_date'))
                                        <small class="help-block" style="color: red">{{ $errors->first('end_date')
                                            }}</small>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Gaji mulai <span class="text-danger">*</span></label>
                                        <input type="text" name="start_salary"
                                            class="form-control @if($errors->has('start_salary')) is-invalid @endif"
                                            placeholder="Gaji mulai" value="{{ old('start_salary') }}" required
                                            oninvalid="this.setCustomValidity('Gaji mulai harus diisi')"
                                            oninput="this.setCustomValidity('')">
                                        @if($errors->has('start_salary'))
                                        <small class="help-block" style="color: red">{{ $errors->first('start_salary')
                                            }}</small>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Gaji sampai <span class="text-danger">*</span></label>
                                        <input type="text" name="end_salary"
                                            class="form-control @if($errors->has('end_salary')) is-invalid @endif"
                                            placeholder="Gaji sampai" value="{{ old('end_salary') }}" required
                                            oninvalid="this.setCustomValidity('Gaji sampai harus diisi')"
                                            oninput="this.setCustomValidity('')">
                                        @if($errors->has('end_salary'))
                                        <small class="help-block" style="color: red">{{ $errors->first('end_salary')
                                            }}</small>
                                        @endif
                                    </div>

                                    <div id="formInputSkill">
                                        <div class="form-group">
                                            <label for="skill[]">Skill </label>
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <input type="text" name="skill[]" placeholder="Skill"
                                                        class="form-control @if ($errors->has('skill')) is-invalid @endif"
                                                        value="{{ old('skill') }}" required
                                                        oninvalid="this.setCustomValidity('Skill harus diisi')"
                                                        oninput="this.setCustomValidity('')">
                                                </div>
                                                <div>
                                                    <button type="button" class="btn btn-success" id="addSkill">
                                                        <i class="fas fa-plus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal"><span
                            class="fa fa-arrow-left"></span> Kembali</button>
                    <button type="submit" class="btn btn-success"><span class="fa fa-save"></span> Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>