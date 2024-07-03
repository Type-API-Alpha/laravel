<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEventRequest;
use App\Models\Event;
use App\Models\EventPhoto;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserEvent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class EventController extends Controller {
    public function index() {
        $events = Event::paginate(5);
        return view('/home', compact('events'));
    }

    public function create() {
        return view('create_event');
    }

    public function store(StoreEventRequest $request): RedirectResponse {

        $imagePath = $request->file('image')->store('images', 'public');

        Event::create([
            'title' => $request->title,
            'description' => $request->description,
            'init_date' => $request->init_date,
            'end_date' => $request->end_date,
            'max_participants' => $request->max_participants,
            'entry_price' => $request->entry_price,
            'user_id' => Auth::user()->id,
            'event_image' => $imagePath ?? null,
        ]);

        return redirect()->route('user.events')->with('message', 'Evento criado com sucesso!');
    }

    public function show(Event $event) {
        $numParticipants = $event->participants()->count();
        $maxParticipants = $event->max_participants;
        $soldOff = false;

        if ($numParticipants == $maxParticipants) {
            $soldOff = true;
        }

        $isParticipating = UserEvent::where(['user_id' => Auth::user()->id, 'event_id' => $event->id])->exists();
        $eventPhotos = $event->photos()->paginate(4);
    
        return view('event_details', compact('event', 'soldOff', 'eventPhotos', 'isParticipating'));
    }

    public function showEvents() {
        $sessionId = session('loginId');
        $myEvents = Event::where('user_id', $sessionId)->paginate(3);
        $user = User::with('events')->findOrFail($sessionId);
        $eventsIn = $user->events()->paginate(3, ['*'], 'eventsInPage');
        return view('event_user', compact('myEvents', 'eventsIn'));
    }

    public function edit(Event $event) {
        return view('edit_event', compact('event'));
    }

    public function update(Request $request, Event $event) {
        $event->title = $request->title;
        $event->description = $request->description;
        $event->init_date = $request->init_date;
        $event->end_date = $request->end_date;
        $event->max_participants = $request->max_participants;
        $event->entry_price = $request->entry_price;
        $event->event_image = $request->image ?? $event->image;
        $event->save();

        return redirect()->route('user.events')->with('message', 'Evento alterado com sucesso!');
    }

    public function destroy(Event $event) {
        $hasParticipants = userEvent::where('event_id', $event->id)->exists();

        if ($hasParticipants) {
            return redirect()->route('event.detail', ['event' => $event->id, 'context' => 'owner'])->withErrors(['error' => 'O evento não pode ser excluído porque possui participantes.']);
        }

        $event->delete();
        return redirect()->route('user.events')->with('event_delete_success', 'Evento excluído com sucesso!');
    }

    public function leaveEvent(Request $request, Event $event) {
        $userId = session('loginId');
        $eventId = $event->id;
        userEvent::where('user_id', $userId)->where('event_id', $eventId)->delete();

        return redirect()->route('user.events')->with('leave_success', 'Você saiu do evento com sucesso!');
    }

    public function getParticipants(Event $event)
    {
        $participants = $event->users;
        return view('event_participants', compact('participants', 'event'));
    }

    public function removeParticipant(Event $event, User $user)
    {
        $event->users()->detach($user->id);
        return redirect()->route('event.participants', $event->id)->with(['remove_participant_success' => 'Participante removido do evento com sucesso!', 'removedUser' => $user]);
    }

    public function addGaleryPhoto(Request $request, $id) {
        if ($request->hasFile('image')) {

            $imagePath = $request->file('image')->store('event_images', 'public');
            EventPhoto::create([
                'event_id' => $id,
                'event_photo_url' => $imagePath,
            ]);

            return back()->with('success-photo', 'Foto adicionada com sucesso.');
        }

        return back()->with('error', 'Nenhuma foto foi enviada.');
    }
}
