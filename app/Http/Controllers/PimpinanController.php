<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Mahasiswa;
use App\Tagihan;
use Auth;
use Illuminate\Support\Facades\DB;

class PimpinanController extends Controller
{
    //

      public function __construct(){
      	$this->middleware('pimpinan');
      }

      public function index(){

    	return view('pimpinan.dashboard');	
    }

     public function tagihan(){
  
       //$data_tagihan = Tagihan::all();
       $mahasiswa = Mahasiswa::all();
       $data_tagihan = DB::table('tagihans')->orderBy('tanggal', 'desc')->get();

  
      return view('pimpinan.tagihan', [
          'data_tagihan' => $data_tagihan,
          'data_mahasiswa' => $mahasiswa,          
      ]);
    }

    public function laporan(){

    	//$data_tagihan = Tagihan::all();
    	$tagihan = DB::table('tagihans')->orderBy('tanggal', 'asc')->get();

    	$categories = [];
    	$data = [];

    	foreach ($tagihan as $tg) {
    		$categories[] =  date("d/M/Y", strtotime($tg->tanggal));
    		$data[] = $tg->jumlah;
    	}

    	return view('pimpinan.laporan', [
    		'categories' => $categories,
    		'data' => $data

    	]);
    }
}
