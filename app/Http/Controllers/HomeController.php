<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $reviews = Review::all();

        return view('home', ['reviews' => $reviews]);
    }

    public function profile(): View
    {
        $user = auth()->user();

        return view('auth.profile', [
            'courses' => $user->courses,
            'subscriptions' => $user->subscriptions,
            'events' => $user->events,
        ]);
    }
}
