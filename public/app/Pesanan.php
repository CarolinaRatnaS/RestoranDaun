<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $table = 'pesanan';
    protected $primaryKey = 'id';

    protected $fillable = [
    	'kode_member', 
    	'id_user', 
    	'total_item', 
    	'total_harga'
    ];

    public function pesanandetail(){
    	return $this->hasMany('App\PesananDetail', 'id_pesanan');
    }
}
