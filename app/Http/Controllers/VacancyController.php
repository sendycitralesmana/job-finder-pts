<?php

namespace App\Http\Controllers;

use App\Http\Repository\VacancyRepository;
use App\Models\JobApplication;
use Illuminate\Http\Request;

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

        $jobApplications = JobApplication::where('vacancy_id', $id)->get();

        return view('backoffice.vacancy.detail', compact('vacancy', 'jobApplications'));
    }

    public function delete($id)
    {
        $vacancy = $this->vacancyRepository->delete($id);
        return redirect()->back()->with('success', 'Data lowongan telah dihapus');
    }
}
