<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\userEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserEventController extends Controller
{
    public function store(Event $event) {

        userEvent::create([
            'user_id' => Auth::user() ->id,
            'event_id' => $event ->id
        ]);

        return redirect()->back()->with('success', true);
    }
}
