@extends('partials.app')
@section('title', 'Event-Details')
@section('content')
            <div class="container py-4 my-5">

                <div class="row justify-content-between">
                    <div class="col-lg-10">
                        <img class="img-fluid" src="/images/{{$event->image}}" alt="">
                        <h1 class="text-white add-letter-space mt-4">{{$event->title}}</h1>
                        <ul class="post-meta mt-3 mb-4">
                            <li class="d-inline-block mr-3">
                                <span class="fas fa-clock text-primary"></span>
                                <a class="ml-1" href="#">{{$event->start_date}}</a>
                            </li>
                            <li class="d-inline-block">
                                <span class="fas fa-list-alt text-primary"></span>
                                <a class="ml-1" href="#">{{$event->category->name}}</a>
                            </li>
                            <li class="d-inline-block">
                                {{-- <span class="fas fa-list-alt text-primary"></span> --}}
                                <h4>   {{$event->price}}DH</h4>
                            </li>
                        </ul>
                        <p>{{$event->description}}</p>
                       <div class="widget">
                            <h1 class="widget-title text-white d-inline-block mb-4"></h1>
                            <div class="d-block">
                                @if ($event->type == 'manual_reservation')
                                    <form method="POST" action="{{route('reservations', $event->id)}}">
                                        @csrf
                                        @method('PATCH')
                                        <button class="btn btn-primary" type="submit">Book Now<img src="images/arrow-right.png" alt=""></button>
                                    </form>
                                @else
                                    <form method="POST" action="/booking/{{$event->id}}">
                                        @csrf
                                        <button class="btn btn-primary" type="submit">Book Now<img src="images/arrow-right.png" alt=""></button>
                                    </form>
                                @endif
                            </div>
                            <!-- end buttons -->
                        </div>
                        @if (Session::has('ticket'))
                            <form method="POST" action="/booking/ticket/{{$event->id}}">
                                @csrf
                                <button class="btn btn-success" type="submit">Download your ticket<img src="images/arrow-right.png" alt=""></button>
                            </form>
                            <h2 class="center text-center mt-3">{{Session::get('ticket')}}</h2> 
                        @endif
                        @if (Session::has('success'))
                                        <h2 class="center text-center">{{Session::get('success')}}</h2>
                        @endif 

                    
                        
                    </div>
                </div>
            </div>
@endsection