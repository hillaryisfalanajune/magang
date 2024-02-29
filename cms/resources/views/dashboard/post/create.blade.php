@extends('dashboard.layouts.main')

@section('admin-sonya')
<div class="row">
    <div class="col-lg-7">
       <form action="/dashboard/post" method="post" enctype="multipart/form-data" class="tambah-post" novalidate>
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">Title</label>
                <div class="input-group mb-3">
                    <span class="input-group-text"><span data-feather="type"></span></span>
                    <input type="text" required class="form-control @error('title') is-invalid @enderror" 
                    name="title" id="title" value="{{ old('title') }}" placeholder="Title" >
                    <div class="invalid-feedback">
                        {{ $errors->has('title') ? $errors->first('title') : 'Silahkan isi Title.'}}
                    </div>
                </div>
            </div>
           
            <div class="mb-3">
                <label for="" class="form-label">Slug</label>
                <div class="input-group mb-3">
                    <span class="input-group-text"><span data-feather="align-left"></span></span>
                    <input type="text" required class="form-control @error('slug') is-invalid @enderror" name="slug" id="slug" value="{{ old('slug') }}" placeholder="Slug" aria-label="Username">
                    <div class="invalid-feedback">
                        {{ $errors->has('slug') ? $errors->first('slug') : 'Silahkan isi Slug.'}}
                    </div>
                </div>
            </div>

             <div class="mb-3">
                <label for="" class="form-label">Kategori</label>
                <select class="form-select form-select-md" name="category_id" id="">
                    @foreach ($kategori as $item)
                        <option value="{{  $item->id }}" {{ old('category_id') == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>     
                    @endforeach
                </select>
             </div>

             <div class="mb-3">
                <label for="" class="form-label">Excerpt</label>
                <textarea  required class="form-control @error('excerpt') is-invalid @enderror" name="excerpt" id="" rows="3">{{ old('excerpt') }}</textarea>
                <div class="invalid-feedback">
                    {{ $errors->has('excerpt') ? $errors->first('excerpt') : 'Silahkan isi Excerpt.'}}
                </div>
             </div>

            <div class="mb-3">
                <label for="" class="form-label">Pilih Gambar</label>
                <img src="" id="img-preview" class="img-preview img-fluid w-50 mb-2" alt="">
                <input type="file" onchange="previewImage()" class="form-control @error('gambar') is-invalid @enderror" accept="image/*" name="gambar" id="gambar" placeholder="" aria-describedby="fileHelpId">
                <div id="fileHelpId" class="form-text text-danger">Format jpg,jpeg,png</div>
                <div class="invalid-feedback">
                    {{ $errors->has('gambar') ? $errors->first('gambar') : ''}}
                </div>
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Body</label>
                <input type="text" required class="form-control d-none @error('body') is-invalid @enderror" name="body" id="x" value="{{ old('body') }}">
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

    //fungsi preview gambar
    function previewImage(){
        const image = document.getElementById('gambar');
        const imgPreview = document.getElementById('img-preview');

        imgPreview.style.display = 'block';
        const ofReader = new FileReader();
        ofReader.readAsDataURL(image.files[0]);
        ofReader.onload = function(oFREvent){
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>

<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (() => {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    const forms = document.querySelectorAll('.tambah-post')

    // Loop over them and prevent submission
    Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
        if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
        }

        form.classList.add('was-validated')
        }, false)
    })
    })()
</script>
@endsection