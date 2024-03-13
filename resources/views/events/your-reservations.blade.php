@extends('partials.app')
@section('title', 'your-reservations')
@section('content')
<div class="container pt-4 mt-3">
    <div class="container mt-5 mb-5">
        <div class="d-flex justify-content-center row">
            <div class="col-md-10">
                @if (count($reservations) > 0)
                    @foreach ($reservations as $reservation)
                    <div class="row p-2 bg-dark border rounded">
                        <div class="col-md-3 mt-4"><img class="img-fluid img-responsive rounded product-image" src="/images/{{$reservation->event->image}}"></div>
                        <div class="col-md-6 mt-1">
                            <h5>{{$reservation->event->title}}</h5>
                            <div class="mt-1 mb-1 spec-1"><span>Category: {{$reservation->event->category->name}}<br></span></div>
                            <span class="">Price: {{$reservation->event->price}}DH</span>
                            <p class="text-justify text-truncate para">{{$reservation->event->description}}</p>
                        </div>
                        <div class="align-items-center align-content-center col-md-3 border-left mt-1">
                            @if(!Session::has('ticket'))
                                @if ($reservation->status == 'pending')
                                    <div class="d-flex flex-column mt-5"><button class="btn btn-light text-dark btn-sm" type="submit">{{$reservation->status}}</button></div>
                                @elseif ($reservation->status == 'accepted')
                                    <form method="POST" action="/payment/{{$reservation->event->id}}">
                                        @csrf
                                        <button class="btn btn-primary" type="submit">Pay to download your ticket<img src="images/arrow-right.png" alt=""></button>
                                    </form>
                                @else
                                @endif
                            @else
                                <form method="POST" action="/booking/ticket/{{$reservation->event->id}}">
                                    @csrf
                                    <button class="btn btn-success" type="submit">Download your ticket<img src="images/arrow-right.png" alt=""></button>
                                </form>
                            @endif
                        </div>
                    </div>
                    @endforeach
                @else
                    <h1>No reservation found</h1>
                @endif
            </div>
        </div>
    </div>
    @if (Session::has('success'))
        <h2 class="center text-center">{{Session::get('success')}}</h2>
    @endif 
    <div class="d-flex justify-content-center mb-3">
        {{ $reservations->links() }}
    </div>
@endsection