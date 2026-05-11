<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Guarded;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

#[Guarded(['id'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    protected $casts = [
        'password' => 'hashed',
        'is_admin' => 'boolean',
    ];

    public function applications(): HasMany
    {
        return $this->hasMany(Application::class);
    }

    protected function courses(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->applications
                ->where('applicable_type', Course::class)
                ->map(fn(Application $application) => $application->applicable),
        );
    }

    protected function subscriptions(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->applications
                ->where('applicable_type', Subscription::class)
                ->map(fn(Application $application) => $application->applicable),
        );
    }

    protected function events(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->applications
                ->where('applicable_type', Event::class)
                ->map(fn(Application $application) => $application->applicable),
        );
    }
}
