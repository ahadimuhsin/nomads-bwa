@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Paket Travel</h1>

             <a href="{{ route('travel-package.create') }}" class="btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Paket Travel
             </a>
        </div>


        <div class="row">
            <div class="card-body">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Location</th>
                            <th>Type</th>
                            <th>Departure Date</th>
                            <th>Type</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp
                        @forelse ($items as $item)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->location }}</td>
                            <td>{{ $item->type }}</td>
                            @php $formatIndo = date('Y-m-d', strtotime($item->departure_date)); 
                            @endphp
                            <td>{{ dateIndonesia($formatIndo) }}</td>
                            <td>{{ $item->type }}</td>
                            <td>Rp. {{ number_format($item->price, 0, '', '.') }}</td>
                            <td>
                                <form class="d-inline"
                                action="{{ route('travel-package.destroy', $item->id) }}" method="POST"
                                onsubmit="return confirm('Yakin mau hapus {{ $item->title }} ?')">
                                    @csrf
                                    @method('delete')

                                    <a href="{{ route('travel-package.edit', $item->id) }}"
                                        class="btn btn-info"><i class="fa fa-pencil-alt"></i>
                                        Edit
                                    </a>

                                    <button class="btn btn-danger" type="submit">
                                        <i class="fa fa-trash"></i> Hapus
                                    </button>

                                </form>
                            </td>
                        </tr>
                        @empty
                        <td colspan="7" class="text-center">Data kosong</td>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>


    </div>
    <!-- /.container-fluid -->

@endsection

