@extends('user.layouts.app')
@section('css')
<style>
    .table td{
        padding: 0.10rem !important;
    }
    .card-body{
        padding: 0.25rem !important;
    }
    .tdbg{
        background-color: dimgrey;
        color: white;
    }
    .table{
        font-size: 13px;
    }
</style>
@endsection
  @section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header ui-sortable-handle" style="cursor: move;">
                      <h3 class="card-title">
                        <i class="fas fa-truck mr-1"></i>
                        Trucks
                      </h3>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-3">
                                <table class="table table-bordered table-condensed">
                                    <tbody>
                                        @foreach($fuel_types as $key=>$fuel_type)
                                        <tr>
                                            <td>{{$fuel_type->name}}</td>
                                            <td align="right" class="tdbg">
                                                @php
                                                 $where = [['fuel_type_id',$fuel_type->id]];
                                                @endphp
                                                {{getTotalCount("App\Models\TruckingCompany",$where)}}
                                            </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>

                            <div class="col-md-3">
                                <table class="table table-bordered table-condensed">
                                    <thead>
                                        <tr>
                                            <td colspan="2">Avarage Age<td>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr>
                                            <td>1 - 5 yrs</td>
                                            <td>5 - 10 yrs</td>
                                            <td>> 10 yrs</td>
                                        </tr>
                                        <tr>
                                            <td align="center" class="tdbg">
                                                @php
                                                 $where = [1,5];
                                                @endphp
                                                {{getAvarageAge($where)}}
                                            </td>

                                            <td align="center" class="tdbg">
                                                @php
                                                 $where = [5,10];
                                                @endphp
                                                {{getAvarageAge($where)}}
                                            </td>

                                            <td align="center" class="tdbg">
                                                @php
                                                $where = [10,10000];
                                               @endphp
                                               {{getAvarageAge($where)}}
                                            </td>
                                        </tr>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div><!-- /.card-body -->
                  </div>
            </div>

        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header ui-sortable-handle" style="cursor: move;">
                      <h3 class="card-title">
                        <i class="fas fa-gas-pump mr-1"></i>
                        Fuel Consumtion
                      </h3>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h5>Total Fuel Consumtion</h5>
                                        <table class="table table-bordered">
                                            <tbody>
                                                @foreach($fuel_types as $key=>$fuel_type)
                                                <tr>
                                                    <td>{{$fuel_type->name}}</td>
                                                    <td align="right" class="tdbg">
                                                        @php
                                                        $where = [['fuel_type_id',$fuel_type->id]];
                                                        @endphp
                                                        {{getTotalCount("App\Models\TruckingCompany",$where)}}
                                                    </td>
                                                    <td>{{$fuel_type->unit}}</td>
                                                </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-md-6">
                                        <h5>Cost -USD</h5>
                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td>Diesel</td>
                                                    <td  align="right"  class="tdbg">230,6998.00</td>

                                                </tr>
                                                <tr>
                                                    <td>Gasoline</td>
                                                    <td  align="right"  class="tdbg">-</td>

                                                </tr>
                                                <tr>
                                                    <td>CNG</td>
                                                    <td  align="right"  class="tdbg">176,90,00</td>
                                                </tr>
                                                <tr>
                                                    <td>LPG</td>
                                                    <td  align="right"  class="tdbg">-</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Total</strong></td>
                                                    <td   align="right"  class="tdbg">380,07.00</td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h5>Fuel Consumed during Idling</h5>
                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td>Diesel</td>
                                                    <td  align="right"  class="tdbg">230,6998.00</td>
                                                    <td>Litres</td>
                                                </tr>
                                                <tr>
                                                    <td>Gasoline</td>
                                                    <td  align="right"  class="tdbg">-</td>
                                                    <td>Litres</td>
                                                </tr>
                                                <tr>
                                                    <td>CNG</td>
                                                    <td  align="right"  class="tdbg">176,90,00</td>
                                                    <td>KG</td>
                                                </tr>
                                                <tr>
                                                    <td>LPG</td>
                                                    <td  align="right"  class="tdbg">-</td>
                                                    <td>Litres</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-md-6">
                                        <h5>Cost -USD</h5>
                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td>Diesel</td>
                                                    <td  align="right"  class="tdbg">230,6998.00</td>

                                                </tr>
                                                <tr>
                                                    <td>Gasoline</td>
                                                    <td  align="right"  class="tdbg">-</td>

                                                </tr>
                                                <tr>
                                                    <td>CNG</td>
                                                    <td  align="right"  class="tdbg">176,90,00</td>
                                                </tr>
                                                <tr>
                                                    <td>LPG</td>
                                                    <td  align="right"  class="tdbg">-</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Total</strong></td>
                                                    <td   align="right"  class="tdbg">380,07.00</td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <strong>Total Fuel Consumtion</strong>
                                        <table class="table table-bordered">

                                            <tbody>

                                                @foreach($fuel_types as $key=>$fuel_type)
                                                <tr>
                                                    <td>{{$fuel_type->name}}</td>
                                                    <td align="right" class="tdbg">
                                                        @php
                                                        $where = [['fuel_type_id',$fuel_type->id]];
                                                        @endphp
                                                        {{getTotalCount("App\Models\TruckingCompany",$where)}}
                                                    </td>
                                                    <td>{{$fuel_type->unit}}</td>
                                                </tr>
                                                @endforeach


                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-md-6">
                                        <strong>Cost -USD</strong>
                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td>Diesel</td>
                                                    <td  align="right"  class="tdbg">230,6998.00</td>

                                                </tr>
                                                <tr>
                                                    <td>Gasoline</td>
                                                    <td  align="right"  class="tdbg">-</td>

                                                </tr>
                                                <tr>
                                                    <td>CNG</td>
                                                    <td  align="right"  class="tdbg">176,90,00</td>
                                                </tr>
                                                <tr>
                                                    <td>LPG</td>
                                                    <td  align="right"  class="tdbg">-</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Total</strong></td>
                                                    <td   align="right"  class="tdbg">380,07.00</td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div id="columnchart_material" style="width: 500px; height: 400px;"></div>
                            </div>

                        </div>
                    </div><!-- /.card-body -->
                  </div>
            </div>
        </div>


        <!-- /.row -->
        <!-- Main row -->

        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  @endsection

@section('js')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Idling', 'Empty Trips', 'Total'],
          ['Diesel', 1000, 400, 200],
          ['Gasoline', 1170, 460, 250],
          ['LPG', 660, 1120, 300],
          ['CNG', 1030, 540, 350]
        ]);

        var options = {
          chart: {
            title: 'Total Fuel Consumtion',
            subtitle: 'Diesel, Gasoline, LPG and CNG',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
@endsection
