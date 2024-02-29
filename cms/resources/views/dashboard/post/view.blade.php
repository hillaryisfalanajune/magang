@extends('dashboard.layouts.main')
@section('admin-sonya')
<div class="row">
    <div class="col-lg-12">
        <h2>{{ $post->title }}</h2>
        <a href="/dashboard/post" class="btn btn-success text-decoration-none"><span data-feather="arrow-left" class="align-text-bottom"></span> Kembali</a>
        <a href="/dashboard/post/{{ $post->slug }}/edit" class="btn btn-info"><span data-feather="edit"></span> Edit</a>
        <form action="/dashboard/post/{{ $post->slug }}" method="post" class="d-inline">
            <input type="hidden" name="id" value="{{ $post->id }}">
            @method('delete')
            @csrf
            <button type="submit" onclick="return confirm('Apakah anda yakin ingin hapus {{ $post->title }} ?')" class="btn btn-danger"><span data-feather="x-circle"></span> Delete</button>
        </form>

        @if ($post->gambar)
            <img src="{{ asset('storage/'.$post->gambar) }}" class="img-fluid mt-2 d-block" 
            alt="{{ $post->category->name }}">
        @else
            <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" class="img-fluid mt-2 d-block" 
            alt="{{ $post->category->name }}">
        @endif

        <article class="fs-5">
            {!! $post->body !!}
        </article>
    </div>
</div>
@endsection