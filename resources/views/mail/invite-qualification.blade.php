@component('mail::message')

Selamat anda memenuhi kualifikasi untuk bergabung dengan perusahaan kami <br>
Berikut data lamaran anda: <br>

Posisi: <b>{{ $training->interview->jobApplication->vacancy->name }}</b><br>
<hr>
Tahap 1 - penilaian pemberkasan: <br>
Nilai pengalaman: <b>{{ $training->interview->jobApplication->score_experience }}</b><br>
Nilai keahlian: <b>{{ $training->interview->jobApplication->score_skill }}</b><br>
Nilai pendidikan: <b>{{ $training->interview->jobApplication->score_education }}</b><br>
Hasil nilai: <b>{{ number_format($training->interview->jobApplication->final_score,3)}}</b><br>
<hr>
Tahap 2 - penilaian interview: <br>
Nilai lisan: <b>{{ $training->interview->score_verbal }}</b><br>
Nilai ujian tulis: <b>{{ $training->interview->score_exam }}</b><br>
Nilai ujian praktek: <b>{{ $training->interview->score_practice }}</b><br>
Hasil nilai: <b>{{ number_format(( $training->interview->score_verbal + $training->interview->score_exam + $training->interview->score_practice ) / 3,3) }}</b><br>
<hr>
Tahap 3 - penilaian training: <br>
Nilai teknis: <b>{{ $training->score_technical }}</b><br>
Nilai kerja tim: <b>{{ $training->score_teamwork }}</b><br>
Nilai komunikasi: <b>{{ $training->score_communication }}</b><br>
Nilai pemecahan masalah: <b>{{ $training->score_problem_solving }}</b><br>
Nilai sikap: <b>{{ $training->score_attitude }}</b><br>
Nilai soft skills: <b>{{ $training->score_soft_skills }}</b><br>
Hasil nilai: <b>{{ number_format(( $training->score_technical + $training->score_teamwork + $training->score_communication + $training->score_problem_solving + $training->score_attitude + $training->score_soft_skills ) / 6,3) }}</b><br>
<hr>
Nilai interview & pemberkasan: <b>{{ number_format($training->interview->final_score,3) }}</b><br>
Penghitungan nilai: <b>( Hasil nilai pemberkasan & hasil nilai interview + hasil nilai training ) / 2</b><br>
Simulasi: <b>({{ number_format($training->interview->final_score,3) }} + {{ number_format(( $training->score_technical + $training->score_teamwork + $training->score_communication + $training->score_problem_solving + $training->score_attitude + $training->score_soft_skills ) / 6,3) }}) / 2</b><br>
Nilai akhir: <b>{{ number_format($training->final_score,3) }}</b>

<br>
{{ config('app.name') }}
@endcomponent