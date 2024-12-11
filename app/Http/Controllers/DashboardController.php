<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $users = User::where('role_id', '!=', 1)->get();
        $vacancies = Vacancy::get();

        return view('backoffice.dashboard.index', compact('users', 'vacancies'));
    }
}
