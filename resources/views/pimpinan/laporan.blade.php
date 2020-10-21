@extends('layouts.master')

@section('content')

<!-- Main Content -->
  <div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Laporan</h1>
      </div>
      
      <div class="row">
        <div class="col-lg-12 col-md-12 col-12 col-sm-12">
          <div class="card">
            <div class="card-header">
              <h4>Grafik Uang Masuk</h4>
            </div>
            <div class="card-body">
 
                 
                  
                  <div class="panel">
                    <div id="chartNilai"></div>
                  </div>
                

			</div>
          </div>
        </div>
       
     

    </section>
  </div>

  

@endsection

@section('footer')
<script src="https://code.highcharts.com/highcharts.js"></script>

<script>
        Highcharts.chart('chartNilai', {
          chart: {
              type: 'line'
          },
          title: {
              text: 'Laporan Uang Masuk'
          },
          
          xAxis: {
              categories: {!!json_encode($categories)!!},
              crosshair: true
          },
          yAxis: {
              min: 0,
              title: {
                  text: 'Jumlah Uang (Rp)'
              }
          },
          tooltip: {
              headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
              footerFormat: '</table>',
              shared: true,
              useHTML: true
          },
          plotOptions: {
              column: {
                  pointPadding: 0.2,
                  borderWidth: 0
              }
          },
          series: [{
              name: 'Uang Masuk',
              data: {!!json_encode($data)!!}

          }]
      });
              
</script>
@endsection