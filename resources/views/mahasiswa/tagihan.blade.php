@extends('layouts.master')

@section('content')

<!-- Main Content -->
  <div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Tagihan Saya</h1>
      </div>
      
      <div class="row">
        <div class="col-lg-12 col-md-12 col-12 col-sm-12">
          <div class="card">
            <div class="card-header">
              <h4>Tagihan Saya</h4>
            </div>
            <div class="card-body">

               <div class="table-responsive">
                <table class="table table-striped table-md">
                  <tr>
                    <td style="width: 3em">Nama</td>
                    <td style="width: 2em">:</td>
                    <td><b>{{ $mahasiswa->nama }}<b></td>
                  </tr>
                  <tr>
                    <td style="width: 3em">Nim</td>
                    <td style="width: 2em">:</td>
                    <td><b>{{ $mahasiswa->nim }}</b></td>
                  </tr>
                  <tr>
                    <td style="width: 3em">Jurusan</td>
                    <td style="width: 2em">:</td>
                    <td><b>{{ $mahasiswa->jurusan }}</b></td>
                  </tr>
                  <tr>
                    <td style="width: 3em">Semester</td>
                    <td style="width: 2em">:</td>
                    <td><b>{{ $mahasiswa->semester }}</b></td>
                  </tr>
                </table>
              </div>

              
                 <h5 style="margin: 1em">Data Tagihan</h5>
              

              <div class="table-responsive">
                <table class="table table-striped table-md">
                  <tr>
                    <th>No.</th>
                    <th>Tanggal</th>
                    <th>Jenis Tagihan</th>
                    <th>Jumlah</th>
                    <th>Status Pembayaran</th>
                    <th>Aksi</th>
                  </tr>
                   @foreach($data_tagihan as $tagihan)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ date("d/M/Y", strtotime($tagihan->tanggal)) }}</td>
                    <td>{{ $tagihan->jenis_tagihan }}</td>
                    <td>Rp. {{ $tagihan->jumlah }}</td>
                    <td> 
                       @if($tagihan->status_pembayaran == 'sudah lunas')
                      <div class="badge badge-success">{{ $tagihan->status_pembayaran }}</div>
                      @else
                      <div class="badge badge-danger">{{ $tagihan->status_pembayaran }}</div>
                      @endif
                    </td>
                    <td>
                      @if($tagihan->status_pembayaran == 'belum lunas')
                      <a href="{{ url('/tagihan-saya/'.$tagihan->id.'/pembayaran') }}" class="btn btn-success">Bayar Sekarang</a></td>
                      @endif

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