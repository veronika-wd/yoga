<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Event extends Model
{
    protected $guarded = ['id'];
    public function teacher(): BelongsTo
    {
        return $this->belongsTo(Teacher::class);
    }

    protected $casts = [
        'datetime' => 'datetime',
    ];
}
