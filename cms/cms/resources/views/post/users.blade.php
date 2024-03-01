@extends('layouts.main')
@section('magang')
    <h2 class="text-center mb-3">By : {{ $author }}</h2>
    @foreach ($data_posts as $item)
        <article class="mb-3">
            <h2>{{ $item->title }}</h2>
            <h5>
                By : {{ $item->author->name }},

                In <a href="/post/categories/{{ $item->category->slug }}"
                    class="text-decoration-none">{{ $item->category->name }}</a>
            </h5>
            <p>
                {{ $item->excerpt }}
            </p>
            <a href="/post/{{ $item->slug }}">Read More.....</a>
        </article>
    @endforeach
@endsection
