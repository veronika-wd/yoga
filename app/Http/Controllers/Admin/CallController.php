<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Call;
use Illuminate\View\View;

class CallController extends Controller
{
    public function index(): View
    {
        $calls = Call::all();

        return view('admin.calls.index', ['calls' => $calls]);
    }
}
