<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class level extends Model
{
        protected $table='level';
    protected $fillable=[
    	'nama_level'
    ];

    public function user (){
    	return $this->hasMany('App\user');
    }
}
