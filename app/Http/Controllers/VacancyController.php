<?php

namespace App\Http\Controllers;

use App\Http\Repository\VacancyRepository;
use App\Mail\InviteInterviewMail;
use App\Models\Criteria;
use App\Models\Evaluation;
use App\Models\Interview;
use App\Models\InterviewSchedule;
use App\Models\JobApplication;
use App\Models\TrainingSchedule;
use App\Models\User;
use App\Models\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class VacancyController extends Controller
{
    private $vacancyRepository;

    public function __construct(VacancyRepository $vacancyRepository)
    {
        $this->vacancyRepository = $vacancyRepository;
    }

    public function vacancy(Request $request)
    {
        $vacancies = $this->vacancyRepository->getAllPaginate($request);
        $getVacancies = $this->vacancyRepository->getAll();
        if ($request->name) {
            $name = $request->name;
        } else {
            $name = null;
        }

        if ($request->type) {
            $type = $request->type;
        } else {
            $type = null;
        }

        return view('backoffice.vacancy.index', compact('vacancies', 'getVacancies', 'name', 'type'));
    }

    public function create(Request $request)
    {
        $vacancy = $this->vacancyRepository->store($request);
        return redirect()->back()->with('success', 'Data lowongan telah ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $vacancy = $this->vacancyRepository->update($request, $id);
        return redirect()->back()->with('success', 'Data lowongan telah diubah');
    }

    public function detail($id)
    {
        $vacancy = $this->vacancyRepository->getById($id);
        $jobApplications = JobApplication::where('vacancy_id', $id)->orderBy('final_score', 'desc')->get();

        return view('backoffice.vacancy.detail', compact('vacancy', 'jobApplications'));
    }

    public function delete($id)
    {
        $vacancy = $this->vacancyRepository->delete($id);
        return redirect()->back()->with('success', 'Data lowongan telah dihapus');
    }

    public function score(Request $request, $id)
    {
        $score = JobApplication::find($id);
        $score->status = "penilaian berkas";
        $score->score_experience = $request->score_experience;
        $score->score_education = $request->score_education;
        $score->score_skill = $request->score_skill;
        $score->final_score = ($score->score_experience + $score->score_education + $score->score_skill) / 3;
        $score->save();

        return redirect()->back()->with('success', 'Penilaian pelamar telah disimpan');
    }

    public function scheduleInterview(Request $request, $id)
    {
        $vacancy = Vacancy::find($id);
        if ($vacancy->interviewSchedule) {
            $schedule = InterviewSchedule::where('vacancy_id', $id)->first();
            $schedule->time = $request->time;
            $schedule->date = $request->date;
            $schedule->location = $request->location;
            $schedule->save();
        } else {
            $schedule = new InterviewSchedule();
            $schedule->vacancy_id = $id;
            $schedule->time = $request->time;
            $schedule->date = $request->date;
            $schedule->location = $request->location;
            $schedule->save();
        }

        return redirect()->back()->with('success', 'Jadwal interview telah disimpan');
    }

    public function inviteInterview($id)
    {
        $jobApplication = JobApplication::find($id);
        $jobApplication->status = "kualifikasi interview";
        $jobApplication->save();

        $interview = new Interview();
        $interview->job_application_id = $id;
        $interview->save();

        // Mail::to('mitrapasundan23@gmail.com')->send(new InviteInterviewMail($jobApplication));
        Mail::to($jobApplication->user->email)->send(new InviteInterviewMail($jobApplication));

        return redirect()->back()->with('success', 'Undangan interview telah dikirim ke ' . $jobApplication->user->email);
    }

    public function scheduleTraining(Request $request, $id)
    {
        $vacancy = Vacancy::find($id);
        if ($vacancy->trainingSchedule) {
            $schedule = TrainingSchedule::where('vacancy_id', $id)->first();
            $schedule->time = $request->time;
            $schedule->date = $request->date;
            $schedule->location = $request->location;
            $schedule->save();
        } else {
            $schedule = new TrainingSchedule();
            $schedule->vacancy_id = $id;
            $schedule->time = $request->time;
            $schedule->date = $request->date;
            $schedule->location = $request->location;
            $schedule->save();
        }

        return redirect()->back()->with('success', 'Jadwal training telah disimpan');
    }

    public function documentAktif($id)
    {
        $vacancy = Vacancy::find($id);
        $vacancy->score_document = "aktif";
        $vacancy->save();

        return redirect()->back()->with('success', 'Status penilaian ' . $vacancy->name . ' telah diaktifkan');
    }

    public function documentNonaktif($id)
    {
        $vacancy = Vacancy::find($id);
        $vacancy->score_document = "nonaktif";
        $vacancy->save();

        return redirect()->back()->with('success', 'Status penilaian ' . $vacancy->name . ' telah dinonaktifkan');
    }

    public function interviewAktif($id)
    {
        $vacancy = Vacancy::find($id);
        $vacancy->score_interview = "aktif";
        $vacancy->save();

        return redirect()->back()->with('success', 'Status penilaian ' . $vacancy->name . ' telah diaktifkan');
    }

    public function interviewNonaktif($id)
    {
        $vacancy = Vacancy::find($id);
        $vacancy->score_interview = "nonaktif";
        $vacancy->save();

        return redirect()->back()->with('success', 'Status penilaian ' . $vacancy->name . ' telah dinonaktifkan');
    }

    public function trainingAktif($id)
    {
        $vacancy = Vacancy::find($id);
        $vacancy->score_training = "aktif";
        $vacancy->save();

        return redirect()->back()->with('success', 'Status penilaian ' . $vacancy->name . ' telah diaktifkan');
    }

    public function trainingNonaktif($id)
    {
        $vacancy = Vacancy::find($id);
        $vacancy->score_training = "nonaktif";
        $vacancy->save();

        return redirect()->back()->with('success', 'Status penilaian ' . $vacancy->name . ' telah dinonaktifkan');
    }
    
}
