<?php

namespace App\Http\Controllers\Admin\Course;

use App\Http\Controllers\Controller;
use App\Http\Requests\LessonRequest;
use App\Models\Course;
use App\Models\Course\Lesson;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class LessonController extends Controller
{
    public function index(Course $course): View
    {
        $lessons = $course->lessons;

        return view('admin.courses.lessons.index', [
            'course' => $course,
            'lessons' => $lessons,
        ]);
    }

    public function store(Course $course, LessonRequest $request): RedirectResponse
    {
        $course->lessons()->create([
            'name' => $request->input('name'),
            'content' => $request->input('content'),
            'url' => $request->input('url'),
        ]);

        return redirect()->route('admin.lessons.index', $course);
    }

    public function edit(Course $course, Lesson $lesson): View
    {
        return view('admin.courses.lessons.edit', [
            'course' => $course,
            'lesson' => $lesson,
        ]);
    }

    public function update(Course $course, Lesson $lesson, LessonRequest $request): RedirectResponse
    {
        $lesson->update([
            'name' => $request->input('name'),
            'content' => $request->input('content'),
            'url' => $request->input('url'),
        ]);

        return redirect()->route('admin.lessons.index', $course);
    }

    public function destroy(Course $course, Lesson $lesson): RedirectResponse
    {
        $lesson->delete();

        return redirect()->route('admin.lessons.index', $course);
    }
}
