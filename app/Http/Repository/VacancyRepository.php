<?php

namespace App\Http\Repository;

use App\Models\Skill;
use App\Models\Vacancy;

class VacancyRepository
{
    public function getAll()
    {
        try {
            $vacancies = Vacancy::get();
            
            return $vacancies;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function getAllPaginate($request)
    {
        try {
            $vacancies = Vacancy::query();

            if ($request->name) {
                $vacancies->where('name', 'like', '%' . $request->name . '%');
            }

            if ($request->type) {
                $vacancies->where('type', $request->type);
            }

            return $vacancies->orderBy('created_at', 'desc')->paginate(9);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function getById($id)
    {
        try {
            $vacancy = Vacancy::find($id);
            
            return $vacancy;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function store($request)
    {
        try {
            $vacancy = new Vacancy();
            $vacancy->name = $request->name;
            $vacancy->description = $request->description;
            $vacancy->end_date = $request->end_date;
            $vacancy->start_salary = $request->start_salary;
            $vacancy->end_salary = $request->end_salary;
            $vacancy->end_date = $request->end_date;
            $vacancy->status = "aktif";
            $vacancy->type = $request->type;
            $vacancy->score_document = 'aktif';
            $vacancy->score_interview = 'aktif';
            $vacancy->score_training = 'aktif';
            $vacancy->save();

            foreach ($request->skill as $key => $skill) {
                $skills = array(
                    'vacancy_id' => $vacancy->id,
                    'name' => $skill
                );
                Skill::create($skills);
            }

            return $vacancy;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function update($request, $id)
    {
        try {
            $vacancy = Vacancy::find($id);
            $vacancy->name = $request->name;
            $vacancy->description = $request->description;
            $vacancy->end_date = $request->end_date;
            $vacancy->start_salary = $request->start_salary;
            $vacancy->end_salary = $request->end_salary;
            $vacancy->end_date = $request->end_date;
            $vacancy->status = $request->status;
            $vacancy->type = $request->type;
            $vacancy->save();

            return $vacancy;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function delete($id)
    {
        try {
            $vacancy = Vacancy::find($id);
            $vacancy->delete();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}