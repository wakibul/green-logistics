@extends('user.layouts.app')
@section('css')
<style>
    .table td{
        padding: 0.10rem !important;
    }

    .tdbg{
        background-color: dimgrey;
        color: white;
    }
    .table{
        font-size: 13px;
    }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Zebra_datepicker/1.9.15/css/bootstrap/zebra_datepicker.css">
<style>

    fieldset { border:none; width:100%;}
    legend { font-size:18px; margin:0px; padding:10px 0px; color:#b0232a; font-weight:bold;}
    label { display:block; margin:15px 0 5px;}
           button, .prev, .next { background-color:#b0232a; padding:5px 10px; color:#fff; text-decoration:none;}
    button:hover, .prev:hover, .next:hover { background-color:#000; text-decoration:none;}

</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jQuery-Validation-Engine/2.6.4/validationEngine.jquery.min.css" />
<style>
    .prev{float:left}
    .next{float:right}
    .steps{list-style:none;width:100%;overflow:hidden;margin:0;padding:0}
    .steps li{color:#b0b1b3;font-size:24px;float:left;padding:10px;transition:all .3s;-moz-transition:all .3s;-webkit-transition:all .3s;-o-transition:all .3s}
    .steps li span{font-size:11px;display:block}
    .steps li.current{color:#000}

    .row.child{
        margin-top: 5px;
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
            <h1 class="m-0 text-dark">Edit Information</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Information</li>
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
                        @if ($errors->any())
                            <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                            </div>
                        @endif

                      @if(Session::has('success'))
                                <div class="alert alert-success">
                                {!! session('success') !!}
                                </div>
                      @endif
                    <form name="form1" action="{{route('trucking.update',$truck->id)}}" method="POST" id="form1">
                        @csrf
                        <fieldset>
                                <legend>General Information for a vehicle</legend>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    Vehicle Category Type
                                </div>
                                <div class="col-md-6">
                                    <select name="vehicle_type_id" class="form-control validate[required]">
                                        <option value="">Select</option>
                                        @foreach($vehicle_types as $key=>$vehicle_type)
                                        <option value="{{$vehicle_type->id}}" @if($truck->vehicle_type_id == $vehicle_type->id) selected @endif>{{$vehicle_type->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    Year of Manufacture
                                </div>
                                <div class="col-md-6">
                                <input type="text" name="year_of_manufacture" readonly id="year_of_manufacture" value="{{$truck->year_of_manufacture}}" class="form-control validate[required]" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    No Of Wheels
                                </div>
                                <div class="col-md-6">
                                    <select name="no_of_wheels" class="form-control validate[required]">
                                        <option value="">Select</option>
                                        @for($i=1;$i<=30;$i++)
                                            <option value="{{$i}}" @if($truck->no_of_wheels == $i) selected @endif>{{$i}}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                   Fuel Type
                                </div>
                                <div class="col-md-6">
                                    <select name="fuel_type_id" class="form-control validate[required]">
                                        <option value="Select">Select</option>
                                        @foreach($fuel_types as $key=>$fuel_type)
                                        <option value="{{$fuel_type->id}}" @if($truck->fuel_type_id ==$fuel_type->id) selected @endif>{{$fuel_type->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    Cost of Fuel Consumption / year (Your currency/Yr)
                                </div>
                                <div class="col-md-6">
                                <input type="number" name="cost_of_fuel_consumption_per_year" class="form-control validate[required]" value="{{$truck->cost_of_fuel_consumption_per_year}}">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    No. of Runing - Kilomater / year (Km/Yr)
                                </div>
                                <div class="col-md-6">
                                <input type="number" name="no_of_running_per_km_year" class="form-control validate[required]" value="{{$truck->no_of_running_per_km_year}}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    Average Distance / trip (Km/trip)
                                </div>
                                <div class="col-md-6">
                                <input type="number" name="avarage_distance_per_km_trip" class="form-control validate[required]" value="{{$truck->avarage_distance_per_km_trip}}">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    Baseline: Gross Vehicle Weight (Tones)
                                </div>
                                <div class="col-md-6">
                                    <select name="gross_vehicle_weight_id" class="form-control validate[required]">
                                        <option value="">Select</option>
                                        @foreach($gross_vehicle_weights as $key=>$gross_vehicle_weight)
                                        <option value="{{$gross_vehicle_weight->id}}" @if($truck->gross_vehicle_weight_id ==$gross_vehicle_weight->id) selected @endif>{{$gross_vehicle_weight->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    Baseline : Average Speed (Km/Hr)
                                </div>
                                <div class="col-md-6">
                                <input type="number" name="avarage_speed_per_km_hr" class="form-control validate[required]" value="{{$truck->avarage_speed_per_km_hr}}">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    Average payload / trip (Tons)
                                </div>
                                <div class="col-md-6">
                                <input type="number" name="avarage_payload_per_trip" class="form-control validate[required]" value="{{$truck->avarage_payload_per_trip}}">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    Average truck capacity utilization (Tons)
                                </div>
                                <div class="col-md-6">
                                <input type="number" name="avarage_truck_capacity_utilization" class="form-control validate[required]" value="{{$truck->avarage_truck_capacity_utilization}}">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    Baseline: Operating days for delivery / quarter (time)
                                </div>
                                <div class="col-md-6">
                                <input type="number" name="operation_days" class="form-control validate[required]" value="{{$truck->operation_days}}">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    Average of trip that are empty (time/year)
                                </div>
                                <div class="col-md-6">
                                <input type="number" name="avarage_empty_trip_per_year" class="form-control validate[required]" value="{{$truck->avarage_empty_trip_per_year}}">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    Average Vehicle Backhauling Distance (Km)
                                </div>
                                <div class="col-md-6">
                                <input type="number" name="avarage_vehicle_backhauling_distance" class="form-control validate[required]" value="{{$truck->avarage_vehicle_backhauling_distance}}">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    Baseline: Average Idling time / day (mins)
                                </div>
                                <div class="col-md-6">
                                <input type="number" name="avarage_idling_time_per_day" class="form-control validate[required]" value="{{$truck->avarage_idling_time_per_day}}">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    Baseline: Vehicle Breakdown in year (time)
                                    (by any of followings: Engine, Braks, Tires, Suspension, Transmission, Electrical, Axles and Misselaneous)
                                </div>
                                <div class="col-md-6">
                                <input type="number" name="vehicle_breakdown_per_year" class="form-control validate[required]" value="{{$truck->vehicle_breakdown_per_year}}">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    Baseline : Target of accident for this vehicle / year (time)
                                </div>
                                <div class="col-md-6">
                                <input type="number" name="target_of_accident_per_year" class="form-control validate[required]" value="{{$truck->target_of_accident_per_year}}">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    Baseline: Damaged of Failed delivery in year (time)
                                </div>
                                <div class="col-md-6">
                                <input type="number" name="damaged_of_failed_vehicles_per_year" class="form-control validate[required]" value="{{$truck->damaged_of_failed_vehicles_per_year}}">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    Baseline: Maintenance (preventive and corrective) program in year (time)
                                </div>
                                <div class="col-md-6">
                                <input type="number" name="maintanance_programme_per_year" class="form-control validate[required]" value="{{$truck->maintanance_programme_per_year}}">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    Baseline: Tire management (consists of selection of tires, tire pressure management, Axle/wheel alignments) in year (time)
                                </div>
                                <div class="col-md-6">
                                <input type="number" name="tyre_management_per_year" class="form-control validate[required]" value="{{$truck->tyre_management_per_year}}">
                                </div>
                            </div>
                        </div>
                        </fieldset>
                        <fieldset>
                            <legend>Baseline (2) for Company (Overall)</legend>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        Baseline: Provide Eco-driving to new and old drivers in year (time)
                                    </div>
                                    <div class="col-md-6">
                                    <input type="number" name="eco_driving_to_driver_per_year" class="form-control validate[required]" value="{{$truck->eco_driving_to_driver_per_year}}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        Baseline: Total cost of electricity consumption in the company per year (Country currency)
                                    </div>
                                    <div class="col-md-6">
                                    <input type="number" name="total_cost_electricity_per_year" class="form-control validate[required]" value="{{$truck->total_cost_electricity_per_year}}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        Baseline: Total number of suppliers who have accreditation/certification (No. in a year)
                                    </div>
                                    <div class="col-md-6">
                                    <input type="number" name="total_no_of_suppliers" class="form-control validate[required]" value="{{$truck->total_no_of_suppliers}}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        Baseline : Total cost of procurement products of the company (Country currency /year)
                                    </div>
                                    <div class="col-md-6">
                                    <input type="number" name="total_cost_of_procurement" class="form-control validate[required]" value="{{$truck->total_cost_of_procurement}}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6"></div>
                                    <div class="col-md-3">
                                        <button type="submit" name="submit" class="btn btn-success">Update</button>
                                    </div>
                                </div>
                            </div>


                        </fieldset>
                        </form>
                    </div><!-- /.card-body -->
                  </div>
            </div>

        </div>




        <!-- /.row -->
        <!-- Main row -->

        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>

    @section('js')
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Zebra_datepicker/1.9.15/zebra_datepicker.min.js"></script>
    <script>
        $('#year_of_manufacture').Zebra_DatePicker({
            format:'Y',
            view: 'years'
        });
    </script>
    <script src="{{asset('public/dist/js/jquery.formtowizard.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-Validation-Engine/2.6.4/jquery.validationEngine.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-Validation-Engine/2.6.4/languages/jquery.validationEngine-en.min.js"></script>
    <script>
         $( function() {
            var $signupForm = $( '#form1' );

            $signupForm.validationEngine();

            $signupForm.formToWizard({
                submitButton: 'Submit Form',
                showProgress: true, //default value for showProgress is also true
                nextBtnName: 'Forward >>',
                prevBtnName: '<< Previous',
                showStepNo: true,
                validateBeforeNext: function() {
                    return $signupForm.validationEngine( 'validate' );
                }
            });


            $( '#txt_stepNo' ).change( function() {
                $signupForm.formToWizard( 'GotoStep', $( this ).val() );
                $.material.init();
            });

            $( '#btn_next' ).click( function() {
                $signupForm.formToWizard( 'NextStep' );
                $.material.init();
            });

            $( '#btn_prev' ).click( function() {
                $signupForm.formToWizard( 'PreviousStep' );
                $.material.init();
            });
        });
    </script>
    @endsection
    <!-- /.content -->
  </div>
  @endsection


