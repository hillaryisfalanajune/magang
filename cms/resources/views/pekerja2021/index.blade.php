@extends('layouts.main')
@section('magang')
<table class="table table-striped table-hover">
    <thead>
        <tr>

            <th scope="col">No</th>
            <th scope="col">Kode Karyawan</th>
            <th scope="col">Nama Karyawan</th>
            <th scope="col">Alamat</th>
            <th scope="col">Status</th>
            <th scope="col">Golongan</th>
            <th scope="col">Jumlah Anak</th>
            <th scope="col">Detail</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($data_pekerja2021 as $item)
            <tr class="">
                <td scope="row">{{$loop->iteration}}</td>
                <td>{{$item->kode_karyawan}}</td>
                <td>{{$item->nama_karyawan}}</td>
                <td>{{$item->alamat}}</td>
                <td>{{$item->status}}</td>
                <td>{{$item->golongan_id}}</td>
                <td>{{$item->jumlah_anak}}</td>
                <td><a href="/mhs/{{$item->kode_karyawan}}" class="btn btn-warning">Detail</a></td>
            </tr>
    @endforeach
    </tbody>
    </table>

@endsection
