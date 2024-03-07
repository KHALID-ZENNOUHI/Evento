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
                                <a class="btn btn-primary" href="/reservation/{{$event->id}}">Take Your Place<img src="images/arrow-right.png" alt=""></a>
                            </div>
                            <!-- end buttons -->
                        </div>

                    
                        
                    </div>
                </div>
            </div>
@endsection