<nav class="mb-3 navbar navbar-expand-lg sticky-top bg-black navbar-dark" id="navbar">
    <div class="container-fluid">
        <a class="navbar-brand p-1 border-0 position-relative" href="{{ route('dashboard') }}"
            style="color: rgb(255, 145, 0)">Turfzz
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill ">KE</span> </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="mb-2 navbar-nav me-auto mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard') }}" :active="request() - > routeIs('dashboard')">
                        {{ __('Home') }}
                    </a>

                </li>
                <li class="nav-item">
                    <a href="{{ route('lock') }}" :active="request() - > routeIs('')" class="nav-link">
                        {{ __('Lock screen') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('addArena') }}" :active="request() - > routeIs('')" class="nav-link">
                        {{ __('Register New Arena') }}
                    </a>
                </li>







                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        @auth
                            Profile
                        @endauth

                    </a>
                    <ul class="dropdown-menu p-1 bg-black" style="border: solid rgb(255, 145, 0) 0.1px;">
                        <li>
                            <a style="border: none;" href="{{ route('profile.show') }}"
                                class="btn btn-outline-secondary btn-sm w-100">
                                {{ __('Profile') }}
                            </a>
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}" class="mb-0" x-data>


                                @csrf

                                <button style="border: none" class="mt-1 btn btn-sm btn-outline-danger w-100 "
                                    @click.prevent="$root.submit();">
                                    {{ __('Log Out') }}
                                </button>
                            </form>
                        </li>



                    </ul>
                </li>
                <li class="nav-item ">
                    <p class="nav-link" style="color: rgb(255, 145, 0)">
                        Hello, {{ auth()->user()->name }}
                    </p>
                </li>



            </ul>
            @auth
                @if (auth()->user()->role_id === 1)
                    <div class="nav-item">
                        <a class="mb-1 btn btn-sm btn-outline-dark mx-md-4" href="">Requests <span
                                class="badge start-0 top-10 bg-danger rounded-pill">4</span></a>
                    </div>
                @endif
            @endauth


            <form class="d-flex" role="search" method="GET" action="{{ route('dashboard') }}">
                @csrf
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>
