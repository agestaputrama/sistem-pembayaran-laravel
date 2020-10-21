@extends('layouts.master')

@section('content')

<!-- Main Content -->
  <div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Profil Saya</h1>
      </div>
      
      <div class="row">
        <div class="col-lg-12 col-md-12 col-12 col-sm-12">
          <div class="card">
            <div class="card-header">
              <h4>Profil Saya</h4>
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

              </div>
          </div>
        </div>
       
     

    </section>
  </div>


@endsection