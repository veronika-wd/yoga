<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::orderByDesc('datetime')->get();

        return view('events.index', ['events' => $events]);
    }

    public function show(Event $event): View
    {
        return view('events.show', ['event' => $event]);
    }

    public function application(Event $event): RedirectResponse
    {
        if ($event->applications->where('user_id', Auth::id())->first() !== null) {
            return redirect()->back()->withErrors(['alreadyApplied' => 'Вы уже записаны на данную практику']);
        }

        $event->applications()->create(['user_id' => Auth::id()]);

        return back();
    }
}
