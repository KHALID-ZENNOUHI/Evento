<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Reservation;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Stripe\Checkout\Session;
use Stripe\Stripe;
use Illuminate\Support\Str;
// use PDF; 
class ReservationController extends Controller
{
    public function showReservation()
    {
        $reservations = DB::table('reservations as r')
            ->leftJoin('events as e', 'r.event_id', '=', 'e.id')
            ->leftJoin('users as u', 'u.id', '=', 'e.user_id')
            ->leftJoin('users as ru', 'ru.id', '=', 'r.user_id')
            ->where('u.id', '=', auth()->user()->id)
            ->select('r.*', 'ru.name', 'ru.email', 'e.title')
            ->get();
        return view('organizer.reservations', compact('reservations'));
    }
    public function reservation(Event $event)
    {
        if (auth()->check()){
            $reservation = new Reservation();
            $reservation->user_id = auth()->user()->id;
            $reservation->event_id = $event->id;
            // $reservation->organizer_id = $event->user_id;
            if ($event->type == 'automatique_reservation') {
                $event->places = $event->places - 1;
                $event->update();
                $reservation->status = 'accepted';
                $reservation->is_ticket = false;
                $reservation->save();
                Stripe::setApikey(env('STRIPE_SK'));
                $session = Session::create([
                    'payment_method_types' => ['card'],
                    'line_items' => [[
                        'price_data' => [
                            'currency' => 'usd',
                            'product_data' => [
                                'name' => 'T-shirt',
                            ],
                            'unit_amount' => 2000,
                        ],
                        'quantity' => 1,
                    ]],
                    'mode' => 'payment',
                    'success_url' => "http://localhost:80/events/{$event->id}",
                    'cancel_url' => "http://localhost:80/events/{$event->id}",
                ]);
                return redirect()->away($session->url)->with('ticket', 'Event reserved successfully download your ticket');
            } else {
                $reservation->status = 'pending';
                $reservation->is_ticket = false;
                $reservation->save();
                return back()->with('success', 'Event reserved successfully wait the organizer to accept your reservation');
            }
            
        } else {
            return redirect()->route('login');
        }
    }

    public function accept(Reservation $reservation)
    {
        // dd($reservation->status);
        $reservation->status = 'accepted';
        $reservation->update();
        return back()->with('success', 'Reservation accepted successfully');
    }

    public function reject(Reservation $reservation)
    {
        $reservation->status = 'rejected';
        $reservation->update();
        return back()->with('success', 'Reservation rejected successfully');
    }

    public function downloadTickets(Event $event)
    {
        $reservation = Reservation::where('event_id', $event->id);
        $reservation->is_ticket = true;
        $event->update();
        $data = [
            'title' => $event->title,
            'category' => $event->category->name,
            'start_date' => $event->start_date,
            'adress' => $event->adress,
            'id' => Str::random(10),
        ];
        
        $pdf = FacadePdf::loadView('events.ticket', $data)->setPaper('A6', 'landscape');
        return $pdf->download('ticket.pdf');
    }

    public function yourReservations()
    {
        $reservations = Reservation::where('user_id', auth()->user()->id)
        ->where('is_ticket', 0)
        ->latest()->paginate(3);
        return view('events.your-reservations', compact('reservations'));
    }

    public function payment(Event $event)
    {
        
        $event->places = $event->places - 1;
                $event->update();
                $reservation = Reservation::where('event_id', $event->id)->first();
                $reservation->status = 'accepted';
                $reservation->is_ticket = false;
                $reservation->save();
                Stripe::setApikey(env('STRIPE_SK'));
                $session = Session::create([
                    'payment_method_types' => ['card'],
                    'line_items' => [[
                        'price_data' => [
                            'currency' => 'usd',
                            'product_data' => [
                                'name' => 'T-shirt',
                            ],
                            'unit_amount' => 2000,
                        ],
                        'quantity' => 1,
                    ]],
                    'mode' => 'payment',
                    'success_url' => "http://localhost:80/events/{$event->id}",
                    'cancel_url' => "http://localhost:80/events/{$event->id}",
                ]);
                return redirect()->away($session->url)->with('ticket', 'Event reserved successfully download your ticket');
    }


}
