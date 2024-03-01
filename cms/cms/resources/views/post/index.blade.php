@extends('layouts.main')
@section('magang')

<h3 class="text-center"> {{ $title }}</h3>
<div class="row justify-content-center">
    <div class="col-md-6">
        <form action="/post" method="get">
            <!--Jika ada request category simpan kedalam input tipe hidden-->
            @if (request('category'))
                <input type="hidden" name="category" value="{{ request('category') }}">

            @endif

            @if (request('author'))
                <input type="hidden" name="hidden" value="{{ request('author') }}">
            @endif

            <div class="input-group mb-3">
                <input type="text" name="search" class="form-control" value="{{ request('search') }}" placeholder="Search" >
                <button class="btn btn-success" type="submit" >Search</button>
              </div>
        </form>
    </div>
</div>
<!-- jika data ditemukan  atau data tersedia -->
@if ($data_posts->count())
<div class="card mb-3">
    <img src="https://source.unsplash.com/1200x400? {{ $data_posts[0]->category->name }}" class="card-img-top"
     alt="{{ $data_posts[0]->category->name }}">
    <div class="card-body text-center">
        <img src="" alt="">
      <h2 class="card-title">
        <a href="/post/{{ $data_posts[0]->slug }}" class="text-decoration-none text-dark">

        {{ $data_posts[0]->title }}</h2>

        </a>
      <p >
        <small class="text-body-secondary">
            By : <a href="/post?author={{ $data_posts[0]->author->username }}"  class="text-decoration-none">
                {{ $data_posts[0]->author->name }}</a>,
            In <a href="/post?category={{ $data_posts[0]->category->slug }}" class="text-decoration-none">
                {{ $data_posts[0]->category->name }}</a>
            {{ $data_posts[0]->created_at->diffForHumans() }}

        </small>
     </p>
      <p class="card-text">{{ $data_posts[0]->excerpt }}</p>
       <a href="/post/{{ $data_posts[0]->slug }}" class="text-decoration-none btn btn-primary">Reed More...</a>
    </div>
  </div>


      <div class="row">
            @foreach ($data_posts->skip(1) as $item)
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="position-absolute py-2 px-3 " style="background-color: rgba(0, 0, 0, 0.7)">
                           <a href="/post?category={{ $item->category->slug }}" class="text-decoration-none text-white"> {{ $item->category->name }} </a>
                        </div>
                        <img src="https://source.unsplash.com/400x300? {{ $item->category->name }}" class="card-img-top"
                        alt="{{ $item->category->name }}">
                        <div class="card-body">
                            <p class="card-text">
                                <small class="text-body-secondary">
                                    By : <a href="/post?author={{ $item->author->username }}"
                                        class="text-decoration-none"> {{ $item->author->name }}</a>
                                        <span class="text-end">
                                            {{ $item->created_at->diffForHumans() }}
                                        </span>
                                </small>
                            </p>
                          <p class="card-text"> {{ $item->excerpt }}</p>
                          <a href="/post/{{ $item->slug }}" class="text-decoration-none btn btn-primary">Reed More...</a>
                        </div>
                      </div>
                </div>
            @endforeach
      </div>

      <div class="d-flex justify-content-end">
        <!--Menampilkan page/halaman-->
        {{ $data_posts->links() }}
      </div>


@else
<p class="text-center fs-4">Data tidak ditemukan..</p>
 <!-- jika data kosong  atau data tidak ditemukan -->

@endif

@endsection
