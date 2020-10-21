<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    //
     protected $fillable = [
        'user_id', 'nama', 'nim', 'jurusan', 'semester',
    ];

     public function user(){
        return $this->belongsTo('App\User');
    }

    public function tagihan(){
	    return $this->hasMany('App\Tagihan');
	}
}
