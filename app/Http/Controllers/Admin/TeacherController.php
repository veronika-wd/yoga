<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TeacherRequest;
use App\Models\Teacher\Teacher;
use Illuminate\Http\RedirectResponse;
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
        Teacher::create([
            'name' => $request->name,
            'status' => $request->status,
            'description' => $request->description,
        ]);

        return back();
    }

    public function edit(Teacher $teacher): View
    {
        return view('admin.teachers.edit', ['teacher' => $teacher]);
    }

    public function update(Teacher $teacher, TeacherRequest $request): RedirectResponse
    {
        $teacher->update([
            'name' => $request->name,
            'status' => $request->status,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.teachers.index');
    }

    public function destroy(Teacher $teacher): RedirectResponse
    {
        $teacher->delete();

        return redirect()->route('admin.teachers.index');
    }
}
