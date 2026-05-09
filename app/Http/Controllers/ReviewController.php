<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        Review::create([
            'name' => $request->name,
            'review' => $request->review,
            'rating' => $request->rating,
        ]);
        return redirect()->back();
    }
}
