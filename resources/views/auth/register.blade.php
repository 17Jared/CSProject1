@extends('SHared.layout')

@section('content')
    <div class="row align-items-center my-5">
        <div class="col-2 col-md-3 col-lg-4"></div>
        <div class="col-8 col-md-6 col-lg-4  justify-content-center rounded">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <h4>Create an account to continue</h4>
                <div>
                    <label for="name">Name</label>
                    <input id="name" class="form-control bg-dark" style="color:bisque;" type="text" name="name"
                        required autofocus autocomplete="username" />
                    @error('name')
                        {{ $message }}
                    @enderror
                </div>
                <div class="mt-2">
                    <label for="email">Email</label>
                    <input id="email" class="form-control bg-dark" style="color:bisque;" type="email" name="email"
                        required autofocus autocomplete="username" />
                    @error('email')
                        {{ $message }}
                    @enderror
                </div>

                <div class="mt-2">
                    <label class="form-label" for="password" value="{{ __('Password') }}">Password</label><br>
                    <input id="password" class="form-control bg-dark" style="color:bisque;" type="password" name="password"
                        required autocomplete="current-password" />
                    @error('password')
                        {{ $message }}
                    @enderror
                </div>
                <div class="mt-2">
                    <label class="form-label" for="password_confirmation" value="{{ __('Password') }}">Confirm
                        password</label><br>
                    <input id="password_confirmation" class="form-control bg-dark" style="color:bisque;" type="password"
                        name="password_confirmation" required autocomplete="current-password" />
                    @error('password_confirmation')
                        {{ $message }}
                    @enderror
                </div>



                @error('role')
                    {{ $message }}
                @enderror
                <div class="mt-2 mx-auto text-center">
                    <x-button class=" mt-1 rounded btn btn-outline-dark  " style="color:bisque;">
                        {{ __('Register') }}
                    </x-button>
                </div>

                <div class="flex items-center justify-content-center mt-4 form-text">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            href="{{ route('login') }}">
                            {{ __('Already have an account?') }}
                        </a>
                    @endif


                </div>
            </form>
        </div>
        <div class="col-2 col-md-3 col-lg-4"></div>

    </div>
@endsection
