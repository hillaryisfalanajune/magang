@extends('dashboard.layouts.main')
@section('admin-magang')

<div class="row">
    <div class="col-lg-6">
        <form action="/produk" method="post" enctype="multipart/form-data" class="tambah-barang" novalidate>
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">id Barang</label>
                <div class="input-group">
                    <span class="input-group-text" name="id" id="basic-addon1"><span
                            data-feather="type"></span></span>
                    <input type="text" class="form-control @error('id') is-invalid @enderror" name="id"
                        id="id" value="{{ old('id') }}" placeholder="id" required>
                    <div class="invalid-feedback">
                        {{ $errors->has('id') ? $errors->first('id') : 'Silahkan isi id' }}

                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="" class="form-label">nama Barang</label>
                <div class="input-group">
                    <span class="input-group-text" name="nama_produk" id="basic-addon1"><span
                            data-feather="align-left"></span></span>
                    <input type="text" class="form-control  @error('nama_produk') is-invalid @enderror"
                        value="{{ old('nama_produk') }}" name="nama_produk" id="nama_produk" placeholder="nama_produk" required>
                    <div class="invalid-feedback">
                        {{ $errors->has('nama_produk') ? $errors->first('nama_produk') : 'Silahkan isi nama produk!' }}

                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Kategori</label>
                <select class="form-select form-select-md" name="kategori_id" id="">
                    @foreach ($kategoriss as $item)
                        <option value="{{ $item->id }}" {{ old('kategori_id') == $item->id ? 'selected' : '' }}>
                            {{ $item->type }} </option>
                    @endforeach
                </select>
            </div>

            {{-- <div class="mb-3">
                <label for="" class="form-label">Tanggal Expired</label>
                <div class="input-group">
                    <span class="input-group-text" name="tanggal" id="basic-addon1"><span
                            data-feather="calendar"></span></span>
                    <input type="date" class="form-control  @error('tanggal') is-invalid @enderror"
                        value="{{ old('tanggal') }}" name="tanggal" id="tanggal" placeholder="tanggal" required>
                    <div class="invalid-feedback">
                        {{ $errors->has('tanggal') ? $errors->first('tanggal') : 'Silahkan isi tanggal!' }}

                    </div>
                </div>
            </div> --}}

            <div class="mb-3">
                <label for="" class="form-label">Harga</label>
                <div class="input-group">
                    <span class="input-group-text" name="harga" id="basic-addon1"><span
                            data-feather="dollar-sign"></span></span>
                    <input type="text" class="form-control  @error('harga') is-invalid @enderror"
                        value="{{ old('harga') }}" name="harga" id="harga" placeholder="harga" required>
                    <div class="invalid-feedback">
                        {{ $errors->has('harga') ? $errors->first('harga') : 'Silahkan isi harga!' }}

                    </div>
                </div>
            </div>



            <div class="mb-3">
                <label for="" class="form-label">Stok</label>
                <div class="input-group">
                    <span class="input-group-text" name="stock" id="basic-addon1"><span
                            data-feather="layers"></span></span>
                    <input type="text" class="form-control  @error('stock') is-invalid @enderror"
                        value="{{ old('stock') }}" name="stock" id="stock" placeholder="stock" required>
                    <div class="invalid-feedback">
                        {{ $errors->has('stock') ? $errors->first('stock') : 'Silahkan isi stock!' }}

                    </div>
                </div>
            </div>


            <div class="mb-3">
              <label for="" class="form-label"> Gambar</label>
              <img src="" id="img-preview" class="img-preview img-fluid w-30" alt="">
              <input type="file" onchange="previewImage()" class="form-control @error('gambar') is-invalid @enderror" accept="image/*" name="gambar" id="gambar" placeholder="" aria-describedby="fileHelpId">
              <div id="fileHelpId" class="form-text text-danger">Format jpg,jpeg,png</div>
                <div class="invalid-feedback">
                {{ $errors->has('gambar') ? $errors->first('gambar') : '' }}
                </div>
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Detail</label>
                <textarea class="form-control  @error('detail') is-invalid @enderror " name="detail" id=""
                     rows="3" required>{{ old('detail') }}</textarea>
                <div class="invalid-feedback">
                    {{ $errors->has('detail') ? $errors->first('detail') : 'Silahkan isi detail!' }}

                </div>
            </div>

            <button type="submit" class="btn btn-primary w-100 mb-3">SIMPAN</button>

        </form>
    </div>
</div>

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
</script><script>
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

@endsection
