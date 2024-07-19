@extends('Shared.layout')

@section('content')
    <div class="row align-items-center my-5">
        <div class="col-2 col-md-3 col-lg-4"></div>
        <div class="col-8 col-md-6 col-lg-4  justify-content-center rounded">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <h4>Login to continue</h4>

                <div>
                    <label for="email" class="form-label">Email</label>
                    <input id="email" class="form-control bg-dark" style="color:bisque;" type="email" name="email"
                        :value="old('email')" required autofocus autocomplete="username" />
                    @error('email')
                        {{ $message }}
                    @enderror
                </div>

                <div class="mt-4">
                    <label class="form-label" for="password" value="{{ __('Password') }}">Password</label><br>
                    <input id="password" class="form-control bg-dark" style="color:bisque;" type="password" name="password"
                        required autocomplete="current-password" />
                    @error('password')
                        {{ $message }}
                    @enderror
                </div>
                <div class="mt-2 mx-auto text-center" style="color:bisque;">
                    <x-button class=" mt-1 rounded btn btn-outline-dark  text-center " style="color:bisque;">
                        {{ __('Log in') }}
                    </x-button>
                </div>

                <div class="flex items-center justify-content-center mt-4 form-text">
                    @if (Route::has('password.request'))
                        <a class="text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif


                </div>
                <div class="flex items-center justify-content-center mt-4 form-text">

                    <a class="text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        href="{{ route('register') }}">
                        {{ __("Don't have an account?") }}
                    </a>

                </div>

            </form>
        </div>
        <div class="col-2 col-md-3 col-lg-4"></div>

    </div>
@endsection
