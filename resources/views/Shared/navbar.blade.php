<nav class="navbar navbar-expand-lg navbar-dark bg-dark my-1">
    <a class="navbar-brand" href="#">Turfzz <span
            class="badge position-absolute start-20 top-10 translate-middle rounded-pill ">KE</span> </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('home') }}">Home</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">Register</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('signIn') }}">Login</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Profile
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Profile details</a>
                    <a class="dropdown-item" href="#">Manage profile</a>

                </div>
            </li>
            @yield('username')

        </ul>

        <form class="form-inline ">
            <div class="row justify-content-end">
                <div class="col-8"><input class="form-control " type="search" placeholder="Search"
                        aria-label="Search"></div>
                <div class="col-4"><button class="btn btn-outline-success " type="submit">Search</button></div>
            </div>

        </form>
    </div>
</nav>
