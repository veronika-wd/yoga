<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function index(): View
    {
        $user = auth()->user();

//        dd($user->courses);
        return view('auth.profile', [
            'courses' => $user->courses,
            'subscriptions' => $user->subscriptions,
            'events' => $user->events,
        ]);
    }

    public function course(Course $course): View
    {
        $lessons = $course->lessons;
        return view('courses.lessons', [
            'lessons' => $lessons,
        ]);
    }
}
