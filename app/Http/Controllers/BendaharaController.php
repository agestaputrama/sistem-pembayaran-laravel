<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mahasiswa;
use App\Tagihan;
use Illuminate\Support\Facades\DB;


class BendaharaController extends Controller
{
    //

      public function __construct(){
      	$this->middleware('bendahara');
      }

      public function index(){

    	return view('bendahara.dashboard');	
    }

    public function mahasiswa(){

       $data_mahasiswa = Mahasiswa::all();

    	return view('bendahara.mahasiswa', [
          'data_mahasiswa' => $data_mahasiswa,

      ]);
    }

    public function tagihan(){

       //$data_tagihan = Tagihan::all();
       $mahasiswa = Mahasiswa::all();
       $data_tagihan = DB::table('tagihans')->orderBy('tanggal', 'desc')->get();
  
      return view('bendahara.tagihan', [
          'data_tagihan' => $data_tagihan,
          'data_mahasiswa' => $mahasiswa,          
      ]);
    }



     public function store(Request $request)
    {
        //      
        
        Tagihan::create($request->all());

        return redirect('/data-tagihan')->with('sukses','Data berhasil ditambah');
        
    }


}
