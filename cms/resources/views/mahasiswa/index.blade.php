@extends('layouts.main')
@section('magang')
<h3 class="text-center">{{ $title }}</h3>
<div class="row justify-content-center">
    <div class="col-md-6">
        <form action="/mahasiswa" method="get">
            @if (request('jurusan'))
            <input type="hidden" name="jurusan" value="{{ request('jurusan') }}">
            @endif
            <div class="input-group mb-3">
                <input type="text" name="search" value="{{ request('search') }}"class="form-control" placeholder="Search" >
                <button class="btn btn-success" type="submit" >Search</button>
              </div>
        </form>
    </div>
</div>

<div class="table-responsive-lg">
<table class="table table-striped table-hover">
    <thead>
        <tr>

            <th scope="col">No</th>
            <th scope="col">Nim</th>
            <th scope="col">Nama</th>
            <th scope="col">Jurusan</th>
            <th scope="col">Gambar</th>
            <th scope="col">Detail</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($data_mahasiswa as $item)
            <tr class="">
                <td scope="row">{{$loop->iteration}}</td>
                <td>{{$item->nim}}</td>
                <td>{{$item->nama}}</td>
                <td>
                    <a href="/mahasiswa?jurusan={{ $item->jurusan->slug }}"> {{ $item->jurusan->nama_jurusan }}</a>
                </td>

                <td><img src="/images/mhs/{{$item->gambar}}" alt="/mhs/{{$item->id}}" class="img-thumbnail rounded-circle" width="90"></td>
                <td><a href="/mhs/{{$item->nim}}" class="btn btn-warning">Detail</a></td>
            </tr>
    @endforeach
    </tbody>
    </table>
</div>

@endsection
