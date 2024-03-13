@extends('partials.app')
@section('title', 'Register')
@section('content')

        <div class="container py-4 my-5">

            <div class="row">
                <div class="col-md-10">
                    <div class="contact-form bg-dark">
                        <h1 class="text-white add-letter-space mb-5">Sing Up</h1>
                        <form method="POST" class="needs-validation" novalidate>
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-5">
                                        <label for="name" class="text-black-300">Your Name</label>
                                        <input type="text" id="firstName" name="name" :value="old('name')" class="form-control bg-transparent rounded-0 border-bottom shadow-none pb-15 px-0" placeholder="Robert Lee" required>
                                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                        <p class="invalid-feedback">Your first-name is required!</p>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group mb-5">
                                        <label for="email" class="text-black-300">E-Mail Address</label>
                                        <input type="email" id="email" name="email" :value="old('email')" class="form-control bg-transparent rounded-0 border-bottom shadow-none pb-15 px-0" placeholder="email" required>
                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                        <p class="invalid-feedback">Your email is required!</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-5">
                                        <label for="password" class="text-black-300">Your Password</label>
                                        <input type="password" id="lastName" name="password" class="form-control bg-transparent rounded-0 border-bottom shadow-none pb-15 px-0" placeholder="password" required>
                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                        <p class="invalid-feedback">Your password is required!</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-5">
                                        <label for="password_confirmation" class="text-black-300">Your Password confirmation</label>
                                        <input type="password" name="password_confirmation" id="lastName" class="form-control bg-transparent rounded-0 border-bottom shadow-none pb-15 px-0" placeholder="confirmation_password" required>
                                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                        <p class="invalid-feedback">Your confirmation password is required!</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-5">
                                        <input type="radio" name="role_id" value="2" id="role_id">
                                        <label for="role_id" class="text-black-300">organizer</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-5">
                                        <input type="radio" name="role_id" value="3" id="role_id">
                                        <label for="role_id" class="text-black-300">user</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-sm btn-primary">Register <img src="images/arrow-right.png" alt=""></button>
                                    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                                        {{ __('Already registered?') }}
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

@endsection
