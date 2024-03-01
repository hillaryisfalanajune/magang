@extends('dashboard.layouts.main')
@section('admin-sonya')
<div class="row">
    <div class="col-lg-12">
        @if (session('success'))
          <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <strong>Info</strong> {{ session('success') }}
          </div>
        @endif
    </div>

    <div class="col-lg-8">
        <a href="/dashboard/post/create" class="btn btn-success"><span data-feather='plus-circle'></span> Tambah</a>
    </div>

    <div class="col-lg-4 col-sm-4 col-xs-4 mt-2">
        <form action="/dashboard/post" method="get">
            <div class="input-group flex-nowrap">
                <input type="text" class="form-control" placeholder="Cari" aria-label="Username" value="{{ request('search') }}" 
                name="search" aria-describedby="addon-wrapping">
                <button type="submit" class="input-group-text btn btn-outline-success"><span data-feather="search"></span> </button>
            </div>
        </form>
    </div>
</div>

<div class="table-responsive-lg">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Kategori</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $item)
                <tr class="">
                    <td scope="row">{{ $posts->firstItem() + $loop->index}}</td>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->category->name }}</td>
                    <td>
                        <a href="/dashboard/post/{{ $item->slug }}" class="badge bg-warning"><span data-feather="eye"></span></a>

                        <a href="/dashboard/post/{{ $item->slug }}/edit" class="badge bg-primary"><span data-feather="edit"></span></a>

                        <form action="/dashboard/post/{{ $item->slug }}" class="d-inline" method="post">
                            <!-- Timpa method post menjadi delete -->
                            @method('delete')
                            @csrf
                            <button type="submit" onclick="return confirm('Apakah anda yakin ingin hapus ? {{ $item->title }}')" class="badge bg-danger border-0">
                                <span data-feather="x-circle">
                            </button>
                        </form>
                    </td>
                </tr>   
            @endforeach
        </tbody>
    </table>
</div>
<div class="d-flex justify-content-end">
    <!--Menampilkan page/halaman-->
    {{ $posts->links() }}
</div>
@endsection