<?php

namespace App\Http\Controllers;

use App\Models\Review;

class HomeController extends Controller
{
    public function index()
    {
        $reviews = Review::all();
        return view('home', [
            'reviews' => $reviews
        ]);
    }

    public function profile()
    {
        $user = auth()->user();

        return view('auth.profile', [
            'courses'       => $user->applications()->courses,
            'subscriptions' => $user->applications()->subscriptions,
             'events' => $user->applications()->events,

        ]);
    }
}
