<?php

namespace App\Http\Controllers;

use App\Http\Repository\VacancyRepository;
use App\Models\JobApplication;
use App\Models\Training;
use App\Models\Vacancy;
use Illuminate\Http\Request;

class QualificationController extends Controller
{
    private $vacancyRepository;

    public function __construct(VacancyRepository $vacancyRepository)
    {
        $this->vacancyRepository = $vacancyRepository;
    }

    public function index(Request $request)
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

        return view('backoffice.qualification.index', compact('vacancies', 'getVacancies', 'name', 'type'));
    }

    public function detail($id)
    {
        $vacancy = Vacancy::find($id);
        $jobApplications = Training::orderBy('final_score', 'desc')->whereHas('interview.jobApplication', function ($query) use ($vacancy) {
            $query->where('vacancy_id', $vacancy->id)->where('status', 'lulus kualifikasi');
        })->get();
        
        // $jobApplications = JobApplication::where('vacancy_id', $id)->where('status', 'lulus kualifikasi')->get();
    
        return view('backoffice.qualification.detail', compact('vacancy', 'jobApplications'));
    }
}
