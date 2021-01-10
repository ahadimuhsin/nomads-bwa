@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Gallery</h1>

            <a href="{{ route('gallery.create') }}" class="btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Gallery
            </a>
        </div>


        <div class="row">
            <div class="card-body">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nomor</th>
                            <th>Nama Travel</th>
                            <th>Gambar</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @php $no = 1; @endphp
                        @forelse ($galleries as $item)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $item->travel_package->title }}</td>
                                <td>
                                    <img src="{{ asset('storage/'.$item->image) }}" alt="Gallery" style="width: 150px"
                                    class="img-thumbnail">
                                </td>
                                <td>
                                    <form class="d-inline" action="{{ route('gallery.destroy', $item->id) }}" method="POST"
                                        onsubmit="return confirm('Yakin mau hapus foto ini ?')">
                                        @csrf
                                        @method('delete')

                                        <a href="{{ route('gallery.edit', $item->id) }}" class="btn btn-info"><i
                                                class="fa fa-pencil-alt"></i>
                                            Edit
                                        </a>

                                        <button class="btn btn-danger" type="submit">
                                            <i class="fa fa-trash"></i> Hapus
                                        </button>

                                    </form>
                                </td>
                            </tr>
                        @empty
                            <td colspan="4" class="text-center">Data kosong</td>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>


    </div>
    <!-- /.container-fluid -->

@endsection
