@extends('partials.app')
@section('title', 'add-Event')
@section('content')
        <div class="container py-4 my-5">
            <div class="row">
                <div class="col-md-10">
                    <div class="contact-form bg-dark">
                        <h1 class="text-white add-letter-space mb-5">Add New Event</h1>
                        <form method="POST" action="/events" class="needs-validation" novalidate enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-5">
                                        <label for="firstName" class="text-black-300">Event Title</label>
                                        <input type="text" id="firstName" name="title" class="form-control bg-transparent rounded-0 border-bottom shadow-none pb-15 px-0" placeholder="Robert Lee" required>
                                        @error('title')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-5">
                                        <label class="text-black-300">Event Category</label>
                                        <select name="category_id" class="d-block w-100">
                                            @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-5">
                                        <label for="lastName" class="text-black-300">Event Date</label>
                                        <input type="datetime-local" name="start_date" id="lastName" class="form-control bg-transparent rounded-0 border-bottom shadow-none pb-15 px-0" placeholder="Anderson" required>
                                        @error('date')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-5">
                                        <label for="lastName" class="text-black-300">Event Adress</label>
                                        <input type="text" name="adress" id="lastName" class="form-control bg-transparent rounded-0 border-bottom shadow-none pb-15 px-0" placeholder="Anderson" required>
                                        @error('adress')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-5">
                                        <label for="lastName" class="text-black-300">Event Places</label>
                                        <input type="number" name="places" id="lastName" class="form-control bg-transparent rounded-0 border-bottom shadow-none pb-15 px-0" placeholder="Anderson" required>
                                        @error('number')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-5">
                                        <label class="text-black-300">Reservation Type</label>
                                        <select name="type" class="d-block w-100">
                                            <option value="manual_reservation">Manual</option>
                                            <option value="automatique_reservation">Automatic</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-5">
                                        <label for="lastName" class="text-black-300">Event Picture</label>
                                        <input type="file" name="image" id="lastName" class="form-control bg-transparent rounded-0 border-bottom shadow-none pb-15 px-0" accept="image/*" placeholder="Anderson" required>
                                        @error('image')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-5">
                                        <label for="lastName" class="text-black-300">Event Price</label>
                                        <input type="number" name="price" id="lastName" class="form-control bg-transparent rounded-0 border-bottom shadow-none pb-15 px-0" placeholder="Anderson" required>
                                        @error('price')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mb-5">
                                        <label for="message" class="text-black-300">Event Description</label>
                                        <textarea name="description" class="form-control bg-transparent rounded-0 border-bottom shadow-none pb-15 px-0" placeholder="Lorem Ipsum is simply dummy text of the printing and..." required></textarea>
                                        @error('description')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-sm btn-primary">Add Now <img src="images/arrow-right.png" alt=""></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection