@extends('layouts.detail')

@section('title')
    Detail Travel
@endsection

@section('content')
        <main>
        <section class="section-details-header"></section>
            <section class="section-details-content">
                <div class="container">
                    <div class="row">
                        <div class="col p-0">
                            <nav>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        Paket Travel
                                    </li>
                                    <li class="breadcrumb-item active">
                                        Details
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8 pl-lg-0">
                            <div class="card card-details">
                                <h1>{{ $item->title }}</h1>
                                <p>{{ $item->location }}</p>

                                @if($item->galleries->count())
                                <div class="gallery">
                                    <div class="xzoom-container">
                                        <img src="{{ Storage::url($item->galleries->first()->image) }}" alt=""
                                        class="xzoom" id="xzoom-default"
                                        xoriginal="{{ Storage::url($item->galleries->first()->image) }}"
                                        >
                                    </div>
                                    <div class="xzoom-thumbs">
                                        @foreach ($item->galleries as $gallery)

                                        <a href="{{ Storage::url($gallery->image) }}">
                                            <img src="{{ Storage::url($gallery->image) }}"
                                        class="xzoom-gallery" width="128" xpreview="{{ Storage::url($gallery->image) }}">
                                        </a>

                                        @endforeach
                                    </div>
                                </div>
                                @endif

                                <h2>Tentang Wisata</h2>
                                <p>
                                    {!! $item->about !!}
                                </p>

                                <div class="features row">
                                    <div class="col-md-4">
                                        <div class="description">
                                            <img src="{{ asset('main_page/images/ic_event.png') }}" class="featured-images">
                                            <div class="description">
                                                <h3>Featured Event</h3>
                                                <p>{{ $item->featured_event }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 border-left">
                                        <div class="description">
                                            <img src="{{ asset('main_page/images/ic_language.png') }}" class="featured-images">
                                            <div class="description">
                                                <h3>Language</h3>
                                                <p>{{ $item->language }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 border-left">
                                        <div class="description">
                                            <img src="{{ asset('main_page/images/ic_foods.png') }}" class="featured-images">
                                            <div class="description">
                                            <h3>Foods</h3>
                                            <p>{{ $item->foods }}</p>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card card-details card-right" style="margin-right: -5px">
                                <h2>Members are going</h2>
                                <div class="members my-2">
                                    <img src="{{ asset('main_page/images/member 1.jpg') }}" class="member-image">
                                    <img src="{{ asset('main_page/images/member 2.jpg') }}" class="member-image">
                                    <img src="{{ asset('main_page/images/member 3.jpg') }}" class="member-image">
                                    <img src="{{ asset('main_page/images/member 4.jpg') }}" class="member-image">
                                    <img src="{{ asset('main_page/images/Group 10.jpg') }}" class="member-image">
                                </div>
                                <hr>
                                <h2>Trip Information</h2>
                                <table class="trip-information">
                                    <tr>
                                        <th width="30%">Date Of Departure</th>
                                        <td width="70%" class="text-right">
                                            {{ \Carbon\Carbon::create($item->departure_date)->format('F n, Y') }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th width="50%">Duration</th>
                                        <td width="50%" class="text-right">
                                            {{ $item->duration }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th width="50%">Type</th>
                                        <td width="50%" class="text-right">
                                            {{ $item->type }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th width="30%">Price (per person)</small></th>
                                        <td width="70%" class="text-right">
                                            Rp {{ number_format($item->price, 0, '.', '.') }}
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="join-container">
                                @auth
                                    <form action="{{ route('checkout_process', $item->id) }}" method="post">
                                        @csrf
                                        <button class="btn btn-block btn-join-now mt-3 py-2" type="submit">
                                            Join Now
                                        </button>
                                    </form>
                                @endauth
                                @guest
                                    <a href="{{ route('login') }}" class="btn btn-block btn-join-now mt-3 py-2">
                                    Login
                                </a>
                                @endguest
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </section>
    </main>
@endsection

@push('prepend-style')
    <link rel="stylesheet" href="{{ url('main_page/libraries/xzoom/xzoom.css') }}">
@endpush

@push('addon-script')
<script src="{{ url('main_page/libraries/xzoom/xzoom.min.js') }}"></script>
<script>
    $(document).ready(function(){
        $('.xzoom, .xzoom-gallery').xzoom({
            zoomWidth: 500,
            title: false,
            tint: '#333',
            Xoffset: 15
        });
    });
</script>
@endpush
