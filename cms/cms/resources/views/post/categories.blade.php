@extends('layouts.main')
@section('magang')
    <h2 class="text-center mb-3">Category : {{ $category }}</h2>
    @foreach ($data_posts as $item)
        <article class="mb-3">
            <h2>{{ $item->title }}</h2>
            <h5>By : <a href="/post/users/{{ $item->author->username }}">{{ $item->author->name }}</a>,

                In <a href="/post/categories/{{ $item->category->slug }}">{{ $item->category->name }}</a>
            </h5>
            <p>
                {{ $item->excerpt }}
            </p>
            <a href="/post/{{ $item->slug }}">Read More.....</a>
        </article>
    @endforeach
@endsection
