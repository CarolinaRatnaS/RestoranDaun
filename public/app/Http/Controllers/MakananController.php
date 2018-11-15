<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produk;
use App\PesananDetail;
use DB;

class MakananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produk = DB::table('produk')->where('kategori', '=', 'makanan')->get();
        // $produk = Produk::all();
        return view('makanan.index', compact('produk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        echo json_encode($produk);
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
        // $pesanandetail = Produk::find($id);
        $pesanandetail = New PesananDetail;
        $pesanandetail->id_pesanan = $request['nama_produk'];
        $pesanandetail->kategori = $request['kategori'];
        
        if ($request->hasFile('inputgambar')) {
            # code...
            $file = $request->file('inputgambar');
            $nama = rand() . '.' . $file->getClientOriginalExtension();
            $lokasi = public_path('images/produk');
            $file->move($lokasi, $nama);
            $pesanandetail->gambar = $nama;
        }

        $pesanandetail->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
