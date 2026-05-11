<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TeacherRequest;
use App\Models\Teacher\Teacher;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class TeacherController extends Controller
{
    public function index(): View
    {
        $teachers = Teacher::all();

        return view('admin.teachers.index', ['teachers' => $teachers]);
    }

    public function store(TeacherRequest $request): RedirectResponse
    {
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
        }

        Teacher::create([
            'name' => $request->name,
            'status' => $request->status,
            'description' => $request->description,
            'image' => $path ?? 'images/teacher1.jpg',
        ]);

        return back();
    }

    public function edit(Teacher $teacher): View
    {
        return view('admin.teachers.edit', ['teacher' => $teacher]);
    }

    public function update(Teacher $teacher, TeacherRequest $request): RedirectResponse
    {
        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($teacher->image);
            $path = $request->file('image')->store('images', 'public');
        }

        $teacher->update([
            'name' => $request->name,
            'status' => $request->status,
            'description' => $request->description,
            'image' => $path ?? $teacher->image,
        ]);

        return redirect()->route('admin.teachers.index');
    }

    public function destroy(Teacher $teacher): RedirectResponse
    {
        Storage::disk('public')->delete($teacher->image);
        $teacher->delete();

        return redirect()->route('admin.teachers.index');
    }
}
