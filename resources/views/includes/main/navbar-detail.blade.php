    {{-- Navbar --}}
    <div class="container">
        <nav class="row navbar navbar-expand-lg navbar-light bg-white">
            <div class="navbar-nav ml-auto
            mr-auto mr-sm-auto
            mr-lg-0 mr-md-auto">
            <a href="{{ route('home') }}" class="navbar-brand">
                <img src="{{ url('main_page/images/logo_nomads.png') }}">
            </a>
            </div>
            <ul class="navbar-nav mr-auto d-none d-lg-block">
                <li><span class="text-muted">
                    | &nbsp; Beyond the explorer of the world
                </span></li>
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
