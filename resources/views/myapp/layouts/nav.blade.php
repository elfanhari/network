<nav class="navbar navbar-expand-sm navbar-light bg-light border-bottom">
    <div class="container">

        <a class="navbar-brand" href="#">Network</a>
        <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId"
            aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">

            <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard*') ? 'text-primary' : '' }}" href="{{route('dashboard')}}">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('timeline*') ? 'text-primary' : '' }}" href="{{route('timeline') }}">Timeline</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('explore*') ? 'text-primary' : '' }}" href="{{route('users.index') }}">Explore User</a>
                </li>
            </ul>

            <div class="d-flex my-2 my-lg-0 dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownRightMenuButton"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    {{ Auth::user()->name }}
                </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownRightMenuButton">
                    <li><a class="dropdown-item" href="{{ route('profile', Auth::user()->username) }}">Profile</a></li>
                    <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Edit profile</a></li>
                    <li><a class="dropdown-item" href="{{ route('password.edit') }}">Edit password</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button class="dropdown-item">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>

            <div class="d-flex my-2 my-lg-0">
                {{-- <a href="{{ route('register') }}" class="btn btn-outline-secondary my-2 my-sm-0 me-2">Register</a>
      <a href="{{ route('login') }}" class="btn btn-primary my-2 my-sm-0">Login</a> --}}
            </div>

        </div>
    </div>
</nav>
