@extends('myLayout')

@section('content')
    <div class="my-5 row align-items-center">
        <div class="col-2 col-md-3 col-lg-4"></div>
        <div class="rounded col-8 col-md-6 col-lg-4 justify-content-center">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <h4>Screen locked, log in to continue</h4>
                <div>
                    <label for="email" class="form-label">Email</label>
                    <input id="email" class="form-control" type="email" name="email" :value="old('email')" required
                        autofocus autocomplete="username" />
                </div>

                <div class="mt-4">
                    <label class="form-label" for="password" value="{{ __('Password') }}">Password</label><br>
                    <input id="password" class="form-control" type="password" name="password" required
                        autocomplete="current-password" />
                </div>
                <div class="mx-auto mt-2">
                    <x-button class="mt-3 btn btn-sm btn-primary">
                        {{ __('Log in') }}
                    </x-button>
                </div>

                <div class="flex items-center mt-4 justify-content-center form-text">
                    @if (Route::has('password.request'))
                        <a class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
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
