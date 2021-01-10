@extends('layouts.checkout')


@section('title')
Checkout
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
                                    <li class="breadcrumb-item">
                                        Details
                                    </li>
                                    <li class="breadcrumb-item active">
                                        Checkout
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8 pl-lg-0">
                            <div class="card card-details">
                            @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error}}</li>
                                @endforeach
                                </ul>
                            </div>
                            @endif
                                <h1>Who is Going?</h1>
                                <p>{{ $item->travel_package->title }}, {{ $item->travel_package->location }}</p>

                                <div class="attendee">
                                    <table class="table table-responsive-sm text-center">
                                        <thead>
                                            <tr>
                                                <td>Picture</td>
                                                <td>Name</td>
                                                <td>Nationality</td>
                                                <td>VISA</td>
                                                <td>Passport</td>
                                                <td></td>
                                            </tr>
                                        </thead>
                                        <tody>
                                            @forelse ($item->details as $detail)
                                            <tr>
                                                <td><img src="https://ui-avatars.com/api/?name={{ $detail->username }}" height="60px"
                                                    class="rounded-circle"></td>
                                                <td class="align-middle">{{ $detail->username }}</td>
                                                <td class="align-middle">{{ $detail->nationality }}</td>
                                                <td class="align-middle">{{ $detail->is_visa ? '30 Days' : 'N/A' }}</td>
                                                <td class="align-middle">{{ \Carbon\Carbon::createFromDate($detail->doe_passport) >
                                                \Carbon\Carbon::now() ? 'Active' : 'InActive' }}</td>
                                                <td class="align-middle">
                                                    <a href="{{ route('checkout_remove', $detail->id) }}">
                                                        <img src="{{ url('main_page/images/ic_remove.jpg') }}">
                                                    </a>
                                                </td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="6" class="text-center">
                                                    Data Kosong
                                                </td>
                                            </tr>

                                            @endforelse
                                        </tody>
                                    </table>
                                </div>
                                <div class="member mt-3">
                                    <h2>Add Member</h2>
                                    <form action="{{ route('checkout_create', $item->id) }}" class="form-inline" method="post">
                                        @csrf
                                        <label for="username" class="sr-only">Nama</label>
                                        <input type="text" class="form-control mb-2 mr-sm-2"
                                        id="username"
                                        name="username"
                                        placeholder="Username">

                                        <label for="nationality" class="sr-only">Nationality</label>
                                        <input type="text" class="form-control mb-2 mr-sm-2"
                                        style="width: 50px"
                                        id="nationality"
                                        name="nationality"
                                        placeholder="Nationality">

                                        <label for="is_visa" class="sr-only">VISA</label>
                                        <select class="custom-select mb-2 mr-sm-2" id="is_visa"
                                        name="is_visa" required>
                                        <option value="VISA" selected>VISA</option>
                                        <option value="1">30 Days</option>
                                        <option value="0">N/A</option>
                                        </select>

                                        <label for="doe_passport" class="sr-only">DOE Passport</label>
                                        <div class="input-group mb-2 mr-sm-2">
                                            <input type="text" class="form-control datepicker"
                                            id="doe_passport" name="doe_passport" placeholder="DOE Passport" style="width: 100px" required>
                                        </div>
                                        <button type="submit" class="btn btn-add-now mb-2 px-3">
                                            Add Now
                                        </button>
                                    </form>

                                    <h3 class="mt-2 mb-0">Note</h3>
                                    <p class="disclaimer mb-0">
                                        You are only able to invite member that has registered in Nomads.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card card-details card-right">
                                <h2>Trip Information</h2>
                                <table class="trip-information">
                                    <tr>
                                        <th width="50%">Members</th>
                                        <td width="50%" class="text-right">
                                            {{ $item->details->count() }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th width="50%">Additional VISA</th>
                                        <td width="50%" class="text-right">
                                            Rp {{ $item->additional_visa }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th width="50%">Trip Price</th>
                                        <td width="50%" class="text-right">
                                            Rp {{ number_format($item->travel_package->price, 0, '.', '.') }} / person
                                        </td>
                                    </tr>
                                    <tr>
                                        <th width="50%">Sub Total</th>
                                        <td width="50%" class="text-right">
                                            Rp{{ number_format($item->transaction_total, 0, '.', '.') }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th width="50%">Total (+Unique)</th>
                                        <td width="50%" class="text-right text-total">
                                            <span class="text-blue">Rp {{ number_format($item->transaction_total, 0, '.', '.') }},</span><span class="text-orange">{{ mt_rand(0,99) }}</span>
                                        </td>
                                    </tr>
                                </table>
                                <hr>
                                <h2>Payment Instructions</h2>
                                <p class="payment-instructions">Kamu akan dialihkan ke halaman pembayaran menggunakan Gopay</p>
                                <img src="{{ url('main_page/images/logo-gopay.png') }}" alt="gopay" width="100px">

                                {{-- <div class="bank">
                                    <div class="bank-item pb-3">
                                        <img src="{{ asset('main_page/images/ic_bank.png') }}" class="bank-image">
                                        <div class="description">
                                            <h3>PT Nomads ID</h3>
                                            <p>
                                                0881 8829 8800
                                                <br>
                                                Bank Central Asia
                                            </p>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="bank-item pb-3">
                                        <img src="{{ asset('main_page/images/ic_bank.png') }}" class="bank-image">
                                        <div class="description">
                                            <h3>PT Nomads ID</h3>
                                            <p>
                                                0899 8501 7888
                                                <br>
                                                Bank HSBC
                                            </p>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div> --}}
                            </div>
                            <div class="join-container">
                                <a href="{{ route('checkout_success', $item->id ) }}" class="btn btn-block btn-join-now mt-3 py-2">
                                    Saya Sudah Bayar
                                </a>
                            </div>
                            <div class="text-center mt-3">
                                <a href="{{ route('detail', $item->travel_package->slug) }}" class="text-muted">
                                    Cancel Booking
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </section>
    </main>
@endsection

@push('prepend-style')
    <link rel="stylesheet" href="{{ url('main_page/libraries/gijgo/css/gijgo.min.css') }}">
@endpush

@push('addon-script')
<script src="{{ url('main_page/libraries/gijgo/js/gijgo.min.js') }}"></script>
    <script>
    $(document).ready(function(){
        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd',
            uiLibrary: 'bootstrap4',
            icons: {
                rightIcon: '<img src="{{ url('main_page/images/ic_doe.jpg') }}">',
            }
        });
    });
    </script>

@endpush
