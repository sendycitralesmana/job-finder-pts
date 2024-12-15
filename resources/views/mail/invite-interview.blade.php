@component('mail::message')



Undangan untuk mengikuti interview dengan data pelamar sebagai berikut: <br>
Nama: <b>{{ $jobApplication->user->name }}</b><br>
Nilai pengalaman: <b>{{ $jobApplication->score_experience }}</b><br>
Nilai keahlian: <b>{{ $jobApplication->score_skill }}</b><br>
Nilai pendidikan: <b>{{ $jobApplication->score_education }}</b><br>
Nilai akhir: <b>{{ $jobApplication->final_score }}</b>

<hr>

Interview akan dilaksanakan pada: <br>
Tanggal: <b>{{ \Carbon\Carbon::parse($jobApplication->vacancy->interviewSchedule->date)->locale('ID')->isoFormat('dddd, D MMMM Y') }}</b><br>
Waktu: <b>{{ $jobApplication->vacancy->interviewSchedule->time }}</b><br>
Lokasi: <b>{{ $jobApplication->vacancy->interviewSchedule->location }}</b>

<br>
{{ config('app.name') }}
@endcomponent