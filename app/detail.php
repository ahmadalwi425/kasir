<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detail extends Model
{
    protected $table='detail_order';
    protected $fillable=[
    	'id_order','id_masakan','keterangan','status_detail','harga'
    ];

    public function masakan (){
    	return $this->belongsTo('App\masakan','id_masakan');
    }

    public function order (){
    	return $this->belongsTo('App\order','id_order');
    }
}
