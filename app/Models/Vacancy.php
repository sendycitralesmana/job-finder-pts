<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Vacancy extends Model
{
    public function interviewSchedule(): HasOne
    {
        return $this->hasOne(InterviewSchedule::class, 'vacancy_id', 'id');
    }

    public function trainingSchedule(): HasOne
    {
        return $this->hasOne(TrainingSchedule::class, 'vacancy_id', 'id');
    }
    
    public function users(): HasMany
    {
        return $this->hasMany(JobApplication::class, 'vacancy_id', 'id');
    }

    public function skills(): HasMany
    {
        return $this->hasMany(Skill::class, 'vacancy_id', 'id');
    }
    
    public function jobApplications(): HasMany
    {
        return $this->hasMany(JobApplication::class, 'vacancy_id', 'id');
    }

    // set createdAt to format
    // public function getCreatedAtAttribute($value)
    // {
    //     return \Carbon\Carbon::parse($value)->locale('id')->isoFormat('dddd, D MMMM YYYY');
    // }

    // set updatedAt to format
    public function getUpdatedAtAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->locale('id')->isoFormat('dddd, D MMMM YYYY');
    }
}
