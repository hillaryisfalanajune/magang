@extends('layouts.main')
@section('magang')

<article>

    <p>
        <table class="table table-striped table-hover">
            <h1>Data Pekerja</h1>
            <tr>
                <td>Kode Karyawan</td>
                <td>:</td>
                <td>{{$mhs->kode_karyawan}}</td>

            </tr>
            <tr>
                <td>Nama Karyawab</td>
                <td>:</td>
                <td> {{$mhs->nama_karyawan}}</td>

            </tr>
            <tr>
                <td>No HP </td>
                <td>:</td>
                <td> {{$mhs->notlp}}</td>

            </tr>
            <tr>
                <td>Alamat </td>
                <td>:</td>
                <td> {{$mhs->alamat}}</td>

            </tr>
            <tr>
                <td>Golongan </td>
                <td>:</td>
                <td><a href="/pekeja2021/golongan2021s/{{ $mhs->golongan2021->slug }}">{{ $mhs->golongan2021->slug }}</a></td>
            </tr>


        </table>

    <a href="/pekerja2021">Kembali ke Data Mahasiswa</a>
</article>

@endsection
