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
        if ($request->hasFile('video')) {
            $video = $request->file('video');
            $videoName = uniqid('vid_') . '.' . $video->extension();
            $path = $video->storeAs('video', $videoName, 'public');
        }

        Course::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'video' => $path ?? null,
        ]);

        return redirect()->route('admin.courses.index');
    }

    public function edit(Course $course): View
    {
        return view('admin.courses.edit', ['course' => $course]);
    }

    public function update(CourseRequest $request, Course $course): RedirectResponse
    {
        if ($request->hasFile('video')) {
            Storage::delete($course->video);
            $video = $request->file('video');
            $videoName = uniqid('vid_') . '.' . $video->extension();
            $path = $video->storeAs('video', $videoName, 'public');
        }

        $course->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'video' => $path ?? $course->video,
        ]);

        return redirect()->route('admin.courses.index');
    }

    public function destroy(Course $course): RedirectResponse
    {
        if ($course->video) Storage::disk('public')->delete($course->video);
        $course->delete();

        return redirect()->route('admin.courses.index');
    }
}
