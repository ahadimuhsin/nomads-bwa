@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Paket Travel {{ $travel->title }}</h1>
        </div>

        {{-- Menampilkan Pesan Error --}}
        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="card shadow">
            <div class="card-body">

                <form action="{{ route('travel-package.update', $travel->id) }}" method="post">
                    @csrf
                    @method('put')

                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="form-control"
                        placeholder="Title" value="{{ old('title', $travel->title) }}">
                    </div>

                    <div class="form-group">
                        <label for="location">Location</label>
                        <input type="text" name="location" id="location" class="form-control"
                        placeholder="Lokasi tempat" value="{{ old('location', $travel->location) }}">
                    </div>

                    <div class="form-group">
                        <label for="about">About</label>
                        <textarea name="about" id="about" rows="10" class="w-100 form-control"
                        placeholder="Tentang perjalanan">{{ old('about', $travel->about) }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="event">Featured Event</label>
                        <input type="text" name="featured_event" id="event" class="form-control"
                        placeholder="Event yang ada di sini" value="{{ old('event', $travel->featured_event) }}">
                    </div>

                    <div class="form-group">
                        <label for="langauge">Language</label>
                        <input type="text" name="language" id="language" class="form-control"
                        placeholder="Bahasa di sini" value="{{ old('language', $travel->language) }}">
                    </div>

                    <div class="form-group">
                        <label for="foods">Foods</label>
                        <input type="text" name="foods" id="foods" class="form-control"
                        placeholder="Makanan Khas" value="{{ old('foods', $travel->foods) }}">
                    </div>

                    <div class="form-group">
                        <label for="departure">Departure Date</label>
                        <input type="text" name="departure_date" id="departure" class="form-control datepicker"
                        placeholder="Tanggal Keberangkatan" value="{{ old('departure_date', $travel->departure_date) }}">
                    </div>

                    <div class="form-group">
                        <label for="type">Type</label>
                        <input type="text" name="type" id="type" class="form-control"
                        placeholder="Tipe Perjalanan" value="{{ old('type', $travel->type) }}">
                    </div>

                    <div class="form-group">
                        <label for="duration">Duration</label>
                        <input type="text" name="duration" id="duration" class="form-control"
                        placeholder="Durasi Travel" value="{{ old('duration', $travel->duration) }}">
                    </div>

                    <div class="form-group">
                        <label for="price">Price (per person)</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Rp.</div>
                            </div>
                            <input type="text" name="price" id="price" class="form-control"
                        placeholder="Harga Paket Travel" value="{{ old('price', number_format($travel->price, 0, '.', '')) }}">
                        </div>
                    </div>

                    <button class="btn btn-primary btn-block" type="submit">
                        Simpan
                    </button>
                </form>

            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

@endsection

@push('additional-script')

<script src="https://cdn.rawgit.com/plentz/jquery-maskmoney/master/dist/jquery.maskMoney.min.js"></script>
    <script>
        $(function(){
            $('#price').maskMoney({thousands: '.', allowZero:false, precision: 0});
        });
        CKEDITOR.replace('about');
    </script>
@endpush
