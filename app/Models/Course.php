<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Guarded;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

#[Guarded(['id'])]
class Course extends Model
{
    public function applications(): MorphMany
    {
        return $this->morphMany(Application::class, 'applicationable');
    }
}
