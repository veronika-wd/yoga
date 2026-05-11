<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventRequest;
use App\Models\Event;
use App\Models\Teacher\Teacher;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class EventController extends Controller
{
    public function index(): View
    {
        $teachers = Teacher::all();
        $events = Event::all();

        return view('admin.events.index', [
            'events' => $events,
            'teachers' => $teachers,
        ]);
    }

    public function store(EventRequest $request): RedirectResponse
    {
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
        }

        Event::create([
            'name' => $request->name,
            'description' => $request->description,
            'datetime' => $request->datetime,
            'time' => $request->time,
            'teacher_id' => $request->teacher,
            'price' => $request->price,
            'image' => $path ?? 'images/start.png',
        ]);

        return back();
    }

    public function edit(Event $event): View
    {
        $teachers = Teacher::all();

        return view('admin.events.edit', [
            'event' => $event,
            'teachers' => $teachers,
        ]);
    }

    public function update(Event $event, EventRequest $request): RedirectResponse
    {
        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($event->image);
            $path = $request->file('image')->store('images', 'public');
        }

        $event->update([
            'name' => $request->name,
            'description' => $request->description,
            'datetime' => $request->datetime,
            'time' => $request->time,
            'teacher_id' => $request->teacher,
            'price' => $request->price,
            'image' => $path ?? $event->image,
        ]);

        return redirect()->route('admin.events.index');
    }

    public function destroy(Event $event): RedirectResponse
    {
        Storage::disk('public')->delete($event->image);
        $event->delete();

        return back();
    }
}
