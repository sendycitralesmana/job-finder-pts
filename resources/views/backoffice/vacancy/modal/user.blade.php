<div class="modal fade" id="detail-{{ $jobApplication->user->id }}">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detail Pelamar</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="card card-outline card-primary">
                    <div class="card-body">
                        <div class=" text-center">
                            <label for="foto">Foto</label>
                            @if ($jobApplication->user->foto)
                                <img src="{{ Storage::disk('local')->url($jobApplication->user->foto) }}" 
                                class="gambarPreviewjobApplication->user img-fluid d-block" alt=""
                                style="width: 150px; height: 150px; margin-left: auto; margin-right: auto">
                            @else
                                <img src="{{ asset('images/profile-default.jpg') }}" class="gambarPreviewjobApplication->user rounded img-fluid mb-3 d-block" alt=""
                                style="width: 150px; height: 150px; margin-left: auto; margin-right: auto">
                            @endif
                        </div>
                        <hr>

                        <div class="row">
                            <div class="col-md-6">
                                <div class=" d-flex justify-content-between pl-4 pr-4">
                                    <p>
                                        <b>Nama:</b> 
                                    </p>
                                    <p>
                                        {{ $jobApplication->user->name }}
                                    </p>
                                </div>
                                <div class=" d-flex justify-content-between pl-4 pr-4">
                                    <p>
                                        <b>Email:</b> 
                                    </p>
                                    <p>
                                        {{ $jobApplication->user->email }}
                                    </p>
                                </div>
                                <div class=" d-flex justify-content-between pl-4 pr-4">
                                    <p>
                                        <b>Peran:</b> 
                                    </p>
                                    <p>
                                        {{ $jobApplication->user->role->name }}
                                    </p>
                                </div>
                                <div class=" d-flex justify-content-between pl-4 pr-4">
                                    <p>
                                        <b>Jenis Kelamin:</b> 
                                    </p>
                                    @if ($jobApplication->user->gender == null)
                                        <p class="badge badge-warning">
                                            <i class="fa fa-exclamation-triangle"></i> Belum melengkapi data
                                        </p>
                                    @else
                                        <p>
                                            {{ $jobApplication->user->gender }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class=" d-flex justify-content-between pl-4 pr-4">
                                    <p>
                                        <b>Agama:</b> 
                                    </p>
                                    @if ($jobApplication->user->religion == null)
                                        <p class="badge badge-warning">
                                            <i class="fa fa-exclamation-triangle"></i> Belum melengkapi data
                                        </p>
                                    @else
                                        <p>
                                            {{ $jobApplication->user->religion }}
                                        </p>
                                    @endif
                                </div>
                                <div class=" d-flex justify-content-between pl-4 pr-4">
                                    <p>
                                        <b>Tempat, Tanggal Lahir:</b> 
                                    </p>
                                    @if ($jobApplication->user->place_birth == null  && $jobApplication->user->date_birth == null)
                                        <p class="badge badge-warning">
                                            <i class="fa fa-exclamation-triangle"></i> Belum melengkapi data
                                        </p>
                                    @else
                                        <p>
                                            {{-- {{ $jobApplication->user->place_birth }}, {{ date('d F Y', strtotime($jobApplication->user->date_birth)) }} --}}
                                            {{ $jobApplication->user->place_birth }} / {{ \Carbon\Carbon::parse($jobApplication->user->date_birth)->locale('id')->isoFormat('dddd, D MMMM YYYY') }}
                                        </p>
                                    @endif
                                </div>
                                <div class=" d-flex justify-content-between pl-4 pr-4">
                                    <p>
                                        <b>Alamat:</b> 
                                    </p>
                                    @if ($jobApplication->user->address == null)
                                        <p class="badge badge-warning">
                                            <i class="fa fa-exclamation-triangle"></i> Belum melengkapi data
                                        </p>
                                    @else
                                        <p>
                                            {{ $jobApplication->user->address }}
                                        </p>
                                    @endif
                                </div>
                                <div class=" d-flex justify-content-between pl-4 pr-4">
                                    <p>
                                        <b>No Hp:</b> 
                                    </p>
                                    @if ($jobApplication->user->no_hp == null)
                                        <p class="badge badge-warning">
                                            <i class="fa fa-exclamation-triangle"></i> Belum melengkapi data
                                        </p>
                                    @else
                                        <p>
                                            {{ $jobApplication->user->no_hp }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-outline card-primary">
                            <div class="card-header">
                                <h3 class="card-title">
                                    Pengalaman
                                </h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    @foreach ($jobApplication->user->experiences as $experience)
                                        <div class="col-md-4">
                                            <div class="d-flex align-items-center">
                                                <div class="mr-3">
                                                    <span class="fa fa-briefcase fa-2x"></span>
                                                </div>
                                                <div>
                                                    <h4>{{ $experience->position }}</h4>
                                                    <p>{{ $experience->company }} <br>
                                                    {{ $experience->type }} / {{ $experience->start_year }} - {{ $experience->end_year }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-outline card-primary">
                            <div class="card-header">
                                <h3 class="card-title">
                                    Pendidikan
                                </h3>
                            </div>
                            <div class="card-body">
                                @foreach ($jobApplication->user->educations as $education)
                                    <div class="d-flex align-items-center">
                                        <div class="mr-3">
                                            <span class="fa fa-graduation-cap fa-2x"></span>
                                        </div>
                                        <div class="">
                                            <h4>{{ $education->school }}</h4>
                                            <p>{{ $education->study }} / {{ $education->start_year }} - {{ $education->end_year }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card card-outline card-primary">
                            <div class="card-header">
                                <h3 class="card-title">
                                     Keahlian
                                </h3>
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-center flex-wrap">
                                    @foreach ($jobApplication->user->skills as $skill)
                                        <div class="mx-1">
                                            <h4>
                                                <span class="badge badge-primary">{{ $skill->skill }}</span>
                                            </h4>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
