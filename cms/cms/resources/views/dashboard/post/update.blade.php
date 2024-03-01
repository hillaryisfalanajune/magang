@extends('dashboard.layouts.main')

@section('admin-sonya')
<div class="row">
    <div class="col-lg-7">
       <form action="/dashboard/post/{{ $post->slug }}" method="post" class="tambah-post" novalidate>
            <!-- Timpa method post menjadi put untuk update-->
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">Title</label>
                <div class="input-group mb-3">
                    <span class="input-group-text"><span data-feather="type"></span></span>
                    <input type="text" required class="form-control @error('title') is-invalid @enderror" 
                    name="title" id="title" value="{{ old('title',$post->title) }}" placeholder="Title" >
                    <div class="invalid-feedback">
                        {{ $errors->has('title') ? $errors->first('title') : 'Silahkan isi Title.'}}
                    </div>
                </div>
            </div>
           
            <div class="mb-3">
                <label for="" class="form-label">Slug</label>
                <div class="input-group mb-3">
                    <span class="input-group-text"><span data-feather="align-left"></span></span>
                    <input type="text" required class="form-control @error('slug') is-invalid @enderror" name="slug" id="slug" value="{{ old('slug',$post->slug) }}" placeholder="Slug" aria-label="Username">
                    <div class="invalid-feedback">
                        {{ $errors->has('slug') ? $errors->first('slug') : 'Silahkan isi Slug.'}}
                    </div>
                </div>
            </div>

             <div class="mb-3">
                <label for="" class="form-label">Kategori</label>
                <select class="form-select form-select-md" name="category_id" id="">
                    @foreach ($kategori as $item)
                        <option value="{{  $item->id }}" {{ old('category_id',$post->category_id) == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>     
                    @endforeach
                </select>
             </div>

             <div class="mb-3">
                <label for="" class="form-label">Excerpt</label>
                <textarea  required class="form-control @error('excerpt') is-invalid @enderror" name="excerpt" id="" rows="3">{{ old('excerpt',$post->excerpt) }}</textarea>
                <div class="invalid-feedback">
                    {{ $errors->has('excerpt') ? $errors->first('excerpt') : 'Silahkan isi Excerpt.'}}
                </div>
             </div>

            <div class="mb-3">
                <label for="" class="form-label">Body</label>
                <input type="text" required class="form-control d-none @error('body') is-invalid @enderror" name="body" id="x" value="{{ old('body',$post->body) }}">
                <div class="invalid-feedback">
                    {{ $errors->has('body') ? $errors->first('body') : 'Silahkan isi Body.'}}
                </div>
                <trix-editor input="x"></trix-editor>
             </div>

             <button type="submit" class="btn btn-primary w-100 mb-3">SIMPAN</button>

       </form>
    </div>
</div>

<script>
    // /dashboard/post/checkSlug?title=Judul Pertama
    // slug -> judul-pertama
    const title = document.getElementById('title');
    const slug = document.getElementById('slug');
    title.addEventListener('change',function(){
        fetch('/dashboard/post/checkSlug?title=' + title.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug)
    });
</script>
@endsection