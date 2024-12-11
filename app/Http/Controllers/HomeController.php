<?php

namespace App\Http\Controllers;

use App\Models\Office;
use App\Models\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            if (Auth::user()->role_id == 1) {
                return redirect('/backoffice/dashboard');
            }
        }

        $vacancies = Vacancy::get();
        $recentVacancies = Vacancy::where('status', 'aktif')->orderBy('created_at', 'desc')->take(5)->get();
        $office = Office::first();

        return view('frontoffice.home', compact('vacancies', 'recentVacancies', 'office'));
    }

    public function about()
    {
        $office = Office::first();

        return view('frontoffice.about', compact('office'));
    }

    public function contact()
    {
        $office = Office::first();

        return view('frontoffice.contact', compact('office'));
    }

    public function account()
    {
        if (Auth::check()) {
            if (Auth::user()->role_id == 1) {
                return redirect('/backoffice/dashboard');
            }
            $office = Office::first();

            return view('frontoffice.account', compact('office'));
        } else {
            return redirect('/');
        }
    }

}
