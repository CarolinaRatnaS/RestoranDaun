<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produk;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produk = Produk::all();

        return view('produk.index', compact('produk'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $produk = new Produk;
        $produk->nama_produk = $request['nama_produk'];
        $produk->kategori = $request['kategori'];

            # code...
        $file = $request->file('inputgambar');
        $nama = rand() . '.' . $file->getClientOriginalExtension();
            // $nama = rand();
        $lokasi = public_path('images/produk');
        $file->move($lokasi, $nama);
        $produk->gambar = $nama;

        $produk->stok = $request['stok'];
        $produk->harga = $request['harga'];

        $produk->save();

        return redirect()->route('produk.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produk = Produk::find($id);
        echo json_encode($expense);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $produk = Produk::find($id);
        $produk->nama_produk = $request['nama_produk'];
        $produk->kategori = $request['kategori'];
        
        if ($request->hasFile('inputgambar')) {
            # code...
            $file = $request->file('inputgambar');
            $nama = rand() . '.' . $file->getClientOriginalExtension();
            $lokasi = public_path('images/produk');
            $file->move($lokasi, $nama);
            $produk->gambar = $nama;
        }

        $produk->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produk = Produk::find($id);
        $produk->delete();
    }
}
