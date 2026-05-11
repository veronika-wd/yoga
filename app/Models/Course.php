<?php

namespace App\Models;

use App\Models\Course\Lesson;
use Illuminate\Database\Eloquent\Attributes\Guarded;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

#[Guarded(['id'])]
class Course extends Model
{
    public function applications(): MorphMany
    {
        return $this->morphMany(Application::class, 'applicable');
    }

    public function lessons(): HasMany
    {
        return $this->hasMany(Lesson::class, 'course_id');
    }
}
