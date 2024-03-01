@extends('dashboard.layouts.main')
@section('admin-magang')
    <div class="row">

        <div class="col-lg-12">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <strong>Info!</strong> {{ session('success') }}
                </div>
            @endif
        </div>

        <div class="col-lg-8">
            <a href="/dashboard/barang2021/create" class="btn btn-success"><span data-feather='plus-circle'></span>
                Tambah</a>
        </div>
        <div class="col-lg-4">
            <form action="/dashboard/barang2021" method="get">
                <div class="input-group flex-nowrap">
                    <input type="text" name="search" value="{{ request('search') }}" class="form-control"
                        placeholder="Cari" aria-label="Username">
                    <button type="submit" class="input-group-text btn btn-outline-success"><span
                            data-feather="search"></span></button>
                </div>
            </form>
        </div>
    </div>

    <div class="table-responsive-lg">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Kode Barang</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Kondisi</th>
                    <th scope="col">Tipe Barang</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach($barang2021s as $item)
                    <tr class="">
                        <td scope="row">{{ $loop->iteration }}  </td>
                        <td>{{ $item->kode }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->kondisi }}</td>
                        <td>{{ $item->type2021->type }}</td>
                        <td>
                            @if ($item->gambar)
                            <img src="{{ asset('storage/'.$item->gambar) }}" style="max-height: 150px" class="img-fluid mt-2 d-block"
                            alt="{{ $item->name }}">
                        @else
                            <img src="https://source.unsplash.com/1200x400? {{ $item->name }}" class="img-fluid mt-2"
                            alt="{{ $item->name }}">
                            @endif
                        </td>
                        @can('admin')
                        <td>
                            <a href="/dashboard/barang2021/{{ $item->kode }}/edit" class="badge bg-primary"><span data-feather="edit"></span></a>

                            <form action="/dashboard/barang2021/{{ $item->kode }}" method="post" class="d-inline" >
                                <!-- Timpa method post menjadi delete -->
                                @method('delete')
                                @csrf
                                <button type="submit" onclick="return confirm('Apakah anda yakin ingin hapus ? {{ $item->name }}')" class="badge bg-danger border-0">
                                    <span data-feather="x-circle">
                                </button>
                            </form>
                        </td>
                        @endcan
                    </tr>
                @endforeach

        </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-end">
        <!--Menampilkan page/halaman-->
        {{ $barang2021s->links() }}
    </div>
@endsection
