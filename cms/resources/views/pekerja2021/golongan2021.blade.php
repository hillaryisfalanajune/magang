@extends('layouts.main')
@section('magang')
<table class="table table-striped table-hover">
    <thead>
        <tr>

            <th scope="col">No</th>
            <th scope="col">Nim</th>
            <th scope="col">Nama</th>
            <th scope="col">Alamat</th>
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
                <td>{{$item->alamat}}</td>
                <td><img src="/images/mhs/{{$item->gambar}}" alt="/mhs/{{$item->id}}" class="img-thumbnail rounded-circle" width="90"></td>
                <td><a href="/mhs/{{$item->nim}}" class="btn btn-warning">Detail</a></td>
            </tr>
    @endforeach
    </tbody>
    </table>

@endsection
