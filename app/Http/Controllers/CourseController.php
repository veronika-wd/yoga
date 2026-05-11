<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class CourseController extends Controller
{
    public function index(): View
    {
        $courses = Course::all();

        return view('courses.index', ['courses' => $courses]);
    }

    public function show(Course $course): View
    {
        return view('courses.show', ['course' => $course]);
    }

    public function appointment(Course $course): RedirectResponse
    {
        $course->applications()->create(['user_id' => Auth::id()]);

        return redirect()->back();
    }
}
