
@extends('layouts.main')

@section('magang')
    <h3>Nama Lengkap : {{ $nama }}</h3>
    <h3>NoBp : {{ $no_bp }}</h3>
    <h3>Email : {{ $email }}</h3>
    <p>
        <img src="/images/{{$gambar}}" alt="{{$nama}}" class="rounded-circle">
    </p>
@endsection
