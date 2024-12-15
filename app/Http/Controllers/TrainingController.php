<?php

namespace App\Http\Controllers;

use App\Mail\InviteQualificationMail;
use App\Models\JobApplication;
use App\Models\Training;
use App\Models\TrainingSchedule;
use App\Models\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class TrainingController extends Controller
{
    public function index(Request $request)
    {
        $schedules = TrainingSchedule::orderBy('id', 'desc')->get();
        $getVacancies = Vacancy::get();

        if ($request->name) {
            $name = $request->name;
        } else {
            $name = null;
        }

        return view('backoffice.training.index', compact('schedules', 'getVacancies', 'name'));
    }

    public function detail($id)
    {
        $schedule = TrainingSchedule::find($id);
        $jobApplications = Training::orderBy('final_score', 'desc')->whereHas('interview.jobApplication', function ($query) use ($schedule) {
            $query->where('vacancy_id', $schedule->vacancy_id);
        })->get();
        return view('backoffice.training.detail', compact('schedule', 'jobApplications'));
    }

    public function score(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $training = Training::find($id);
            $jobApplication = JobApplication::find($training->interview->job_application_id);
            $jobApplication->status = "penilaian training";
            // dd($jobApplication);
            $jobApplication->save();

            $training->score_technical = $request->score_technical;
            $training->score_teamwork = $request->score_teamwork;
            $training->score_communication = $request->score_communication;
            $training->score_problem_solving = $request->score_problem_solving;
            $training->score_attitude = $request->score_attitude;
            $training->score_soft_skills = $request->score_soft_skills;
            $score_training = ($training->score_technical + $training->score_teamwork + $training->score_communication + $training->score_problem_solving + $training->score_attitude + $training->score_soft_skills) / 6;
            $score_interview = $training->interview->final_score;
            $training->final_score = ($score_training + $score_interview) / 2;
            // dd('nilai training ' . $score_training . ' nilai interview + pemberkasan ' . $score_interview . ' nilai akhir ' . $training->final_score);
            $training->save();

            DB::commit();
            return redirect()->back()->with('success', 'Penilaian pelamar telah disimpan');
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    public function inviteQualification($id)
    {
        $training = Training::find($id);
        $jobApplication = JobApplication::find($training->interview->job_application_id);
        $jobApplication->status = "lulus kualifikasi";
        $jobApplication->save();

        // Mail::to('mitrapasundan23@gmail.com')->send(new InviteQualificationMail($training));
        Mail::to($training->interview->jobApplication->user->email)->send(new InviteQualificationMail($training));

        return redirect()->back()->with('success', 'Pemberitahuan lulus kualifikasi telah dikirim ke ' . $training->interview->jobApplication->user->email);
    }
}
