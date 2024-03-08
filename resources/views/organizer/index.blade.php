@extends('partials.app')
@section('title', 'event')
@section('content')
<div class="container pt-4 mt-3">
    <div class="container mt-5 mb-5">
        <div class="d-flex justify-content-center row">
            <div class="col-md-10">
                @if (count($events) > 0)
                    @foreach ($events as $event)
                    <div class="row p-2 bg-dark border rounded">
                        <div class="col-md-3 mt-4"><img class="img-fluid img-responsive rounded product-image" src="/images/{{$event->image}}"></div>
                        <div class="col-md-6 mt-1">
                            <h5>{{$event->title}}</h5>
                            <div class="mt-1 mb-1 spec-1"><span>Category: {{$event->category->name}}<br></span></div>
                            <div class="mt-1 mb-1 spec-1"><span>type of reservation: {{$event->type}}<br></span></div>
                            <span class="">Price: {{$event->price}}DH</span>
                            <p class="text-justify text-truncate para">{{$event->description}}<</p>
                        </div>
                        <div class="align-items-center align-content-center col-md-3 border-left mt-1">
                                <div class="d-flex flex-column mt-4 text-center">{{$event->status}}</div>
                                <div class="d-flex flex-column mt-5 text-center"><a href="/events/{{$event->id}}/edit/">Edit</a></div>
                        </div>
                    </div>
                    @endforeach
                @else
                    <h1>No event found</h1>
                @endif
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center mb-3">
        {{ $events->links() }}
    </div>

    {{-- <div class="col-lg-4 col-md-5"> --}}
        {{-- <div class="widget text-center">
            <img class="author-thumb-sm rounded-circle d-block mx-auto" src="/images/author-sm.png" alt="">
            <h2 class="widget-title text-white d-inline-block mt-4">About Me</h2>
            <p class="mt-4">Lorem ipsum dolor sit coectetur adiing elit. Tincidunfywjt leo mi, viearra urna. Arcu ve isus, condimentum ut vulpate cursus por turpis.</p>
            <ul class="list-inline mt-3">
                <li class="list-inline-item">
                    <a href="#!" class="text-white text-primary-onHover p-2">
                        <span class="fab fa-twitter"></span>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a href="#!" class="text-white text-primary-onHover p-2">
                        <span class="fab fa-facebook-f"></span>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a href="#!" class="text-white text-primary-onHover p-2">
                        <span class="fab fa-instagram"></span>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a href="#!" class="text-white text-primary-onHover p-2">
                        <span class="fab fa-linkedin-in"></span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- end of author-widget --> --}}
@endsection