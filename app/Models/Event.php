<?php

namespace App\Models;

use App\Models\Teacher\Teacher;
use Illuminate\Database\Eloquent\Attributes\Guarded;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;

#[Guarded(['id'])]
class Event extends Model
{
    protected $casts = [
        'datetime' => 'datetime',
    ];

    public function teacher(): BelongsTo
    {
        return $this->belongsTo(Teacher::class);
    }

    public function applications(): MorphMany
    {
        return $this->morphMany(Application::class, 'applicable');
    }
}
