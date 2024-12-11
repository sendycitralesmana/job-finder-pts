<?php

namespace App\Http\Controllers;

use App\Http\Repository\SkillRepository;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    private $skillRepository;

    public function __construct(SkillRepository $skillRepository)
    {
        $this->skillRepository = $skillRepository;
    }

    public function create(Request $request, $id)
    {
        $skill = $this->skillRepository->store($request, $id);
        return redirect()->back()->with('success', 'Skill telah ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $skill = $this->skillRepository->update($request, $id);
        return redirect()->back()->with('success', 'Skill telah diubah');
    }

    public function delete($id)
    {
        $skill = $this->skillRepository->delete($id);
        return redirect()->back()->with('success', 'Skill telah dihapus');
    }
}
