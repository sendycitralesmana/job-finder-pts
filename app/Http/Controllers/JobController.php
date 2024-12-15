<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use App\Models\Office;
use App\Models\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
        // $jobApplication = JobApplication::where('vacancy_id', $id)->first();

        $vacancy = Vacancy::findOrFail($id);
        $office = Office::first();

        return view('frontoffice.job-detail', compact('vacancy', 'office'));
    }

    public function apply(Request $request, $id)
    {
        $vacancy = Vacancy::findOrFail($id);
        $jobApplication = new JobApplication();
        $jobApplication->vacancy_id = $vacancy->id;
        $jobApplication->user_id = Auth::user()->id;
        $jobApplication->status = 'pending';
        if ($request->file('application_letter')) {
            $file = $request->file('application_letter');
            $path = Storage::disk('public')->put('user/application-letter', $file);
            $jobApplication->application_letter = $path;
            $jobApplication->save();
        }
        $jobApplication->save();

        return redirect()->back()->with('success', 'Apply lowongan telah dikirim');
    }

    public function applicationLetterPreview($id)
    {
        $jobApplication = JobApplication::find($id);
        $file = Storage::disk('public')->get($jobApplication->application_letter);
        $filename = $jobApplication->user->name . '-application-letter.pdf';
        return response($file)->header('Content-Type', 'application/pdf')->header('Content-Disposition', 'inline; filename="' . $filename . '"');
    }

    public function applicationLetterUpdate(Request $request, $id)
    {
        $jobApplication = JobApplication::find($id);
        if ($request->file('application_letter')) {
            if ($jobApplication->application_letter) {
                Storage::disk('public')->delete($jobApplication->application_letter);
            }
            $file = $request->file('application_letter');
            $path = Storage::disk('public')->put('user/application-letter', $file);
            $jobApplication->application_letter = $path;
            $jobApplication->save();
        }

        return redirect()->back()->with('success', 'Surat lamaran sudah diubah');
    }
}
