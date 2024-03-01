@extends('dashboard.layouts.main')
@section('admin-magang')

<div class="row">
    <div class="col-lg-6">
        <form action="/dashboard/produk" method="post" enctype="multipart/form-data" class="tambah-barang" novalidate>
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">Kode Barang</label>
                <div class="input-group">
                    <span class="input-group-text" name="kode" id="basic-addon1"><span
                            data-feather="type"></span></span>
                    <input type="text" class="form-control @error('kode') is-invalid @enderror" name="kode"
                        id="kode" value="{{ old('kode') }}" placeholder="kode" required>
                    <div class="invalid-feedback">
                        {{ $errors->has('kode') ? $errors->first('kode') : 'Silahkan isi kode' }}

                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="" class="form-label">name Barang</label>
                <div class="input-group">
                    <span class="input-group-text" name="name" id="basic-addon1"><span
                            data-feather="align-left"></span></span>
                    <input type="text" class="form-control  @error('name') is-invalid @enderror"
                        value="{{ old('name') }}" name="name" id="name" placeholder="name" required>
                    <div class="invalid-feedback">
                        {{ $errors->has('name') ? $errors->first('name') : 'Silahkan isi name!' }}

                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="" class="form-label">type Barang</label>
                <select class="form-select form-select-md" name="type2021_id" id="">
                    @foreach ($type2021s as $item)
                        <option value="{{ $item->id }}" {{ old('type2021_id') == $item->id ? 'selected' : '' }}>
                            {{ $item->type }} </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
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
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Harga Beli</label>
                <div class="input-group">
                    <span class="input-group-text" name="hrg_beli" id="basic-addon1"><span
                            data-feather="dollar-sign"></span></span>
                    <input type="text" class="form-control  @error('hrg_beli') is-invalid @enderror"
                        value="{{ old('hrg_beli') }}" name="hrg_beli" id="hrg_beli" placeholder="hrg_beli" required>
                    <div class="invalid-feedback">
                        {{ $errors->has('hrg_beli') ? $errors->first('hrg_beli') : 'Silahkan isi hrg_beli!' }}

                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Harga Jual</label>
                <div class="input-group">
                    <span class="input-group-text" name="hrg_jual" id="basic-addon1"><span
                            data-feather="dollar-sign"></span></span>
                    <input type="text" class="form-control  @error('hrg_jual') is-invalid @enderror"
                        value="{{ old('hrg_jual') }}" name="hrg_jual" id="hrg_jual" placeholder="hrg_jual" required>
                    <div class="invalid-feedback">
                        {{ $errors->has('hrg_jual') ? $errors->first('hrg_jual') : 'Silahkan isi hrg_jual!' }}

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
                <label class="form-label">Kondisi</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="kondisi" value="Masih Dijual" {{ old('kondisi') == 'Masih Dijual' ? 'checked' : '' }}>
                    <label class="form-check-label">Masih Dijual</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="kondisi" value="Tidak Dijual" {{ old('kondisi') == 'Tidak Dijual' ? 'checked' : '' }}>
                    <label class="form-check-label">Tidak Dijual</label>
                </div>
                <div class="invalid-feedback">
                    {{ $errors->has('kondisi') ? $errors->first('kondisi') : 'Silahkan Pilih Kondisi Barang.' }}
                </div>
            </div>

            <div class="mb-3">
                <label for="" class="form-label">ket</label>
                <textarea class="form-control  @error('ket') is-invalid @enderror " name="ket" id=""
                     rows="3" required>{{ old('ket') }}</textarea>
                <div class="invalid-feedback">
                    {{ $errors->has('ket') ? $errors->first('ket') : 'Silahkan isi ket!' }}

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
