<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class AdminController extends Controller
{
    public function index()
    {
        $countUsers = User::all()->count();
        $users = User::all();
        $events = Event::all()->count();
        $app_events = Event::where('status', 'accepted')->count();
        $rej_events = Event::where('status', 'rejected')->count();
        $categories = Category::all()->count();
        $reservations = Reservation::all()->count();
        return view('admin.index', compact('users', 'categories', 'app_events', 'rej_events', 'reservations', 'events', 'countUsers'));
    }

    public function events()
    {
        $events = Event::where('status', 'pending')->latest()->simplePaginate(3);
        return view('admin.events', compact('events'));
    }

    public function accept(Event $event)
    {
        $event->status = "accepted";
        $event->update();
        return back()->with('success', 'Event accepted successfully');
    }

    public function reject(Event $event)
    {
        $event->status = "rejected";
        $event->update();
        return back()->with('success', 'Event rejected successfully');
    }
}
