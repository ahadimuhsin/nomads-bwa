@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Galeri</h1>
        </div>

        {{-- Menampilkan Pesan Error --}}
        @if ($errors->any())
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

                <form action="{{ route('gallery.update', $item->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')

                    <div class="form-group">
                        <label for="travel_packages_id">Paket Travel</label>
                        <select name="travel_packages_id" required class="form-control">
                            <option value="{{ $item->travel_packages_id }}">
                            {{ $item->travel_package->title }}</option>
                            @foreach ($travel_packages as $items)
                            <option value="{{ $items->id }}">
                                {{ $items->title }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    
                    @if($item->image)
                    <div class="form-group">
                        <label for="recent_image">Gambar Sekarang</label>
                        <br>

                        <img src="{{ asset ('storage/'.$item->image) }}" alt="Gambar Galeri Sebelumnya" width="150px" class="img-thumbnail">
                        <br>
                        <label for="image">Image</label>
                        <input type="file" class="form-control" name="image" placeholder="Image">
                    </div>
                    @endif
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
        $(function() {
            $('#price').maskMoney({
                thousands: '.',
                allowZero: false,
                precision: 0
            });
        })

    </script>
@endpush
