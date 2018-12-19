<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PesananDetail extends Model
{
    protected $table = 'pesanandetail';
    protected $primaryKey = 'id';

    protected $fillable = [
    	'id_pesanan', 
    	'id_produk', 
    	'harga',
    	'jumlah', 
    	'sub_total'
    ];

    public function pesanan(){
    	return $this->belongsTo('App\Pesanan');
    }
}
