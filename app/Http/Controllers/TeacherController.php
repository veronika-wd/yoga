<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeacherRequest;
use App\Models\Teacher;

class TeacherController extends Controller
{
    public function index()
    {
        return view('teachers');
    }

    public function adminTeachers()
    {
        $teachers = Teacher::all();
        return view('admin.teachers', [
            'teachers' => $teachers
        ]);
    }

    public function store(TeacherRequest $request)
    {
        Teacher::create([
            'name' => $request->name,
            'status' => $request->status,
            'description' => $request->description,
        ]);

        return redirect()->back();
    }

    public function edit(Teacher $teacher)
    {
        return view('admin.edit-teacher', [
            'teacher' => $teacher
        ]);
    }

    public function update(TeacherRequest $request, Teacher $teacher){
        $teacher->update([
            'name' => $request->name,
            'status' => $request->status,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.teachers');
    }

    public function destroy(Teacher $teacher){
        $teacher->delete();
        return redirect()->route('admin.teachers');
    }
}
