<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Teacher\Teacher;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $reviews = Review::latest()->limit(3)->get();

        return view('home', ['reviews' => $reviews]);
    }

    public function teachers()
    {
        $teachers = Teacher::all();
        return view('teachers',
            [
                'teachers' => $teachers
            ]);
    }


}
