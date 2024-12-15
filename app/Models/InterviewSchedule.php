<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InterviewSchedule extends Model
{
    public function vacancy(): BelongsTo
    {
        return $this->belongsTo(Vacancy::class, 'vacancy_id', 'id');
    }
}
