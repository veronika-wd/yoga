<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventRequest;
use App\Models\Event;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Storage;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::orderByDesc('datetime')->get();
        return view('events.index', [
            'events' => $events
        ]);
    }

    public function adminEvents()
    {
        $teachers = Teacher::all();
        $events = Event::all();
        return view('admin.events', [
            'events' => $events,
            'teachers' => $teachers
        ]);
    }

    public function store(EventRequest $request){
        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = uniqid('pic_') . '.' . $image->extension();
            $path = $image->storeAs('images', $imageName, 'public');
        } else {
            $path = 'images/start.png';
        }

        Event::create([
            'name' => $request->name,
            'description' => $request->description,
            'datetime' => $request->datetime,
            'time' => $request->time,
            'teacher_id' => $request->teacher,
            'price' => $request->price,
            'image' => $path,
        ]);

        return redirect()->back();
    }

    public function edit(Event $event)
    {
        $teachers = Teacher::all();
        return view('admin.edit-event', [
            'event' => $event,
            'teachers' => $teachers,
        ]);
    }
    public function update(EventRequest $request, Event $event){
        if($request->hasFile('image')){
            Storage::delete($event->image);
            $image = $request->file('image');
            $imageName = uniqid('pic_') . '.' . $image->extension();
            $path = $image->storeAs('images', $imageName, 'public');
        } else{
            $path = $event->image;
        }
        $event->update([
            'name' => $request->name,
            'description' => $request->description,
            'datetime' => $request->datetime,
            'time' => $request->time,
            'teacher_id' => $request->teacher,
            'price' => $request->price,
            'image' => $path,
        ]);
        return redirect()->route('admin.events');
    }

    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->back();
    }

    public function show(Event $event)
    {
        return view('events.show', [
            'event' => $event
        ]);
    }

    public function application(Event $event)
    {
        $event->applications()->create([
            'user_id' => auth()->user()->id,
        ]);

        return redirect()->back();

    }
}
