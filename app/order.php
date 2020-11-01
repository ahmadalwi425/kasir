<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
        protected $table='order';
    protected $fillable=[
    	'id_meja','tanggal','id_user','keterangan','status_order'
    ];

    public function user (){
    	return $this->belongsTo('App\user','id_user');
    }

    public function meja (){
    	return $this->belongsTo('App\meja','id_meja');
    }
}
