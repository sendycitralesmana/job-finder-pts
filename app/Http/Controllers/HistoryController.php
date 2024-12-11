<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use App\Models\Office;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    public function history(Request $request)
    {
        $office = Office::first();
        $histories = JobApplication::where('user_id', Auth::user()->id);

        $name = $request->name;
        if ($request->name) {
            $histories->whereHas('vacancy', function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->name . '%');
            });
        }

        $type = $request->type;
        if ($request->type) {
            $histories->whereHas('vacancy', function ($query) use ($request) {
                $query->where('type', $request->type);
            });
        }

        // $orderBy = $request->orderBy;
        // if ($request->orderBy) {
        //     $histories->orderBy('id', $request->order);
        // }

        $histories = $histories->paginate(6);

        return view('frontoffice.history', compact('histories', 'office', 'name', 'type'));
    }
}
