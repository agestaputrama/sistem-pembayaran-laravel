<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tagihan extends Model
{
    //

    protected $fillable = [
        'mahasiswa_id', 'tanggal', 'jenis_tagihan', 'status_pembayaran', 'jumlah',
    ];

    public function mahasiswa(){
	    return $this->belongsTo('App\Mahasiswa');
	}
}
