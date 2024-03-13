<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function ()
    {
    
    }
    public function index()
    {
        
        if (Auth::check()) {
            $events = Event::where('status', 'accepted')
                ->where('start_date', '>', now())
                ->where('places', '>', 0)
                ->where('user_id', '!=', Auth::user()->id)
                ->latest()->paginate(3);
            $categories = Category::all();
            return view('events.index', compact('events', 'categories'));
        } else {
            $events = Event::where('status', 'accepted')
                ->where('start_date', '>', now())
                ->where('places', '>', 0)
                ->latest()->paginate(3);
            return view('events.index', compact('events'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('events.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEventRequest $request)
    {
        $image = uniqid() . '.' .$request->file('image')->getClientOriginalExtension();
        $request->file('image')->move('images/', $image);
        $event = Event::create([
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'user_id' => Auth::user()->id,
            'price' => $request->price,
            'start_date' => $request->start_date,
            'adress' => $request->adress,
            'image' => $image,
            'type' => $request->type,
            'places' => $request->places,
        ]);
        return redirect('/organizer/events')->with('success', 'Event created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        return view('events.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        $event = Event::findOrFail($event->id);
        $categories = Category::all();
        return view('events.edit', compact('categories', 'event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEventRequest $request, Event $event)
    {
        if ($request->hasFile("image")) {
            $image = public_path('images/' . $event->image);
            if (file_exists($image)) {
                unlink($image);
            }
            $image = uniqid() . '.' . $event->file('image')->getClientOriginalExtension();
            $event->file('image')->move('images/', $image);
            $event->image = $image;
        }
        $event->update([
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'user_id' => Auth::user()->id,
            'price' => $request->price,
            'start_date' => $request->start_date,
            'adress' => $request->adress,
            'places' => $request->places,
        ]);
        return redirect('/organizer/events')->with('success', 'Event updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $event->findORFail($event->id)->delete();
        return back()->with('success', 'Event deleted successfully');
    }

    public function search(Request $request)
    {
        $events = Event::where('title', 'like', '%' . $request->search . '%')->paginate(3);
        $categories = Category::all();
        return view('events.index', compact('events', 'categories'));
    }

}
