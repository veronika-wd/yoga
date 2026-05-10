<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseRequest;
use App\Models\Course;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Storage;

class CoursesController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return view('courses.index', [
            'courses' => $courses
        ]);
    }

    public function adminCourses()
    {
        $courses = Course::all();
        return view('admin.courses', [
            'courses' => $courses
        ]);
    }

    public function store(CourseRequest $request)
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

        return redirect()->route('admin.courses');
    }

    public function edit(Course $course)
    {
        return view('admin.edit-course', [
            'course' => $course
        ]);
    }

    public function update(CourseRequest $request, Course $course)
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

        return redirect()->route('admin.courses');
    }

    public function destroy(Course $course)
    {
        if ($course->video) {
            Storage::delete($course->video);
        }
        $course->delete();
        return redirect()->route('admin.courses');
    }

    public function show(Course $course)
    {
        return view('courses.show', ['course' => $course]);
    }

    public function appointment(Course $course): RedirectResponse
    {
        $course->applications()->create(['user_id' => Auth::id()]);

        return redirect()->back();
    }
}
