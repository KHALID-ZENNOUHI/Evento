@extends('partials.app')
@section('title', 'Reservations')
@section('content')
        <div class="container py-4 my-5">
            
            <div class="row">
                <div class="col-12">
                    <div class="bg-dark p-5 mb-5">
                        <div class="row no-gutters">
                            <div class="col-xl-6 border-right border-lg-0 pr-0 pr-xl-5">
                                <h1 class="text-white add-letter-space">Reser Management</h1>
                                <div class="breadcrumb-wrap mt-3">
                                    <a href="index.html">Organizser</a>
                                    <span>/</span>
                                    <span>Reservations</span>
                                </div>
                            </div>
                            <div class="col-xl-6 pl-0 pl-xl-5 mt-4 mt-xl-0">
                                <div class="categores-links text-capitalize">
                                    <h3 class="text-white add-letter-space mb-3">More reservation:</h3>
                                    <a class="border" href="#!">non quiens</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if (count($reservations) > 0)
            <table class="table mb-4 text-light">
              <thead>
                <tr>
                  <th scope="col">Id</th>
                  <th scope="col">name</th>
                  <th scope="col">email</th>
                  <th scope="col">event title</th>
                  <th scope="col">Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach($reservations as $reservation)
                <tr>
                  <th scope="row">{{$reservation->id}}</th>
                  <td>{{$reservation->name}}</td>
                  <td>{{$reservation->email}}</td>
                  <td>{{$reservation->title}}</td>
                    <td>
                      <div class="row">
                        <form method="POST" action="/reservations/reject/{{$reservation->id}}">
                            @csrf
                            @method('PATCH')
                          <button type="submit" class="btn btn-danger">Reject</button>
                        </form>
                        <form method="POST" action="/reservations/accept/{{$reservation->id}}">
                            @csrf
                            @method('PATCH')
                          <button type="submit" class="btn btn-success">Accept</button>
                        </form>
                      </div>
                    </td>
                  </tr>
                @endforeach  
              </tbody>
            </table>
            @else
                <h1 class="centered text-center mb-5">No reservation found</h1>
            @endif
@endsection

