<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.Produk.index', ['title' => 'Barang','Produks' =>  Produk::latest()->filter(request(['search']))->paginate(10)->withQueryString()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.Produk.create',['title'=>'Tambah Barang', 'Produks' => Produk::all(),'jeniskategoris'=>kategori::all()]);
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
                'name' => 'required|max:200|min:5',
                'kategori' => 'required',
                'tanggal' => 'required|',
                'hrg_beli' => 'required|',
                'hrg_jual' => 'required|',
                'stock' => 'required|',
                'gambar' => 'image|file|max:1024',
                'detail' => 'required|min:1000'

            ]
        );
        $validateData['user_id']=auth()->user()->id;
        //jika pilih atau upload gambar//
        if($request->file('gambar')){
            $validateData['gambar'] = $request->file('gambar')->store('post-images');
        }

        Produk::create($validateData);
        return redirect('/dashboard/Produk')->with('success','Data Post Berhasil di Simpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produk  $Produk
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $Produk)
    {
        //return view('dashboard.2021.view', ['title'=>'view', 'post'=> $barangs]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produk  $Produk
     * @return \Illuminate\Http\Response
     */
    public function edit(Produk $Produk)
    {
        //
        return view('dashboard.Produk.update',['title'=>'Edit Barang'.$Produk->name, 'Produk' => $Produk,'namakategoris'=>kategori::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produk  $Produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produk $Produk)
    {
        $rules =
            ['kode' => 'required|max:100|min:5',
            'name' => 'required|max:200|min:5',
            'type2021_id' => 'required',
            'tanggal' => 'required|',
            'hrg_beli' => 'required|',
            'hrg_jual' => 'required|',
            'kondisi' => 'required|',
            'stock' => 'required|',
            'gambar' => 'image|file|max:1024',
            'ket' => 'required|min:30'
            ];

        //Jika data slug yang dikirim tidak sama dengan data slug di table post
        if($request->kode != $Produk->kode){
            //tambahkan validasi untuk cek apakaah ada tau belum
            $rules['kode'] = 'required|unique:Produks';
        }

        //return $request->file('gambar');
        $validateData = $request->validate($rules);
        if($request->file('gambar')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }

            $validateData['gambar'] = $request->file('gambar')->store('post-images');
        }

        Produk::where('id',$Produk->id)->update($validateData);

        return redirect('/dashboard/Produk')->with('success','Data Post Berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produk  $Produk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $Produk)
    {
        //Storage::delete($)
        if($Produk->gambar){
            Storage::delete($Produk->gambar);
        }
        Produk::destroy($Produk->id);
        return redirect('/dashboard/Produk')->with('success','Barang Berhasil dihapus');
    }
}
