<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\userEvent;
use Illuminate\Http\Request;

class UserEventController extends Controller
{
    public function store(Event $event)
    {
        $userId = auth()->user()->id;
        $newRegistration = new userEvent();
        $newRegistration->user_id = $userId;
        $newRegistration->event_id = $event->id;
        $newRegistration->save();
        $event->save();

        return redirect()->back()->with('success', true);
    }
}
