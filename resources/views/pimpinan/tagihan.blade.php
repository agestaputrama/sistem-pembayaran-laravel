@extends('layouts.master')

@section('content')

<?php
use App\Mahasiswa;
 ?>

<!-- Main Content -->
  <div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Data Tagihan</h1>
      </div>
      
      <div class="row">
        <div class="col-lg-12 col-md-12 col-12 col-sm-12">
          <div class="card">
            <div class="card-header">
              <h4>Data Tagihan Mahasiswa</h4>
            </div>

             @if(session('sukses'))
               <div class="alert alert-success" role="alert">
                   {{ session('sukses') }}
               </div>
              @endif

               @if(session('error'))
               <div class="alert alert-danger" role="alert">
                   {{ session('error') }}
               </div>
              @endif

              @if (count($errors) > 0)
                    <div class="alert alert-danger" role="alert">
                        <ul>
                             @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                             @endforeach
                        </ul>
                    </div>
                @endif

            <div class="card-body">

              <div class="table-responsive">
                <table class="table table-striped table-md">
                  <tr>
                    <th>No.</th>
                    <th>Tanggal</th>
                    <th>Nama Mahasiswa</th>
                    <th>Nim</th>
                    <th>Semester</th>
                    <th>Jurusan</th>
                    <th>Jenis Tagihan</th>
                    <th>Jumlah</th>
                    <th>Status Pembayaran</th>
                  </tr>
                   @foreach($data_tagihan as $tagihan)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ date("d/M/Y", strtotime($tagihan->tanggal)) }}</td>
                    <td><?php echo DB::table('mahasiswas')->where('id', $tagihan->mahasiswa_id)->value('nama'); ?></td>
                    <td><?php echo DB::table('mahasiswas')->where('id', $tagihan->mahasiswa_id)->value('nim'); ?></td>
                    <td><?php echo DB::table('mahasiswas')->where('id', $tagihan->mahasiswa_id)->value('semester'); ?></td>
                    <td><?php echo DB::table('mahasiswas')->where('id', $tagihan->mahasiswa_id)->value('jurusan'); ?></td>
                    <td>{{ $tagihan->jenis_tagihan }}</td>
                    <td>Rp.{{ $tagihan->jumlah }}</td>
                    <td> 
                       @if($tagihan->status_pembayaran == 'sudah lunas')
                      <div class="badge badge-success">{{ $tagihan->status_pembayaran }}</div>
                      @else
                      <div class="badge badge-danger">{{ $tagihan->status_pembayaran }}</div>
                      @endif
                    </td>

                  </tr>
                  @endforeach
                </table>
              </div>

              </div>
          </div>
        </div>
       
     

    </section>
  </div>



@endsection