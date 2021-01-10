{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember" style="font-size: 15px">
                                        {{ __('Remember Me') }}
                                    </label>

                                    @if (Route::has('password.request'))
                                    <a class="btn btn-link text-right ml-5" href="{{ route('password.request') }}"
                                    style="font-size: 12px">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                <a class="btn btn-link text-right" href="{{ route('register') }}" style="margin-left: 100px; font-size: 12px">
                                 Registrasi
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login to Nomads</title>
    <link rel="stylesheet" href="{{ asset('main_page/libraries/bootstrap/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('main_page/styles/main.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Assistant:wght@200;300;400;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('fontawesome/css/all.css') }}">
</head>
<body>

    <main class="login-container">
        <div class="container">
            <div class="row page-login d-flex align-items-center">
                <div class="section-left col-12 col-md-6">
                    <h1 class="mb-4">We explore the new
                        <br>life much better</h1>
                    <img src="{{ asset('main_page/images/Group 13.png') }}" alt="Login-image" class="w-75 d-none d-sm-flex">
                </div>
                <div class="section-right col-12 col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center">
                                <img src="{{ asset('main_page/images/logo_nomads.png') }}"
                                alt=""
                                class="w-50 mb-4">
                            </div>
                            <form action="{{ route('login') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="email">Email Address</label>
                                    <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password"
                                    class="form-control"
                                    id="password"
                                    name="password"
                                    >
                                </div>
                                <div class="form-group form-check">
                                    <input type="checkbox"
                                    class="form-check-input"
                                    name="remember_me"
                                    id="remember_me">

                                    <label class="form-check-label" for="remember_me">
                                        Remember Me
                                    </label>
                                </div>

                                <button type="submit" class="btn btn-login btn-block">
                                    Sign In
                                </button>

                                {{-- <div class="form-group"> --}}
                                    <p style="text-align: left;">
                                        <a href="{{ route('password.request') }}">Lupa password?</a>
                                        <span style="float: right;"><a href="{{ route('register') }}">Daftar</a></span>
                                    </p>
                                {{-- </div> --}}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>




<script src="{{ asset('main_page/libraries/jquery/jquery-3.5.1.min.js') }}"></script>
<script src="{{ asset('main_page/libraries/bootstrap/js/bootstrap.js') }}"></script>
<script src="{{ asset('main_page/libraries/retina/retina.min.js') }}"></script>
</body>
</html>
