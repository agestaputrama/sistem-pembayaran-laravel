@extends('layouts.master')

@section('content')

<!-- Main Content -->
  <div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Data Mahasiswa</h1>
      </div>
      
      <div class="row">
        <div class="col-lg-12 col-md-12 col-12 col-sm-12">
          <div class="card">
            <div class="card-header">
              <h4>Data Mahasiswa</h4>
            </div>
            <div class="card-body">

              <div class="table-responsive">
                <table class="table table-striped table-md">
                  <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Nim</th>
                    <th>Jurusan</th>
                    <th>Semester</th>
                  </tr>
                   @foreach($data_mahasiswa as $mahasiswa)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $mahasiswa->nama }}</td>
                    <td>{{ $mahasiswa->nim }}</td>
                    <td>{{ $mahasiswa->jurusan }}</td>
                    <td>{{ $mahasiswa->semester }}</td>
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