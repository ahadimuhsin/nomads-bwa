@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Transaksi {{ $item->title }}</h1>
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

                <form action="{{ route('transaction.update', $item->id) }}" method="post">
                    @csrf
                    @method('put')

                    <div class="form-group">
                        <label for="transaction_status">Status</label>
                        <select name="transaction_status" required class="form-control">
                            <option value="{{ $item->transaction_status }}">
                            Jangan Ubah ({{ $item->transaction_status }})
                            </option>
                            <option value="IN_CART">IN CART</option>
                            <option value="PENDING">PENDING</option>
                            <option value="SUCCESS">SUCCESS</option>
                            <option value="CANCEL">CANCEL</option>
                            <option value="FAILED">FAILED</option>
                        </select>
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
        })
    </script>
@endpush
