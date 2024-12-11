<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 9999">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form role="form" method="POST" action="/backoffice/office/update" enctype="multipart/form-data">
                {{ csrf_field() }}
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Kantor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="card card-outline card-primary">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Kantor <span class="text-danger">*</span></label>
                                <input type="text"  name="name" class="form-control @if($errors->has('name')) is-invalid @endif" placeholder="Kantor" value="{{ $office->name }}"
                                required oninvalid="this.setCustomValidity('Kantor harus diisi')" oninput="this.setCustomValidity('')">
                                @if($errors->has('name'))
                                <small class="help-block" style="color: red">{{ $errors->first('name') }}</small>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Lokasi <span class="text-danger">*</span></label>
                                <textarea name="address" class="form-control @if($errors->has('address')) is-invalid @endif" placeholder="Lokasi" required
                                oninvalid="this.setCustomValidity('Lokasi harus diisi')" oninput="this.setCustomValidity('')">{{ $office->address }}</textarea>
                                @if($errors->has('address'))
                                <small class="help-block" style="color: red">{{ $errors->first('address') }}</small>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>No Telp <span class="text-danger">*</span></label>
                                <input type="text"  name="no_telp" class="form-control @if($errors->has('no_telp')) is-invalid @endif" placeholder="No Telp" value="{{ $office->no_telp }}"
                                required oninvalid="this.setCustomValidity('No Telp harus diisi')" oninput="this.setCustomValidity('')">
                                @if($errors->has('no_telp'))
                                <small class="help-block" style="color: red">{{ $errors->first('no_telp') }}</small>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Email <span class="text-danger">*</span></label>
                                <input type="text"  name="email" class="form-control @if($errors->has('email')) is-invalid @endif" placeholder="Email" value="{{ $office->email }}"
                                required oninvalid="this.setCustomValidity('Email harus diisi')" oninput="this.setCustomValidity('')">
                                @if($errors->has('email'))
                                <small class="help-block" style="color: red">{{ $errors->first('email') }}</small>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="fa fa-arrow-left"></span> Kembali</button>
                    <button type="submit" class="btn btn-success"><span class="fa fa-edit"></span> Ubah</button>
                </div>
            </form>
        </div>
    </div>
</div>