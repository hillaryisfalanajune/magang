@extends('dashboard.layouts.main')
@section('admin-magang')
   Selamat Datang di BARBEQU
   <div class="container">
    <h1>Pesanan Masuk</h1>
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Produk</th>
                <th>Status</th>
                <th>Alamat Detail</th>

            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Produk 1</td>
                <td>Sudah Dibayar</td>
                <td>Alamat 1</td>
                <td><div class="btn-group">
                    <button type="button" class="btn btn-primary">Teruskan ke seller</button>

                </div></td>

            </tr>
            <tr>
                <td>2</td>
                <td>Produk 2</td>
                <td>Sudah Dibayar</td>
                <td>Alamat 2</td>
                <td><div class="btn-group">
                    <button type="button" class="btn btn-primary">Teruskan ke seller</button>

                </div></td>

            </tr>
            <tr>
                <td>3</td>
                <td>Produk 3</td>
                <td>Sudah Dibayar</td>

                <td>Alamat 3</td>
                <td><div class="btn-group">
                    <button type="button" class="btn btn-primary">Teruskan ke seller</button>

                </div></td>

            </tr>
        </tbody>
    </table>
</div>
@endsection
