@extends('layouts.checkout')

@section('title')
Transaction Failed
@endsection

@section('content')
        <main>
        <div class="section-success d-flex align-items-center">
            <div class="col text-center">
            <img src="{{ url('main_page/images/failure.png') }}" width="300px">
                <h1>Oops!</h1>
                <p>
                    Transaksi kamu gagal<br>
                    Mohon hubungi <a href="#footer">Customer Service</a>
                </p>
                <a href="{{ route('home') }}" class="btn btn-home-page mt-3 px-5">
                    Home Page
                </a>
            </div>
        </div>
    </main>
@endsection
