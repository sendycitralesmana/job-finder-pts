<?php

namespace App\Http\Repository;

use App\Models\Skill;

class SkillRepository
{
    public function getAll()
    {
        try {
            $skills = Skill::all();
            return $skills;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function getById($id)
    {
        try {
            $skill = Skill::find($id);
            return $skill;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function store($request, $id)
    {
        try {
            foreach ($request->skill as $key => $skill) {
                $skills = array(
                    'vacancy_id' => $id,
                    'name' => $skill
                );
                Skill::create($skills);
            }
            return $skill;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function update($request, $id)
    {
        try {
            $skill = Skill::find($id);
            $skill->name = $request->skill;
            $skill->save();
            return $skill;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function delete($id)
    {
        try {
            $skill = Skill::find($id);
            $skill->delete();
            return $skill;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}