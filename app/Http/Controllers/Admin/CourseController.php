<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CourseRequest;
use App\Models\Course;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class CourseController extends Controller
{
    public function index(): View
    {
        $courses = Course::all();

        return view('admin.courses.index', ['courses' => $courses]);
    }

    public function store(CourseRequest $request): RedirectResponse
    {
        Course::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
        ]);

        return redirect()->route('admin.courses.index');
    }

    public function edit(Course $course): View
    {
        return view('admin.courses.edit', ['course' => $course]);
    }

    public function update(CourseRequest $request, Course $course): RedirectResponse
    {
        $course->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
        ]);

        return redirect()->route('admin.courses.index');
    }

    public function destroy(Course $course): RedirectResponse
    {
        $course->delete();

        return redirect()->route('admin.courses.index');
    }
}
