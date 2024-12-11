@extends('frontoffice.layout.main')

@section('content')

<!-- Hero Area Start-->
<div class="slider-area ">
    <div class="single-slider section-overly slider-height2 d-flex align-items-center"
        data-background="{{ asset('assets/jobfinder-master/assets/img/hero/about.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center">
                        <h2>Your Account</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Hero Area End -->
<div style="margin-top: 150px">

</div>

<div class="container">
    <form action="/account/{{ auth()->user()->id }}/update" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h3 class="card-title">Ubah data</h3>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <form action="/account/{{ auth()->user()->id }}/update" method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Nama</label>
                                        <input type="text" class="form-control" name="name" id="name" required
                                        oninvalid="this.setCustomValidity('Nama harus diisi')" oninput="this.setCustomValidity('')"
                                            value="{{ auth()->user()->name }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="gender">Jenis kelamin</label>
                                        <input type="text" class="form-control" name="gender" id="gender" required
                                        oninvalid="this.setCustomValidity('Jenis kelamin harus diisi')" oninput="this.setCustomValidity('')"
                                            value="{{ auth()->user()->gender }}">
                                        <small>harus diisi laki-laki / perempuan</small>
                                    </div>
                                    {{-- <div class="d-flex justify-content-around">
                                        <div class="form-group">
                                            <div>
                                                <label for="gender">Jenis Kelamin</label>
                                            </div>
                                            <div>
                                                <select name="gender" id="gender" class="form-control" required
                                                oninvalid="this.setCustomValidity('Jenis Kelamin harus diisi')" oninput="this.setCustomValidity('')">
                                                    <option value="">Pilih Jenis Kelamin</option>
                                                    <option value="Laki-laki" {{ auth()->user()->gender == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                                    <option value="Perempuan" {{ auth()->user()->gender == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div>
                                                <label for="religion">Agama</label>
                                            </div>
                                            <div>
                                                <select name="religion" id="religion" class="form-control" required
                                                oninvalid="this.setCustomValidity('Agama harus diisi')" oninput="this.setCustomValidity('')">
                                                    <option value="">Pilih Agama</option>
                                                    <option value="Islam" {{ auth()->user()->religion == 'Islam' ? 'selected' : '' }}>Islam</option>
                                                    <option value="Kristen" {{ auth()->user()->religion == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                                                    <option value="Katolik" {{ auth()->user()->religion == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                                                    <option value="Hindu" {{ auth()->user()->religion == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                                    <option value="Budha" {{ auth()->user()->religion == 'Budha' ? 'selected' : '' }}>Budha</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div> --}}
                                    <div class="form-group">
                                        <label for="address">Alamat</label>
                                        <textarea name="address" id="address" class="form-control" required
                                        oninvalid="this.setCustomValidity('Alamat harus diisi')" oninput="this.setCustomValidity('')">{{ auth()->user()->address }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="religion">Agama</label>
                                        <input type="text" class="form-control" name="religion" id="religion" required
                                        oninvalid="this.setCustomValidity('Agama harus diisi')" oninput="this.setCustomValidity('')"
                                            value="{{ auth()->user()->religion }}">
                                        <small>contoh: islam, kristen, katolik, hindu, budha, dsb</small>
                                    </div>
                                    <div class="form-group">
                                        <label for="place_birth">Tempat Lahir</label>
                                        <input type="place_birth" class="form-control" name="place_birth" id="place_birth" required
                                        oninvalid="this.setCustomValidity('Tempat Lahir harus diisi')" oninput="this.setCustomValidity('')"
                                            value="{{ auth()->user()->place_birth }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="date_birth">Tanggal Lahir</label>
                                        <input type="date" class="form-control" name="date_birth" id="date_birth" required
                                        oninvalid="this.setCustomValidity('Tanggal Lahir harus diisi')" oninput="this.setCustomValidity('')"
                                            value="{{ auth()->user()->date_birth }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="no_hp">No HP</label>
                                        <input type="text" class="form-control" name="no_hp" id="no_hp" required
                                        oninvalid="this.setCustomValidity('No HP harus diisi')" oninput="this.setCustomValidity('')"
                                            value="{{ auth()->user()->no_hp }}">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary f-right">Simpan</button>
                    </div>

                </div>
            </div>
        </div>
    </form>
</div>

<div style="margin-top: 150px">

</div>

@endsection