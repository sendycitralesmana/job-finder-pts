<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use App\Models\Office;
use App\Models\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    public function job(Request $request)
    {
        $office = Office::first();
        $getVacancies = Vacancy::where('status', 'aktif')->get();
        $vacancies = Vacancy::where('status', 'aktif')->orderBy('created_at', 'desc');

        $name = $request->name;
        if ($request->name) {
            $vacancies->where('name', 'like', '%' . $request->name . '%');
        }

        $type = $request->type;
        if ($request->type) {
            $vacancies->where('type', $request->type);
        }

        $orderBy = $request->orderBy;
        if ($request->orderBy) {
            $vacancies->orderBy('id', $request->order);
        }

        $vacancies = $vacancies->paginate(6);

        return view('frontoffice.job-listing', compact('office', 'vacancies', 'getVacancies', 'name', 'type'));
    }

    public function detail($id)
    {
        $vacancy = Vacancy::findOrFail($id);
        $office = Office::first();

        return view('frontoffice.job-detail', compact('vacancy', 'office'));
    }

    public function apply($id)
    {
        $vacancy = Vacancy::findOrFail($id);
        $jobApplication = new JobApplication();
        $jobApplication->vacancy_id = $vacancy->id;
        $jobApplication->user_id = Auth::user()->id;
        $jobApplication->status = 'pending';
        $jobApplication->save();

        return redirect()->back()->with('success', 'Apply lowongan telah dikirim');
    }
}
