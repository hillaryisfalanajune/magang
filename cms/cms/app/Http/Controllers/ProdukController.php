<?php

namespace App\Http\Controllers;

<<<<<<< HEAD:cms/app/Http/Controllers/ProdukController.php

use App\Models\Kategori;
use App\Models\Produk;

=======
use App\Models\Barang2021;
use App\Models\Produk;
use App\Models\Type2021;
>>>>>>> 21b333dc133547b2e04d2c931ee78ca84fc38a37:cms/cms/app/Http/Controllers/ProdukController.php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Barang2021Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
<<<<<<< HEAD:cms/app/Http/Controllers/ProdukController.php
        return view('produk.index', ['title' => 'Produk','produks' =>  Produk::latest()->filter(request(['search']))->paginate(10)->withQueryString()]);
=======
        return view('dashboard.produk.index', ['title' => 'Produk','produks' =>  Produk::latest()->filter(request(['search']))->paginate(10)->withQueryString()]);
>>>>>>> 21b333dc133547b2e04d2c931ee78ca84fc38a37:cms/cms/app/Http/Controllers/ProdukController.php
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
<<<<<<< HEAD:cms/app/Http/Controllers/ProdukController.php
        return view('produk.create',['title'=>'Tambah Barang', 'produks' => Produk::all(),'kategoris'=>Kategori::all()]);
=======
        return view('dashboard.produk.create',['title'=>'Tambah Barang', 'produks' => Produk::all(),'type2021s'=>Type2021::all()]);
>>>>>>> 21b333dc133547b2e04d2c931ee78ca84fc38a37:cms/cms/app/Http/Controllers/ProdukController.php
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate
        (
            [
                'kode' => 'required|max:100|min:5',
                'nama_produk' => 'required|max:200|min:5',
                'id_kategori' => 'required',
                'harga' => 'required|',
                'detail' => 'required|min:30',
                'stock' => 'required|',
                'gambar' => 'image|file|max:1024',


            ]
        );
        $validateData['user_id']=auth()->user()->id;
        //jika pilih atau upload gambar//
        if($request->file('gambar')){
            $validateData['gambar'] = $request->file('gambar')->store('post-images');
        }

        Produk::create($validateData);
<<<<<<< HEAD:cms/app/Http/Controllers/ProdukController.php
        return redirect('/produk')->with('success','Data Post Berhasil di Simpan');
=======
        return redirect('/dashboard/produk')->with('success','Data Post Berhasil di Simpan');
>>>>>>> 21b333dc133547b2e04d2c931ee78ca84fc38a37:cms/cms/app/Http/Controllers/ProdukController.php
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk)
    {
        //return view('dashboard.2021.view', ['title'=>'view', 'post'=> $barangs]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit(Produk $produk)
    {
        //
<<<<<<< HEAD:cms/app/Http/Controllers/ProdukController.php
        return view('produk.update',['title'=>'Edit Produk'.$produk->name, 'produk' => $produk,'kategoris'=>Kategori::all()]);
=======
        return view('dashboard.produk.update',['title'=>'Edit Produk'.$produk->name, 'produk' => $produk,'kategoris'=>Kategori::all()]);
>>>>>>> 21b333dc133547b2e04d2c931ee78ca84fc38a37:cms/cms/app/Http/Controllers/ProdukController.php
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
<<<<<<< HEAD:cms/app/Http/Controllers/ProdukController.php
     * @param  \App\Models\Produk  $produk
=======
     * @param  \App\Models\Barang2021  $barang2021
>>>>>>> 21b333dc133547b2e04d2c931ee78ca84fc38a37:cms/cms/app/Http/Controllers/ProdukController.php
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produk $produk)
    {
        $rules =
            ['kode' => 'required|max:100|min:5',
            'nama_produk' => 'required|max:200|min:5',
            'id_kategori' => 'required',
            'harga' => 'required|',
            'detail' => 'required|min:30',
            'stock' => 'required|',
            'gambar' => 'image|file|max:1024',

            ];

        //Jika data slug yang dikirim tidak sama dengan data slug di table post
        if($request->kode != $produk->kode){
            //tambahkan validasi untuk cek apakaah ada tau belum
            $rules['kode'] = 'required|unique:produks';
        }

        //return $request->file('gambar');
        $validateData = $request->validate($rules);
        if($request->file('gambar')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }

            $validateData['gambar'] = $request->file('gambar')->store('post-images');
        }

        Produk::where('id',$produk->id)->update($validateData);

<<<<<<< HEAD:cms/app/Http/Controllers/ProdukController.php
        return redirect('/produk')->with('success','Data Post Berhasil diupdate');
=======
        return redirect('/dashboard/produk')->with('success','Data Post Berhasil diupdate');
>>>>>>> 21b333dc133547b2e04d2c931ee78ca84fc38a37:cms/cms/app/Http/Controllers/ProdukController.php
    }

    /**
     * Remove the specified resource from storage.
     *
<<<<<<< HEAD:cms/app/Http/Controllers/ProdukController.php
     * @param  \App\Models\Produk  $produk
=======
     * @param  \App\Models\Barang2021  $barang2021
>>>>>>> 21b333dc133547b2e04d2c931ee78ca84fc38a37:cms/cms/app/Http/Controllers/ProdukController.php
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $produk)
    {
        //Storage::delete($)
        if($produk->gambar){
            Storage::delete($produk->gambar);
        }
        Produk::destroy($produk->id);
<<<<<<< HEAD:cms/app/Http/Controllers/ProdukController.php
        return redirect('/produk')->with('success','Barang Berhasil dihapus');
=======
        return redirect('/dashboard/produk')->with('success','Barang Berhasil dihapus');
>>>>>>> 21b333dc133547b2e04d2c931ee78ca84fc38a37:cms/cms/app/Http/Controllers/ProdukController.php
    }
}
