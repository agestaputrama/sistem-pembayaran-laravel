<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Mahasiswa;
use App\Tagihan;
use Auth;
use Illuminate\Support\Facades\DB;

class MahasiswaController extends Controller
{
    
      public function __construct(){
      	$this->middleware('mahasiswa');
      }

      public function index(){

    	return view('mahasiswa.dashboard');
    }

    public function profil(){

      $id = Auth::user()->id;
      $mahasiswa = DB::table('mahasiswas')->where('user_id', $id)->first();

    	return view('mahasiswa.profil', [
        'mahasiswa' => $mahasiswa,

      ]);
    }

    public function tagihan(){
  
       $id = Auth::user()->id;
       $mahasiswa = DB::table('mahasiswas')->where('user_id', $id)->first();
       $data_tagihan = DB::table('tagihans')->where('mahasiswa_id', $mahasiswa->id)->get();

  
      return view('mahasiswa.tagihan', [
          'data_tagihan' => $data_tagihan,
          'mahasiswa' => $mahasiswa,          
      ]);
    }

     public function pembayaran($id){

      $id_mahasiswa = Auth::user()->id;
      $mahasiswa = DB::table('mahasiswas')->where('user_id', $id_mahasiswa)->first();
      $tagihan = Tagihan::find($id);

    

      return view('mahasiswa.pembayaran', [
          'mahasiswa' => $mahasiswa, 
          'tagihan' => $tagihan,

      ]);
     }

     


}
