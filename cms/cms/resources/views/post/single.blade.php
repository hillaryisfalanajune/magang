@extends('layouts.main')

@section('magang')
<div class="row justify-content-center">
    <div class="col-md-6">
            <h1> {{ $post->title }}</h1>
            <h5>
                By: <a href="/post/users/{{$post->author->username}}" class="text-decoration-none">
                    {{ $post->author->name}}</a>,
                In <a href="/post/categories/{{$post->category->slug}}" class="text-decoration-none">
                    {{ $post->category->name }} </a>
                    {{ $post->created_at }}
            </h5>
            <img src="https://source.unsplash.com/1200x500?{{ $post->category->name }}" class="img-fluid"
                 alt="{{ $post->category->name }}">
            <article class="mt-3 fs-5">
                {!! $post->body !!}
            </article>
        <a href="/post">Kembali ke Halaman Berita</a>
    </div>
</div>
@endsection
