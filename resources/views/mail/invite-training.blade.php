@component('mail::message')

Undangan untuk mengikuti training dengan data pelamar sebagai berikut: <br>
Nama: <b>{{ $interview->jobApplication->user->name }}</b><br>
Nilai pengalaman: <b>{{ $interview->jobApplication->score_experience }}</b><br>
Nilai keahlian: <b>{{ $interview->jobApplication->score_skill }}</b><br>
Nilai pendidikan: <b>{{ $interview->jobApplication->score_education }}</b><br>
Nilai lisan: <b>{{ $interview->score_verbal }}</b><br>
Nilai ujian tulis: <b>{{ $interview->score_exam }}</b><br>
Nilai praktek: <b>{{ $interview->score_practice }}</b><br>
Nilai interview: <b>{{ ($interview->score_verbal + $interview->score_exam + $interview->score_practice) / 3 }}</b><br>
Nilai pemberkasan: <b>{{ $interview->jobApplication->final_score }}</b><br>
Nilai akhir: <b>{{ (($interview->score_verbal + $interview->score_exam + $interview->score_practice) / 3 + $interview->jobApplication->final_score) / 2 }}</b>

<hr>

Training akan dilaksanakan pada: <br>
Tanggal: <b>{{ \Carbon\Carbon::parse($interview->jobApplication->vacancy->trainingSchedule->date)->locale('ID')->isoFormat('dddd, D MMMM Y') }}</b><br>
Waktu: <b>{{ $interview->jobApplication->vacancy->trainingSchedule->time }}</b><br>
Lokasi: <b>{{ $interview->jobApplication->vacancy->trainingSchedule->location }}</b>

<br>
{{ config('app.name') }}
@endcomponent