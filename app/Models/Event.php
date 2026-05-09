<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Event extends Model
{
    protected $guarded = ['id'];
    public function teacher(): BelongsTo
    {
        return $this->belongsTo(Teacher::class);
    }

    public function applications(): MorphMany
    {
        return $this->morphMany(Application::class, 'applicationable');
    }

    protected $casts = [
        'datetime' => 'datetime',
    ];
}
