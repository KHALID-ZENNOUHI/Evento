@extends('partials.app')
@section('title', 'home')
@section('content')  
        <div class="container pt-4 mt-5">
            <div class="row justify-content-between">
                <div class="col-lg-7">
                    @if (count($events) > 0)
                    @foreach($events as $event)
                    <div class="card post-item bg-transparent border-0 mb-5">
                        <a href="post-details.html">
                            <img class="card-img-top rounded-1" src="/images/{{$event->image}}" alt="">
                        </a>
                        <div class="card-body px-0">
                            <h2 class="card-title">
                                <a class="text-white opacity-75-onHover" href="post-details.html">{{$event->title}}</a>
                            </h2>
                            <ul class="post-meta mt-3">
                                <li class="d-inline-block mr-3">
                                    <span class="fas fa-clock text-primary"></span>
                                    <a class="ml-1" href="#">{{$event->start_date}}</a>
                                </li>
                                <li class="d-inline-block">
                                    <span class="fas fa-list-alt text-primary"></span>
                                    <a class="ml-1" href="#">{{$event->category->name}}</a>
                                </li>
                                <li class="d-inline-block">
                                    <span class="fas fa-list-alt text-primary"></span>
                                    <a class="ml-1" href="#">{{$event->price}}DH</a>
                                </li>
                            </ul>
                            <p class="card-text text-truncate my-4">{{$event->description}}</p>
                            <a href="/events/{{$event->id}}" class="btn btn-primary">Read More <img src="/images/arrow-right.png" alt=""></a>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <h1 class="text-center">No event found</h1>
                    @endif
                    <!-- end of post-item -->
                    <div class="d-flex justify-content-center mb-3">
                        {{ $events->links() }}
                    </div>
                    
                </div>
                <div class="col-lg-4 col-md-5">
                    @include('partials.search-form')
                </div>
            </div>
        </div>
@endsection

