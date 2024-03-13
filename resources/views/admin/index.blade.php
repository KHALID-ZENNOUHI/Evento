@extends('partials.app')
@section('title', 'Statistique')
@section('content')
<div class="container py-4 my-5">
<div class="row g-gs">
<div class="col-xxl-3 col-sm-6" bis_skin_checked="1">
    <div class="card bg-dark text-light" bis_skin_checked="1">
        <div class="nk-ecwg nk-ecwg6" bis_skin_checked="1">
            <div class="card-inner" bis_skin_checked="1">
                <div class="card-title-group" bis_skin_checked="1">
                    <div class="card-title" bis_skin_checked="1">
                        <h2 class="title mt-2 text-center">Users</h2>
                    </div>
                </div>
                <div class="data" bis_skin_checked="1">
                    <div class="data-group" bis_skin_checked="1">
                        <div class="amount ml-5 mb-5 text-center" bis_skin_checked="1">{{$countUsers}} users in the platforme</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-xxl-3 col-sm-6" bis_skin_checked="1">
    <div class="card bg-dark text-light" bis_skin_checked="1">
        <div class="nk-ecwg nk-ecwg6" bis_skin_checked="1">
            <div class="card-inner" bis_skin_checked="1">
                <div class="card-title-group" bis_skin_checked="1">
                    <div class="card-title" bis_skin_checked="1">
                        <h2 class="title mt-2 text-center">Events</h2>
                    </div>
                </div>
                <div class="data" bis_skin_checked="1">
                    <div class="data-group" bis_skin_checked="1">
                        <div class="amount ml-5 mb-5 text-center" bis_skin_checked="1">{{$events}} events in the platforme</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-xxl-3 col-sm-6" bis_skin_checked="1">
    <div class="card bg-dark text-light" bis_skin_checked="1">
        <div class="nk-ecwg nk-ecwg6" bis_skin_checked="1">
            <div class="card-inner" bis_skin_checked="1">
                <div class="card-title-group" bis_skin_checked="1">
                    <div class="card-title" bis_skin_checked="1">
                        <h2 class="title mt-2 text-center">Events Approved</h2>
                    </div>
                </div>
                <div class="data" bis_skin_checked="1">
                    <div class="data-group" bis_skin_checked="1">
                        <div class="amount ml-5 mb-5 text-center" bis_skin_checked="1">{{$app_events}} events approved</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-xxl-3 col-sm-6" bis_skin_checked="1">
    <div class="card bg-dark text-light" bis_skin_checked="1">
        <div class="nk-ecwg nk-ecwg6" bis_skin_checked="1">
            <div class="card-inner" bis_skin_checked="1">
                <div class="card-title-group" bis_skin_checked="1">
                    <div class="card-title" bis_skin_checked="1">
                        <h2 class="title mt-2 text-center">Events Rejected</h2>
                    </div>
                </div>
                <div class="data" bis_skin_checked="1">
                    <div class="data-group" bis_skin_checked="1">
                        <div class="amount ml-5 mb-5 text-center" bis_skin_checked="1">{{$rej_events}} events rejected</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<div class="mt-5">
<table class="table mb-4 text-light">
    <thead>
      <tr>
        <th scope="col">No.</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">helolo world!</th>
      </tr>
    </thead>
    <tbody>
      @foreach($users as $user)
      <tr>
        <th scope="row">{{$user->id}}</th>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
          <td>
            <div class="row">
              {{-- <form method="POST" action="/categories/{{$user->id}}">
                  @csrf
                  @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
              </form> --}}
            </td>
        </tr>
      @endforeach  
    </tbody>
  </table>
</div>
@endsection