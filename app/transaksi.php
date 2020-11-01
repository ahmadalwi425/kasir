<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    protected $table='transaksi';
    protected $fillable=[
    	'id_user','id_order','tanggal','total_bayar'
    ];

    public function user (){
    	return $this->belongsTo('App\user','id_user');
    }

    public function order (){
    	return $this->belongsTo('App\order','id_order');
    }
}