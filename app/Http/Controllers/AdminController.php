<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
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
