@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Transaksi</h1>
        </div>


        <div class="row">
            <div class="card-body">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Travel</th>
                            <th>User</th>
                            <th>Visa</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp
                        @forelse ($items as $item)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->travel_package->title }}</td>
                            <td>{{ $item->user->name}}</td>
                            <td>Rp. {{ $item->additional_visa }}</td>
                            <td>Rp. {{ $item->transaction_total }}</td>
                            <td>{{ $item->transaction_status }}</td>
                            <td>
                                <form class="d-inline"
                                action="{{ route('transaction.destroy', $item->id) }}" method="POST"
                                onsubmit="return confirm('Yakin mau hapus {{ $item->title }} ?')">
                                    @csrf
                                    @method('delete')

                                    <a href="{{ route('transaction.edit', $item->id) }}"
                                        class="btn btn-info"><i class="fa fa-pencil-alt"></i>

                                    </a>

                                    <a href="{{ route('transaction.show', $item->id) }}"
                                        class="btn btn-primary"><i class="fa fa-eye"></i>

                                    </a>

                                    <button class="btn btn-danger" type="submit">
                                        <i class="fa fa-trash"></i>
                                    </button>

                                </form>
                            </td>
                        </tr>
                        @empty
                        <td colspan="6" class="text-center">Data kosong</td>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>


    </div>
    <!-- /.container-fluid -->

@endsection

