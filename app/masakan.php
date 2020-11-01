<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class masakan extends Model
{
        protected $table='masakan';
    protected $fillable=[
    	'nama_masakan','harga','status_masakan','foto',
    ];

    public function detail (){
    	return $this->hasMany('App\detail');
    }
}
