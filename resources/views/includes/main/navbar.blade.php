    {{-- Navbar --}}
    <div class="container">
        <nav class="row navbar navbar-expand-lg navbar-light bg-white">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ url('main_page/images/logo_nomads.png') }}" alt="Logo Nomads">
            </a>
            <!-- Toggler -->
            <button class="navbar-toggler navbar-toggler-right"
            type="button"
            data-toggle="collapse"
            data-target="#nav_b">
            <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Membuat Menu -->
            <div class="collapse navbar-collapse" id="nav_b">
                <ul class="navbar-nav ml-auto mr-3">
                    <li class="nav-item mx-md-2">
                        <a href="{{ route('home') }}" class="nav-link {{ Request::route()->getName() == 'home' ? 'active' : '' }}">Home</a>
                    </li>
                    <li class="nav-item mx-md-2">
                        <a href="#popular" class="nav-link">Paket Travel</a>
                    </li>
                    <!-- Membuat Menu Dropdown -->
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle"
                        id="navbar-drop"
                        data-toggle="dropdown">
                            Services
                        </a>
                        <div class="dropdown-menu">
                            <a href="#" class="dropdown-item">Link 1</a>
                            <a href="#" class="dropdown-item">Link 2</a>
                            <a href="#" class="dropdown-item">Link 3</a>
                        </div>
                    </li>

                    <li class="nav-item mx-md-2">
                        <a href="#testimoniHeading" class="nav-link">Testimoni</a>
                    </li>
                </ul>


                @guest
                <!-- Mobile Button -->
                <form class="form-inline d-sm-block d-md-none"">
                    <button class="btn btn-login my-2 my-sm-0"
                    type="button"
                    onclick="event.preventDefault(); location.href='{{ url('login') }}'">
                        Masuk
                    </button>
                </form>

                <!-- Desktop Button -->
                <form class="form-inline my-2 my-lg-0 d-none d-md-block"">
                    <button class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4" type="button"
                    onclick="event.preventDefault(); location.href='{{ url('login') }}'">
                        Masuk
                    </button>
                 </form>
                @endguest

                @auth
                    <!-- Mobile Button -->
                <form class="form-inline d-sm-block d-md-none" action="{{ route('logout') }}" method="post">
                    <button class="btn btn-login my-2 my-sm-0" type="submit">
                    @csrf
                        Keluar
                    </button>
                </form>

                <!-- Desktop Button -->
                <form class="form-inline my-2 my-lg-0 d-none d-md-block" action="{{ route('logout') }}" method="post">
                    <button class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4" type="submit">
                        @csrf
                            Keluar
                    </button>
                 </form>

                 {{-- @if(Auth::user()->roles == 'ADMIN')
                    <a class="btn btn-link" href="{{ url('admin') }}">Admin Page</a>
                @endif --}}

                @endauth


            </div>
        </nav>
    </div>
