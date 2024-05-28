<nav class="navbar navbar-expand-lg sticky-top bg-body-tertiary mb-3" id="navbar">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('dashboard') }}">Turfzz</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
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


                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        @auth
                            {{ auth()->user()->name }}
                        @endauth

                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{ route('profile.show') }}" class=" nav-link">
                                {{ __('Profile') }}
                            </a>
                        </li>
                        <li><button type="button" class="btn btn-sm btn-outline-danger  hidden visible-lg"
                                data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                Log out
                            </button>
                            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
                                data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Log out</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to log out?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <form method="POST" action="{{ route('logout') }}" x-data>


                                                @csrf

                                                <x-dropdown-link href="{{ route('logout') }}"
                                                    @click.prevent="$root.submit();">
                                                    {{ __('Log Out') }}
                                                </x-dropdown-link>
                                            </form>
                        </li>


                    </ul>
                </li>
                <li class="nav-item">

                    <form method="POST" action="{{ route('logout') }}" x-data>


                        @csrf

                        <button class="btn btn-sm btn-outline-danger  mt-1 " @click.prevent="$root.submit();">
                            {{ __('Log Out') }}
                        </button>
                    </form>
                </li>

            </ul>
            @auth
                @if (auth()->user()->role_id === 1)
                    <div class="nav-item">
                        <a class="btn btn-sm btn-outline-dark mx-md-4 mb-1" href="">Requests <span
                                class="badge start-0 top-10  bg-danger rounded-pill">4</span></a>
                    </div>
                @endif
            @endauth


            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>
