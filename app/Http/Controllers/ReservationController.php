<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function reservation(Request $request)
    {
        if (auth()->user()->role_id == 3) {
            $event = Event::findORFail($request->event_id);
            $reservation = new Reservation();
            $reservation->user_id = auth()->user()->id;
            $reservation->event_id = $event->id;
            if ($event->type == 'automatique_reservation') {
                $event->places = $event->places - 1;
                $event->update();
                $reservation->status = 'accepted';
            } else {
                $reservation->status = 'pending';
            }
            $reservation->save();
            return back()->with('success', 'Event reserved successfully');
        } else {
            return redirect()->route('login');
        }
    }
}
