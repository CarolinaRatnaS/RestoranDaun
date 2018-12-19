<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pesanan;
use App\PesananDetail;
use App\Produk;
use Redirect;
use DB;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pesanandetail = PesananDetail::leftJoin('produk','produk.id', '=', 'pesanandetail.id_produk')
            ->where('pesanandetail.id_pesanan', '=', session('idpesanan'))
            ->get();

        // $detailtotal = DB::table('pesanandetail')
        //     ->select(DB::raw('SUM(sub_total)'), array('newsubtotal' => $newsubtotal, ))
        //     ->where('pesanandetail.id_pesanan', '=', session('idpesanan'))
        //     ->get();

        $total = 0;

        foreach ($pesanandetail as $total_akhir) {
            $total += $total_akhir->sub_total;
        }

        return view('pesanan.index', compact('pesanandetail', 'total'));
    }

    public function listData()
    {


        $pesanandetail = PesananDetail::leftJoin('produk','produk.id', '=', 'pesanandetail.id_produk')
            ->where('pesanandetail.id_pesanan', '=', session('idpesanan'))
            ->get();

        $no = 0;
        $data = array();
        foreach ($pesanandetail as $list) {
            $no ++;
            $row = array();
            $row[] = $no;
            $row[] = $list->nama_produk;
            $row[] = $list->harga;
            $row[] = $list->jumlah;
            $row[] = $list->sub_total;
            $row[] = '<div class="btn-group">
                        <a onclick="deleteData('.$list->id.')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a></div>';
            $data[] = $row;
        }
        $output = array("data" => $data);
        return response()->json($output);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pesanandetail = PesananDetail::find($id);
        $pesanandetail->delete();

    }
}
