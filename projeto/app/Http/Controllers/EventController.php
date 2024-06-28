<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\userEvent;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::paginate(5);
        return view('/home', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create_event');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $event = new Event();
        $event->title = $request->title;
        $event->description = $request->description;
        $event->init_date = $request->init_date;
        $event->end_date = $request->end_date;
        $event->max_participants = $request->max_participants;
        $event->entry_price = $request->price;
        $event->event_image = $request->image;
        $event->user_id = session('loginId');
        $event->save();

        return redirect()->route('event.index')->with('message', 'Evento criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        $numParticipants = $event->participants()->count();
        $maxParticipants = $event->max_participants;
        $soldOff = false;

        if ($numParticipants == $maxParticipants) {
            $soldOff = true;
        }

        return view('event_details', compact('event', 'soldOff'));
    }

    public function showEvents() {

        $sessionId = session('loginId');
        $myEvents = Event::where('user_id', $sessionId)->paginate(3);

        $user = User::with('events')->findOrFail($sessionId);
        $eventsIn = $user->events()->paginate(3, ['*'], 'eventsInPage');

        return view('event_user', compact('myEvents', 'eventsIn'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        return view('edit_event', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        $event->title = $request->title;
        $event->description = $request->description;
        $event->init_date = $request->init_date;
        $event->end_date = $request->end_date;
        $event->max_participants = $request->max_participants;
        $event->entry_price = $request->price;
        $event->event_image = $request->image;
        $event->save();

        return redirect()->route('user.events')->with('message', 'Evento alterado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        //
    }

    public function leaveEvent(Request $request, Event $event)
    {
        $userId = session('loginId');
        $eventId = $event->id;
        
        userEvent::where('user_id', $userId)->where('event_id', $eventId)->delete();

        return redirect()->route('user.events')->with('message', 'Você saiu do evento com sucesso!');
    }
}
