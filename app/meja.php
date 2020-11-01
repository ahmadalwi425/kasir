<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class meja extends Model
{
        protected $table='meja';
    protected $fillable=[
    	'no_meja','status_meja'
    ];

    public function order (){
    	return $this->hasOne('App\order');
    }
}
