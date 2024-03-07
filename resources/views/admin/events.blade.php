@extends('partials.app')
@section('title', 'event')
@section('content')
<div class="container pt-4 mt-3">
<div class="bg-dark p-5 mb-5" bis_skin_checked="1">
    <div class="row no-gutters" bis_skin_checked="1">
        <div class="col-xl-6 border-right border-lg-0 pr-0 pr-xl-5" bis_skin_checked="1">
            <h1 class="text-white add-letter-space">Event Management</h1>
            <div class="breadcrumb-wrap mt-3" bis_skin_checked="1">
                <a href="index.html">Dashboard</a>
                <span>/</span>
                <span>Event</span>
            </div>
        </div>
        <div class="col-xl-6 pl-0 pl-xl-5 mt-4 mt-xl-0" bis_skin_checked="1">
            <div class="categores-links text-capitalize" bis_skin_checked="1">
                <h3 class="text-white add-letter-space mb-3">More Events:</h3>
                <a class="border" href="#!">adicing enim</a>
            </div>
        </div>
    </div>
</div>

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
                            <p class="text-justify text-truncate para">{{$event->description}}</p>
                        </div>
                        <div class="align-items-center align-content-center col-md-3 border-left mt-1">
                            <form method="POST" action="{{route('admin.events.accept', $event->id)}}">
                                @csrf
                                @method('PATCH')
                                <div class="d-flex flex-column mt-3"><button class="btn btn-success btn-sm" type="submit">accept</button></div>
                            </form>
                            <form method="POST" action="{{route('admin.events.reject', $event->id)}}">
                                @csrf
                                @method('PATCH')
                                <div class="d-flex flex-column mt-5"><button class="btn btn-danger btn-sm" type="submit">Reject</button></div>
                            </form>
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