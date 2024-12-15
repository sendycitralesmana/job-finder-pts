<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Training extends Model
{
    protected $table = 'trainings';

    protected $guarded = [];

    public function interview(): BelongsTo
    {
        return $this->belongsTo(Interview::class, 'interview_id', 'id');
    }
}
