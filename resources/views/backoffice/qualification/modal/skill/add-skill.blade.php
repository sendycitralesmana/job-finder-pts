<div class="modal fade" id="add-skill-{{ $vacancy->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 9999">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form role="form" method="POST" action="/backoffice/vacancy/{{ $vacancy->id }}/skill/create" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Skill</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="card card-outline card-primary">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-12">

                                    <div id="formInputSkill">
                                        <div class="form-group">
                                            <label for="skill[]">Skill </label>
                                            <div class="d-flex justify-content-between">
                                            <input type="text" name="skill[]" placeholder="Skill"
                                                class="form-control @if ($errors->has('skill')) is-invalid @endif"
                                                value="{{ old('skill') }}" required
                                                oninvalid="this.setCustomValidity('Skill harus diisi')"
                                                oninput="this.setCustomValidity('')">
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