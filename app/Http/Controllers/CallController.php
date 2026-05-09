<?php

namespace App\Http\Controllers;

use App\Models\Call;
use Illuminate\Http\Request;

class CallController extends Controller
{
    public function store(Request $request)
    {
        Call::create([
            'name' => $request->name,
            'phone' => $request->phone,
        ]);

        return redirect()->back();
    }

    public function adminCalls()
    {
        $calls = Call::all();
        return view('admin.calls', [
            'calls' => $calls
        ]);
    }
}
