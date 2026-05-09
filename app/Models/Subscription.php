<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Subscription extends Model
{
    protected $guarded = ['id'];

    public function applications(): MorphMany
    {
        return $this->morphMany(Application::class, 'applicationable');
    }
}
