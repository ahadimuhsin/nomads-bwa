@extends('layouts.app')

@section('title')
Nomads
@endsection

@section('content')
{{-- Flash Message After Registrasi/Login --}}
{{-- @if ($message = Session::get('success')) --}}
    {{-- <div class="row mt-5"> --}}
        {{-- <div class="col-md-6"> --}}
            {{-- <div class="alert alert-success alert-dismissible offset-6 fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                    {{ $message }}
            </div>
        {{-- </div> --}}
    {{-- </div> --}}
{{-- @endif --}}
   <!-- Header -->
    <header class="text-center">
        <h1>Explore The Beautiful World
            <br>
            As Easy One Click</h1>
            <p class="mt-3">
                You will see beautiful
            <br>moment you never see before
            </p>

            <a href="#popular" class="btn btn-get-started px-4 mt-4">Get Started</a>
    </header>
    <!-- Main Menu -->
    <main>
        <div class="container">
            <!-- Statistics -->
            <section class="section-stats row
            justify-content-center" id="stats">
            <div class="col-3 md-2 stats-detail">
                <h2>20K</h2>
                <p>Members</p>
            </div>
            <div class="col-3 md-2 stats-detail">
                <h2>12</h2>
                <p>Countries</p>
            </div>
            <div class="col-3 md-2 stats-detail">
                <h2>3K</h2>
                <p>Hotels</p>
            </div>
            <div class="col-3 md-2 stats-detail">
                <h2>7</h2>
                <p>Partners</p>
            </div>
            </section>
        </div>
        <!-- Popular Content -->
        <section class="section-popular" id="popular">
            <div class="container">
                <div class="row">
                    <div class="col text-center section-popular-heading">
                        <h2>Wisata Popular</h2>
                        <p>Something that you never try
                            <br>before in this world</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="section-popular-content"
        id="popularContent">
            <div class="container">
                <div class="section-popular-travel row justify-content-center">
                    <!-- Daftar Wisata Popular 1-->
                    @foreach ($items as $item)
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="card-travel text-center d-flex
                        flex-column"
                        style="background-image: url('{{ $item->galleries->count() ? Storage::url($item->galleries->first()->image) : '' }}');">
                            <div class="travel-country">
                                {{ $item->location }}
                            </div>
                            <div class="travel-location">{{ $item->title }}</div>
                            <div class="travel-button mt-auto">
                                <a href="{{ route('detail', $item->slug) }}" class="btn btn-travel-details px-4">
                                    View Details
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- Networks -->
        <section class="section-networks" id="networks">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <h2>Our Networks</h2>
                        <p>
                            Companies are trusted us
                            <br>more than just a trip
                        </p>
                    </div>
                    <div class="col-md-8 text-center">
                        <img src="{{ url('main_page/images/logos_partner.png') }}" alt=""
                        class="img-partner">
                    </div>
                </div>
            </div>
        </section>

        <!-- Testimoni -->
        <section class="section-testimoni-heading" id="testimoniHeading">
            <div class="container">
                <div class="row">
                    <div class="col text-center">
                        <h2>They Are Loving Us</h2>
                        <p>Moments were giving them
                            <br>the best experience</p>

                    </div>
                </div>
            </div>
        </section>

        <section class="section-testimoni-content" id="testimoniContent">
            <div class="container">
                <div class="section-popular-travel row justify-content-center">
                    <!-- Testimoni 1 -->
                    <div class="col-sm-6 col-md-6 col-lg-4">
                        <div class="card card-testimoni text-center">
                            <div class="testimoni-content">
                                <img src="{{ url('main_page/images/user_pic1.png') }}" alt="User"
                                class="mb-4 mt-4 rounded-circle">
                                <h3 class="mb-4">Angga Risky</h3>
                                <p class="testimoni">
                                    “ It was glorious and I could
                                    not stop to say wohooo for
                                    every single moment
                                    Dankeeeeee “
                                </p>
                            </div>
                            <hr>
                            <p class="trip-to mt-2">
                                Trip To Ubud
                            </p>
                        </div>
                    </div>

                    <!-- Testimoni 2 -->
                    <div class="col-sm-6 col-md-6 col-lg-4">
                        <div class="card card-testimoni text-center">
                            <div class="testimoni-content">
                                <img src="{{ url('main_page/images/user_pic2.png') }}" alt="User"
                                class="mb-4 mt-4 rounded-circle">
                                <h3 class="mb-4">Shayna</h3>
                                <p class="testimoni">
                                    “ The trip was amazing and
                                    I saw something beautiful in
                                    that Island that makes me
                                    want to learn more “
                                </p>
                            </div>
                            <hr>
                            <p class="trip-to mt-2">
                                Trip To Nusa Penida
                            </p>
                        </div>
                    </div>
                    <!-- Testimoni 3 -->
                    <div class="col-sm-6 col-md-6 col-lg-4">
                        <div class="card card-testimoni text-center">
                            <div class="testimoni-content">
                                <img src="{{ url('main_page/images/user_pic3.png') }}" alt="User"
                                class="mb-4 mt-4 rounded-circle">
                                <h3 class="mb-4">Shabrina</h3>
                                <p class="testimoni">
                                    “ I loved it when the waves
                                    was shaking harder — I was
                                    scared too “
                                </p>
                            </div>
                            <hr>
                            <p class="trip-to mt-2">
                                Trip To Karimun Jawa
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 text-center">
                        <a href="#" class="btn btn-need-help px-4 mt-4 mx-1">
                            I Need Help
                        </a>
                        <a href="{{ route('register') }}" class="btn btn-get-started px-4 mt-4 mx-1">
                            Get Started
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
