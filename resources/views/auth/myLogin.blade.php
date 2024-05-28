@extends('myLayout')

@section('content')
    <div class="row align-items-center my-5">
        <div class="col-2 col-md-3 col-lg-4"></div>
        <div class="col-8 col-md-6 col-lg-4  justify-content-center rounded">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                Login to continue
                <div>
                    <label for="email">Email</label>
                    <input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                        required autofocus autocomplete="username" />
                </div>

                <div class="mt-4">
                    <label class="form-label" for="password" value="{{ __('Password') }}">Password</label><br>
                    <input id="password" class="form-control" type="password" name="password" required
                        autocomplete="current-password" />
                </div>
                <div class="mt-2 mx-auto">
                    <x-button class=" btn btn-sm btn-primary mt-3 ">
                        {{ __('Log in') }}
                    </x-button>
                </div>

                <div class="flex items-center justify-content-center mt-4 form-text">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif


                </div>
            </form>
        </div>
        <div class="col-2 col-md-3 col-lg-4"></div>

    </div>
@endsection
