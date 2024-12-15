<?php

namespace App\Http\Controllers;

use App\Mail\InviteInterviewMail;
use App\Mail\InviteTrainingMail;
use App\Models\Interview;
use App\Models\InterviewSchedule;
use App\Models\JobApplication;
use App\Models\Training;
use App\Models\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class InterviewController extends Controller
{
    public function index(Request $request)
    {
        $schedules = InterviewSchedule::orderBy('id', 'desc')->get();
        $getVacancies = Vacancy::get();

        if ($request->name) {
            $name = $request->name;
        } else {
            $name = null;
        }

        return view('backoffice.interview.index', compact('schedules', 'getVacancies', 'name'));
    }

    public function detail($id)
    {
        $schedule = InterviewSchedule::find($id);
        $jobApplications = Interview::orderBy('final_score', 'desc')->whereHas('jobApplication', function ($query) use ($schedule) {
            $query->where('vacancy_id', $schedule->vacancy_id);
        })->get();

        return view('backoffice.interview.detail', compact('schedule', 'jobApplications'));
    }

    public function score(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $interview = Interview::find($id);
            $jobApplication = JobApplication::find($interview->job_application_id);
            $jobApplication->status = "penilaian interview";
            $jobApplication->save();

            $interview->score_verbal = $request->score_verbal;
            $interview->score_exam = $request->score_exam;
            $interview->score_practice = $request->score_practice;
            $score_interview = ($interview->score_verbal + $interview->score_exam + $interview->score_practice) / 3;
            $score_pemberkasan = $jobApplication->final_score;
            $interview->final_score = ($score_interview + $score_pemberkasan) / 2;
            $interview->save();

            DB::commit();
            return redirect()->back()->with('success', 'Penilaian pelamar telah disimpan');
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    public function inviteTraining($id)
    {
        $interview = Interview::find($id);
        $jobApplication = JobApplication::find($interview->job_application_id);
        $jobApplication->status = "kualifikasi training";
        $jobApplication->save();

        $training = new Training();
        $training->interview_id = $id;
        $training->save();

        // Mail::to('mitrapasundan23@gmail.com')->send(new InviteTrainingMail($interview));
        Mail::to($interview->jobApplication->user->email)->send(new InviteTrainingMail($interview));

        return redirect()->back()->with('success', 'Undangan training telah dikirim ke ' . $interview->jobApplication->user->email);
    }
}
