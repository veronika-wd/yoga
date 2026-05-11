<?php

namespace App\Http\Controllers;

use App\Models\Call;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CallController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        Call::create([
            'name' => $request->name,
            'phone' => $request->phone,
        ]);

        return back();
    }
}
