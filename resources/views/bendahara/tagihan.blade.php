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

              <button style="margin-bottom: 2em" type="button" class="btn btn-primary rounded" data-toggle="modal" data-target="#tambahModal"><i class="fa fa-plus"></i> Tambah Tagihan</button>


                <!-- start modal -->        
                    <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel" area-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header"> 
                                    <button type="button" class="close" data-dismiss="modal" aria-label="close">
                                        <span area-hidden="true">&times;</span>
                                    </button>
                                    
                                </div>
                                <div class="modal-body">

                                    <form  method="POST" action="/data-tagihan">
                                          @csrf

                                           <div><h4>Tambahkan Tagihan</h4></div>

                                        <div class="form-group">
                                            <label for="tambahNamaMahasiswa">Nama Mahasiswa</label>
                                               <select id="select1" name="mahasiswa_id" class="form-control select2">
                                               @foreach($data_mahasiswa as $mahasiswa)
                                               <option value="{{ $mahasiswa->id }}">{{ $mahasiswa->nama }} - {{ $mahasiswa->nim }}</option>  
                                                @endforeach
                                            </select>
                                        </div>


                                        <div class="form-group">
                                            <label for="tanggal">Tanggal</label>
                                                <input name="tanggal" type="date" class="form-control" id="tanggal" aria-describedby="tanggal" placeholder="tanggal" value="{{ old('tanggal') }}" required> 
                                        </div>

 
                                        <div class="form-group">
                                            <label for="tagihan">Jenis Tagihan</label>
                                              <select id="select1" name="jenis_tagihan" class="form-control select2">
                                                <option value="spp">SPP</option>
                                                <option value="uang kontribusi">Uang Kontribusi</option> 
                                              </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="jumlah">Jumlah Tagihan</label>
                                                <input name="jumlah" type="number" class="form-control" id="jumlah" aria-describedby="jumlah" placeholder="Rp.0" value="{{ old('jumlah') }}" required> 
                                        </div>

                                        <input type="hidden" name="status_pembayaran" value="belum lunas">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    </form>
                                </div>               
                            </div>            
                        </div>       
                    </div> 
                </div>
                <!-- end modal -->

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