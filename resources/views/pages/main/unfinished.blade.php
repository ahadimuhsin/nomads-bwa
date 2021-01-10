@extends('layouts.checkout')

@section('title')
Transaction Unfinished
@endsection

@section('content')
        <main>
        <div class="section-success d-flex align-items-center">
            <div class="col text-center">
            <img src="{{ url('main_page/images/sad.svg') }}" width="100px">
                <h1>Oops!</h1>
                <p>
                    Transaksi Anda belum berhasil
                </p>
                <a href="{{ route('home') }}" class="btn btn-home-page mt-3 px-5">
                    Home Page
                </a>
            </div>
        </div>
    </main>
@endsection
