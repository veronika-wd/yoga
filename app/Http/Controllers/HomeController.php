<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $reviews = Review::latest()->limit(3)->get();

        return view('home', ['reviews' => $reviews]);
    }


}
