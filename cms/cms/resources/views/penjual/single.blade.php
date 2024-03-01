@extends('layouts.main')
@section('sonya-hafizah')

<article>
    
    <p>
        <table class="table table-striped table-hover">
            <h1>Data Mahasiswa</h1>
            <tr>
                <td>Nim </td>
                <td>:</td>
                <td>{{$mhs->nim}}</td>
            
            </tr>
            <tr>
                <td>Nama </td>
                <td>:</td>
                <td> {{$mhs->nama}}</td>
            
            </tr>
            <tr>
                <td>No HP </td>
                <td>:</td>
                <td> {{$mhs->nohp}}</td>
            
            </tr>
            <tr>
                <td>Alamat </td>
                <td>:</td>
                <td> {{$mhs->alamat}}</td>
            
            </tr>
            <tr>
                <td>Jurusan </td>
                <td>:</td>
                <td><a href="/mahasiswa/jurusans/{{ $mhs->jurusan->slug }}">{{ $mhs->jurusan->nama_jurusan }}</a></td> 
            </tr>
            <tr>
                <td>Gambar </td>
                <td>:</td>
                <td> <img src="/images/mhs/{{$mhs->gambar}}" alt="/mhs/{{$mhs->nim}}" class="img-thumbnail rounded-circle" width="90"></td>
            </tr>
           
        </table>
       
    <a href="/mahasiswa">Kembali ke Data Mahasiswa</a>
</article>
    
@endsection