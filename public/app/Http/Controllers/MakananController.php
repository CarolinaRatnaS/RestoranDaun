<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produk;
use App\PesananDetail;
use App\Pesanan;
use Auth;
use DB;
use Redirect;

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

    public function newSession()
    {
        $pesanan = new Pesanan;
        $pesanan->id_user = Auth::user()->id;
        $pesanan->total_item = 0;
        $pesanan->total_harga = 0;
        $pesanan->save();

        session(['idpesanan' => $pesanan->id]);

        return Redirect::route('makanan.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $produk = Produk::where('id', '=', $request['id'])->first();
        $produk->stok -= $request['jumlah'];
        $produk->update();   

        $pesananDetail = new PesananDetail;
        $pesananDetail->id_pesanan = session('idpesanan');
        $pesananDetail->id_produk = $request['id'];
        $pesananDetail->jumlah = $request['jumlah'];
        $pesananDetail->harga = $request['harga_awal'];
        $pesananDetail->sub_total = $request['harga'];
        $pesananDetail->save();

        $pesanan = Pesanan::where('id', '=', session('idpesanan'))->first();
        $pesanan->total_item += $request['jumlah'];
        $pesanan->total_harga += $request['harga'];
        $pesanan->update();

        return Redirect::route('makanan.index');
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
