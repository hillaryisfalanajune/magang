@extends('dashboard.layouts.main')

@section('admin-magang')
<div class="row">
    <div class="col-lg-7">
       <form action="/dashboard/barang2021/{{ $barang2021->kode }}" method="post" class="tambah-post" enctype="multipart/form-data" novalidate>
            <!-- Timpa method post menjadi put untuk update-->
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">Kode Barang</label>
                <div class="input-group mb-3">
                    <span class="input-group-text"><span data-feather="type"></span></span>
                    <input type="text" required class="form-control @error('kode') is-invalid @enderror"
                    name="kode" id="kode" value="{{ old('kode',$barang2021->kode) }}" placeholder="kode" >
                    <div class="invalid-feedback">
                        {{ $errors->has('kode') ? $errors->first('kode') : 'Silahkan isi kode.'}}
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Nama Barang</label>
                <div class="input-group">
                    <span class="input-group-text" name="name" id="basic-addon1"><span
                            data-feather="align-left"></span></span>
                    <input type="text" class="form-control  @error('name') is-invalid @enderror"
                        value="{{ old('name',$barang2021->name) }}" name="name" id="name" placeholder="name" required>
                    <div class="invalid-feedback">
                        {{ $errors->has('name') ? $errors->first('name') : 'Silahkan isi name!' }}

                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Tipe Barang</label>
                <select class="form-select form-select-md" name="type2021_id" id="">
                    @foreach ($type2021s as $item)
                        <option value="{{  $item->id }}" {{ old('type2021_id',$barang2021->type2021_id) == $item->id ? 'selected' : '' }}>{{ $item->type }}</option>
                    @endforeach
                </select>
             </div>

            <div class="mb-3">
                <label for="" class="form-label">Tanggal Expired</label>
                <div class="input-group">
                    <span class="input-group-text" name="tanggal" id="basic-addon1"><span
                            data-feather="calendar"></span></span>
                    <input type="date" class="form-control  @error('tanggal') is-invalid @enderror"
                        value="{{ old('tanggal',$barang2021->tanggal) }}" name="tanggal" id="tanggal" placeholder="tanggal" required>
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
                        value="{{ old('hrg_beli',$barang2021->hrg_beli) }}" name="hrg_beli" id="hrg_beli" placeholder="hrg_beli" required>
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
                        value="{{ old('hrg_jual',$barang2021->hrg_jual) }}" name="hrg_jual" id="hrg_jual" placeholder="hrg_jual" required>
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
                        value="{{ old('stock',$barang2021->stock) }}" name="stock" id="stock" placeholder="stock" required>
                    <div class="invalid-feedback">
                        {{ $errors->has('stock') ? $errors->first('stock') : 'Silahkan isi stock!' }}

                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Pilih Gambar</label>
                <img src="{{ $barang2021->gambar ? asset('storage/' . $barang2021->gambar) : '' }}" id="img-preview" class="img-preview img-fluid w-50 mb-2 d-block" alt="">
                <input type="hidden" name="oldImage" id="" value="{{ $barang2021->gambar }}">
                <input type="file" onchange="previewImage()" class="form-control @error('gambar') is-invalid @enderror" accept="image/*" name="gambar" id="gambar" placeholder="" aria-describedby="fileHelpId">
                <div id="fileHelpId" class="form-text text-danger">Format jpg,jpeg,png</div>
                <div class="invalid-feedback">
                    {{ $errors->has('gambar') ? $errors->first('gambar') : ''}}
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Kondisi</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="kondisi" value="Masih Dijual" {{ old('kondisi',$barang2021->kondisi) == 'Masih Dijual' ? 'checked' : '' }}>
                    <label class="form-check-label">Masih Dijual</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="kondisi" value="Tidak Dijual" {{ old('kondisi',$barang2021->kondisi) == 'Tidak Dijual' ? 'checked' : '' }}>
                    <label class="form-check-label">Tidak Dijual</label>
                </div>
                <div class="invalid-feedback">
                    {{ $errors->has('kondisi') ? $errors->first('kondisi') : 'Silahkan Pilih Kondisi Barang.' }}
                </div>
            </div>

            <div class="mb-3">
                <label for="" class="form-label">ket</label>
                <textarea class="form-control  @error('ket') is-invalid @enderror " name="ket" id=""
                     rows="3" required>{{ old('ket',$barang2021->ket) }}</textarea>
                <div class="invalid-feedback">
                    {{ $errors->has('ket') ? $errors->first('ket') : 'Silahkan isi ket!' }}

                </div>
            </div>

             <button type="submit" class="btn btn-primary w-100 mb-3">SIMPAN</button>

       </form>
    </div>
</div>

<script>
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
