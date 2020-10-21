@extends('layouts.master')

@section('content')

<?php

use App\Tagihan;

?>

!-- Main Content -->
  <div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Pembayaran</h1>
      </div>
      
      <div class="row">
        <div class="col-lg-12 col-md-12 col-12 col-sm-12">
          <div class="card">
            <div class="card-header">
              <h4>Pembayaran</h4>
            </div>
            <div class="card-body">

            <div class="row">
            	<div class="col-sm-5">
	             <h5>Data Diri</h5>
	              <div class="table-responsive">
	                <table class="table table-striped table-md">
	                  <tr>
	                    <td style="width: 9em">Nama</td>
	                    <td style="width: 2em">:</td>
	                    <td><b>{{ $mahasiswa->nama }}<b></td>
	                  </tr>
	                  <tr>
	                    <td>Nim</td>
	                    <td>:</td>
	                    <td><b>{{ $mahasiswa->nim }}</b></td>
	                  </tr>
	                  <tr>
	                    <td>Jurusan</td>
	                    <td>:</td>
	                    <td><b>{{ $mahasiswa->jurusan }}</b></td>
	                  </tr>
	                  <tr>
	                    <td>Semester</td>
	                    <td>:</td>
	                    <td><b>{{ $mahasiswa->semester }}</b></td>
	                  </tr>
	                </table>
	              </div>
              </div>

              <div class="col-sm-5">

              <h5>Tagihan yang dibayar</h5>
	              <div class="table-responsive">
	                <table class="table table-striped table-md">
	                  <tr>
	                    <td style="width: 9em">Tanggal</td>
	                    <td style="width: 2em">:</td>
	                    <td><b>{{ date("d/M/Y", strtotime($tagihan->tanggal)) }}<b></td>
	                  </tr>
	                  <tr>
	                    <td>Jenis Tagihan</td>
	                    <td>:</td>
	                    <td><b>{{ $tagihan->jenis_tagihan }}</b></td>
	                  </tr>
	                  <tr>
	                    <td>Jumlah</td>
	                    <td>:</td>
	                    <td><b>Rp. {{ $tagihan->jumlah }}</b></td>
	                  </tr>
	                  <tr>
	                    <td>Semester</td>
	                    <td>:</td>
	                    <td><b>{{ $mahasiswa->semester }}</b></td>
	                  </tr>
	                </table>
	              </div>
          		</div>

              </div>

              <h5>Bank BNI (DiCek Otomatis)</h5>
	              <div class="table-responsive">
	                <table class="table table-striped table-md">
	                  <tr>
	                    <td style="width: 9em">Total Bayar</td>
	                    <td style="width: 2em">:</td>
	                    <td><b><h4>Rp{{ $tagihan->jumlah }}</h4><b></td>
	                  </tr>
	                  <tr>
	                    <td style="width: 9em">No. Rekenig</td>
	                    <td style="width: 2em">:</td>
	                    <td><b>8806 082 2855 58XX X<b></td>
	                  </tr>
	                 
	                </table>
	              </div>

	              <p>Klik tombol dibawah ini jika sudah transfer.</p>

              <a href="{{ url('/tagihan-saya') }}" class="btn btn-success" onclick="<?php Tagihan::where('id', $tagihan->id)
            ->update([
            'status_pembayaran' => 'sudah lunas',
        ]); ?>">Sudah Bayar</a>

          </div>
          </div>
        </div>
       
     

    </section>
  </div>


@endsection