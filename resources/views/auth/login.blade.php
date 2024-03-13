@extends('partials.app')
@section('title', 'Login')
@section('content')

        <div class="container py-4 my-5">
          <div class="row">
            <div class="col-md-10">
              <div class="contact-form bg-dark">
                <h1 class="text-white add-letter-space mb-5">Sing In</h1>
                <form method="POST" class="needs-validation" novalidate>
                  @csrf
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group mb-5">
                        <label for="email" class="text-black-300" 
                          >E-Mail Address</label
                        >
                        <input
                          type="email"
                          name="email"
                          id="email"
                          :value="old('email')"
                          class="form-control bg-transparent rounded-0 border-bottom shadow-none pb-15 px-0"
                          placeholder="email"
                          required
                        />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        <p class="invalid-feedback">Your email is required!</p>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group mb-5">
                        <label for="firstName" class="text-black-300"
                          >Your Password</label
                        >
                        <input
                          type="password"
                          id="firstName"
                          name="password"
                          class="form-control bg-transparent rounded-0 border-bottom shadow-none pb-15 px-0"
                          placeholder="password"
                          required
                        />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        <p class="invalid-feedback">
                          Your Password is required!
                        </p>
                      </div>
                    </div>
                    <!-- Remember Me -->
                    <div class="block mt-4">
                      <label for="remember_me" class="inline-flex items-center">
                          <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                          <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                      </label>
                    </div>
                    <div class="col-md-12">
                      <button type="submit" class="btn btn-sm btn-primary">
                        Login <img src="images/arrow-right.png" alt="" />
                      </button>
                      @if (Route::has('password.request'))
                          <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                              {{ __('Forgot your password?') }}
                          </a>
                      @endif
                    </div>
                    <div>
                      <a href="/register">register</a>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
@endsection

