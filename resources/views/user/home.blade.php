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
                            {{-- <div class="col-md-3">
                                <table class="table table-bordered table-condensed">
                                    <tbody>
                                        @foreach($vehicle_types as $key=>$vehicle_type)
                                        <tr>
                                            <td>{{$vehicle_type->name}}</td>
                                            <td align="right" class="tdbg">
                                                @php
                                                 $where = [['vehicle_type_id',$vehicle_type->id]];
                                                @endphp
                                                {{getTotalCount("App\Models\TruckingCompany",$where)}}
                                            </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div> --}}

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
                                                {{getTotalCount("App\Models\TruckingCompany",$where,Auth::id())}}
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
                                                {{getAvarageAge($where,Auth::id())}}
                                            </td>

                                            <td align="center" class="tdbg">
                                                @php
                                                 $where = [5,10];
                                                @endphp
                                                {{getAvarageAge($where,Auth::id())}}
                                            </td>

                                            <td align="center" class="tdbg">
                                                @php
                                                $where = [10,10000];
                                               @endphp
                                               {{getAvarageAge($where,Auth::id())}}
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
                        Fuel Consumption
                      </h3>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h5>Total Fuel Consumption</h5>
                                        <table class="table table-bordered">
                                            <tbody>
                                                @foreach($fuel_types as $key=>$fuel_type)
                                                <tr>
                                                    <td>{{$fuel_type->name}}</td>
                                                    <td align="right" class="tdbg">
                                                        @php
                                                        $where = [['fuel_type_id',$fuel_type->id]];
                                                        @endphp
                                                        {{totalConsumption("App\Models\TruckingCompany",$where,'cost_of_fuel_consumption_per_year',Auth::id())}}
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
                                                @foreach($fuel_types as $key=>$fuel_type)
                                                <tr>
                                                    <td>{{$fuel_type->name}}</td>
                                                    <td align="right" class="tdbg">
                                                        @php
                                                        $where = [['fuel_type_id',$fuel_type->id]];
                                                        @endphp
                                                        {{round(totalConsumption("App\Models\TruckingCompany",$where,'cost_of_fuel_consumption_per_year',Auth::id())*$fuel_type->price,2)}}
                                                    </td>

                                                </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h5>Fuel Consumed during Idling</h5>
                                        <table class="table table-bordered">
                                            <tbody>
                                                @foreach($fuel_types as $key=>$fuel_type)
                                                <tr>
                                                    <td>{{$fuel_type->name}}</td>
                                                    <td align="right" class="tdbg">
                                                        @php
                                                        $where = [['fuel_type_id',$fuel_type->id]];
                                                        @endphp
                                                        {{totalConsumption("App\Models\TruckingCompany",$where,'avarage_idling_time_per_day',Auth::id())}}
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
                                                @foreach($fuel_types as $key=>$fuel_type)
                                                <tr>
                                                    <td>{{$fuel_type->name}}</td>
                                                    <td align="right" class="tdbg">
                                                        @php
                                                        $where = [['fuel_type_id',$fuel_type->id]];
                                                        @endphp
                                                        {{round(totalConsumption("App\Models\TruckingCompany",$where,'avarage_idling_time_per_day',Auth::id())*$fuel_type->price,2)}}
                                                    </td>

                                                </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h5>Fuel Consumed during Empty Trips</h5>
                                        <table class="table table-bordered">
                                            <tbody>
                                                @foreach($fuel_types as $key=>$fuel_type)
                                                <tr>
                                                    <td>{{$fuel_type->name}}</td>
                                                    <td align="right" class="tdbg">
                                                        @php
                                                        $where = [['fuel_type_id',$fuel_type->id]];
                                                        @endphp
                                                        {{totalConsumption("App\Models\TruckingCompany",$where,'avarage_empty_trip_per_year',Auth::id())}}
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
                                                @foreach($fuel_types as $key=>$fuel_type)
                                                <tr>
                                                    <td>{{$fuel_type->name}}</td>
                                                    <td align="right" class="tdbg">
                                                        @php
                                                        $where = [['fuel_type_id',$fuel_type->id]];
                                                        @endphp
                                                        {{round(totalConsumption("App\Models\TruckingCompany",$where,'avarage_empty_trip_per_year',Auth::id())*$fuel_type->price,2)}}
                                                    </td>

                                                </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-6">
                                <div id="columnchart_material" style="width: 500px; height: 400px;"></div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12">

                                        <h5>Kilometers Driven</h5>
                                        <strong>Total Kilometers Driven</strong>
                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td align="center" class="tdbg"></td>
                                                    <td align="center" class="tdbg">Light</td>
                                                    <td align="center" class="tdbg">Medium</td>
                                                    <td align="center" class="tdbg">Heavy</td>
                                                </tr>
                                                @foreach($fuel_types as $key=>$fuel_type)
                                                <tr>
                                                    <td>{{$fuel_type->name}}</td>
                                                    <td align="right" class="tdbg">
                                                        @php
                                                        $where = [['fuel_type_id',$fuel_type->id],['gross_vehicle_weight_id',1]];
                                                        @endphp
                                                        {{totalConsumption("App\Models\TruckingCompany",$where,'no_of_running_per_km_year',Auth::id())}}
                                                    </td>
                                                    <td align="right" class="tdbg">
                                                        @php
                                                        $where = [['fuel_type_id',$fuel_type->id],['gross_vehicle_weight_id',2]];
                                                        @endphp
                                                        {{totalConsumption("App\Models\TruckingCompany",$where,'no_of_running_per_km_year',Auth::id())}}
                                                    </td>
                                                    <td align="right" class="tdbg">
                                                        @php
                                                        $where = [['fuel_type_id',$fuel_type->id],['gross_vehicle_weight_id',3]];
                                                        @endphp
                                                        {{totalConsumption("App\Models\TruckingCompany",$where,'no_of_running_per_km_year',Auth::id())}}
                                                    </td>

                                                </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-12">

                                        <strong>Kilometers driven during emptry trips</strong>
                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td align="center" class="tdbg"></td>
                                                    <td align="center" class="tdbg">Light</td>
                                                    <td align="center" class="tdbg">Medium</td>
                                                    <td align="center" class="tdbg">Heavy</td>
                                                </tr>
                                                @foreach($fuel_types as $key=>$fuel_type)
                                                <tr>
                                                    <td>{{$fuel_type->name}}</td>
                                                    <td align="right" class="tdbg">
                                                        @php
                                                        $where = [['fuel_type_id',$fuel_type->id],['gross_vehicle_weight_id',1]];
                                                        @endphp
                                                        {{totalConsumption("App\Models\TruckingCompany",$where,'avarage_distance_per_km_trip',Auth::id())* totalConsumption("App\Models\TruckingCompany",$where,'avarage_empty_trip_per_year',Auth::id())}}
                                                    </td>
                                                    <td align="right" class="tdbg">
                                                        @php
                                                        $where = [['fuel_type_id',$fuel_type->id],['gross_vehicle_weight_id',2]];
                                                        @endphp
                                                        {{totalConsumption("App\Models\TruckingCompany",$where,'avarage_distance_per_km_trip',Auth::id()) * totalConsumption("App\Models\TruckingCompany",$where,'avarage_empty_trip_per_year',Auth::id())}}
                                                    </td>
                                                    <td align="right" class="tdbg">
                                                        @php
                                                        $where = [['fuel_type_id',$fuel_type->id],['gross_vehicle_weight_id',3]];
                                                        @endphp
                                                        {{totalConsumption("App\Models\TruckingCompany",$where,'avarage_distance_per_km_trip',Auth::id()) * totalConsumption("App\Models\TruckingCompany",$where,'avarage_empty_trip_per_year',Auth::id())}}
                                                    </td>

                                                </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>

                                </div>

                    </div><!-- /.card-body -->
                    <div class="col-md-6">
                        <div id="piechart" style="width: 550px; height: 350px;"></div>
                    </div>
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
          ['Total fuel consumption', 'Total', 'Idling', 'Empty Trips'],
          ['Diesel', {{totalConsumption("App\Models\TruckingCompany",[['fuel_type_id',1]],'cost_of_fuel_consumption_per_year',Auth::id())}},
          {{totalConsumption("App\Models\TruckingCompany",[['fuel_type_id',1]],'avarage_idling_time_per_day',Auth::id())}},
          {{totalConsumption("App\Models\TruckingCompany",[['fuel_type_id',1]],'avarage_empty_trip_per_year',Auth::id())}}
          ],
          ['Gasoline', {{totalConsumption("App\Models\TruckingCompany",[['fuel_type_id',2]],'cost_of_fuel_consumption_per_year',Auth::id())}},
          {{totalConsumption("App\Models\TruckingCompany",[['fuel_type_id',2]],'avarage_idling_time_per_day',Auth::id())}},
          {{totalConsumption("App\Models\TruckingCompany",[['fuel_type_id',2]],'avarage_empty_trip_per_year',Auth::id())}}
          ],
          ['CNG', {{totalConsumption("App\Models\TruckingCompany",[['fuel_type_id',3]],'cost_of_fuel_consumption_per_year',Auth::id())}},
          {{totalConsumption("App\Models\TruckingCompany",[['fuel_type_id',3]],'avarage_idling_time_per_day',Auth::id())}},
          {{totalConsumption("App\Models\TruckingCompany",[['fuel_type_id',3]],'avarage_empty_trip_per_year',Auth::id())}}
          ],
          ['LPG', {{totalConsumption("App\Models\TruckingCompany",[['fuel_type_id',4]],'cost_of_fuel_consumption_per_year',Auth::id())}},
          {{totalConsumption("App\Models\TruckingCompany",[['fuel_type_id',4]],'avarage_idling_time_per_day',Auth::id())}},
          {{totalConsumption("App\Models\TruckingCompany",[['fuel_type_id',4]],'avarage_empty_trip_per_year',Auth::id())}}
          ]


        ]);

        var options = {
          chart: {
            title: '',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }

      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(pieChart);

      function pieChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['With Load',     {{totalConsumption("App\Models\TruckingCompany",[],'no_of_running_per_km_year',Auth::id())}}],
          ['Empty',     {{totalConsumption("App\Models\TruckingCompany",[],'avarage_distance_per_km_trip',Auth::id()) * totalConsumption("App\Models\TruckingCompany",[],'avarage_empty_trip_per_year',Auth::id())}}]
        ]);

        var options = {
          title: ''
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
@endsection
