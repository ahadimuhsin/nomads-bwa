@extends('layouts.checkout')

@section('content')

<div class="container" style="margin-top: 50px">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <h4 class="text-center">Daftarkan Akunmu</h4>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('register') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" required class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                             @enderror
                        </div>

                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" required class="form-control @error('username') is-invalid @enderror" name="username" id="username" value="{{ old('username') }}">
                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                             @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}" required>
                            @error('email')
                                 <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                             @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" required>
                            @error('password')
                                 <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                             @enderror
                        </div>

                        <div class="form-group">
                            <label for="password-confirm">Password Confirmation</label>
                            <input type="password" id="password-confirm" name="password_confirmation" required class="form-control" autocomplete="new-password">
                        </div>

                        <div class="form-group">
                            {{-- <div class="col-md-6 offset-md-4"> --}}
                                <button type="submit" class="btn btn-login btn-block">
                                    Sign In
                                </button>
                            {{-- </div> --}}
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
