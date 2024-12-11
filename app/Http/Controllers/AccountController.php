<?php

namespace App\Http\Controllers;

use App\Mail\Auth\VerifyMail;
use App\Models\Office;
use App\Models\User;
use App\Models\UserEducation;
use App\Models\UserExperience;
use App\Models\UserSkill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AccountController extends Controller
{
    public function account()
    {
        if (Auth::check()) {
            $office = Office::first();

            return view('frontoffice.account', compact('office'));
        } else {
            return redirect('/');
        }
    }

    public function edit($id)
    {
        if (Auth::check()) {
            $office = Office::first();
            $user = User::findOrFail($id);
            
            return view('frontoffice.account-edit', compact('office', 'user'));
        } else {
            return redirect('/');
        }
    }

    public function update(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $user->name = $request->name;
        $user->gender = $request->gender;
        $user->religion = $request->religion;
        $user->place_birth = $request->place_birth;
        $user->date_birth = $request->date_birth;
        $user->address = $request->address;
        $user->no_hp = $request->no_hp;
        $user->save();

        return redirect('/account')->with('success', 'Data sudah diubah');
    }

    public function editPassword($id)
    {
        if (Auth::check()) {
            $office = Office::first();
            $user = User::findOrFail($id);
            
            return view('frontoffice.account-edit-password', compact('office', 'user'));
        } else {
            return redirect('/');
        }
    }

    public function updatePassword(Request $request)
    {
        $user = User::find(Auth::user()->id);
        if (!Hash::check($request->password_sekarang, $user->password)) {
            return redirect()->back()->with('error', 'Password sekarang salah');
        }
        if ($request->password_baru != $request->konfirmasi_password) {
            return redirect()->back()->with('error', 'Password baru dan konfirmasi password tidak sama');
        }
        $user->password = bcrypt($request->password_baru);
        $user->save();

        return redirect()->back()->with('success', 'Password sudah diubah');
    }

    public function uploadCV(Request $request)
    {
        $user = User::find(Auth::user()->id);
        if ($request->file('cv')) {
            if ($user->cv) {
                Storage::disk('public')->delete($user->cv);
            }
            $file = $request->file('cv');
            $path = Storage::disk('public')->put('user/cv', $file);
            $user->cv = $path;
            $user->save();
        }

        return redirect()->back()->with('success', 'CV sudah diupload');
    }

    public function updateCV(Request $request)
    {
        $user = User::find(Auth::user()->id);
        if ($request->file('cv')) {
            if ($user->cv) {
                Storage::disk('public')->delete($user->cv);
            }
            $file = $request->file('cv');
            $path = Storage::disk('public')->put('user/cv', $file);
            $user->cv = $path;
            $user->save();
        }

        return redirect()->back()->with('success', 'CV sudah diubah');
    }

    public function deleteCV()
    {
        $user = User::find(Auth::user()->id);
        if ($user->cv) {
            Storage::disk('public')->delete($user->cv);
        }
        $user->cv = null;
        $user->save();

        return redirect()->back()->with('success', 'CV sudah dihapus');
    }

    public function previewCV($id)
    {
        $user = User::find($id);

        // stream pdf
        $file = Storage::disk('public')->get($user->cv);

        $filename = $user->name . '-cv.pdf';

        return response($file)->header('Content-Type', 'application/pdf')->header('Content-Disposition', 'inline; filename="' . $filename . '"');

        // return response($file)->header('Content-Type', 'application/pdf');
    }

    public function uploadFoto(Request $request)
    {
        $user = User::find(Auth::user()->id);
        if ($request->file('foto')) {
            if ($user->foto) {
                Storage::disk('public')->delete($user->foto);
            }
            $file = $request->file('foto');
            $path = Storage::disk('public')->put('user/foto', $file);
            $user->foto = $path;
            $user->save();
        }

        return redirect()->back()->with('success', 'Foto sudah diupload');
    }

    public function updateFoto(Request $request)
    {
        $user = User::find(Auth::user()->id);
        if ($request->file('foto')) {
            if ($user->foto) {
                Storage::disk('public')->delete($user->foto);
            }
            $file = $request->file('foto');
            $path = Storage::disk('public')->put('user/foto', $file);
            $user->foto = $path;
            $user->save();
        }

        return redirect()->back()->with('success', 'Foto sudah diubah');
    }

    public function deleteFoto()
    {
        $user = User::find(Auth::user()->id);
        if ($user->foto) {
            Storage::disk('public')->delete($user->foto);
        }
        $user->foto = null;
        $user->save();

        return redirect()->back()->with('success', 'Foto sudah dihapus');
    }

    public function createEducation(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $education = new UserEducation();
        $education->user_id = $user->id;
        $education->school = $request->school;
        $education->study = $request->study;
        $education->start_year = $request->start_year;
        $education->end_year = $request->end_year;
        $education->save();

        return redirect()->back()->with('success', 'Pendidikan sudah ditambahkan');
    }

    public function updateEducation(Request $request, $id)
    {
        $education = UserEducation::find($id);
        $education->school = $request->school;
        $education->study = $request->study;
        $education->start_year = $request->start_year;
        $education->end_year = $request->end_year;
        $education->save();

        return redirect()->back()->with('success', 'Pendidikan sudah diubah');
    }
    
    public function deleteEducation($id)
    {
        $education = UserEducation::find($id);
        $education->delete();

        return redirect()->back()->with('success', 'Pendidikan sudah dihapus');
    }

    public function createSkill(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $skill = new UserSkill();
        $skill->user_id = $user->id;
        $skill->skill = $request->skill;
        $skill->save();

        return redirect()->back()->with('success', 'Skill sudah ditambahkan');
    }

    public function updateSkill(Request $request, $id)
    {
        $skill = UserSkill::find($id);
        $skill->skill = $request->skill;
        $skill->save();

        return redirect()->back()->with('success', 'Skill sudah diubah');
    }
    
    public function deleteSkill($id)
    {
        $skill = UserSkill::find($id);
        $skill->delete();

        return redirect()->back()->with('success', 'Skill sudah dihapus');
    }

    public function createExperience(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $experience = new UserExperience();
        $experience->user_id = $user->id;
        $experience->company = $request->company;
        $experience->position = $request->position;
        $experience->type = $request->type;
        $experience->start_year = $request->start_year;
        $experience->end_year = $request->end_year;
        $experience->save();

        return redirect()->back()->with('success', 'Pengalaman sudah ditambahkan');
    }

    public function updateExperience(Request $request, $id)
    {
        $experience = UserExperience::find($id);
        $experience->company = $request->company;
        $experience->position = $request->position;
        $experience->type = $request->type;
        $experience->start_year = $request->start_year;
        $experience->end_year = $request->end_year;
        $experience->save();

        return redirect()->back()->with('success', 'Pengalaman sudah diubah');
    }
    
    public function deleteExperience($id)
    {
        $experience = UserExperience::find($id);
        $experience->delete();

        return redirect()->back()->with('success', 'Pengalaman sudah dihapus');
    }

}
