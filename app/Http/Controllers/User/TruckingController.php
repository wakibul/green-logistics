<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VehicleType;
use App\Models\FuelType;
use App\Models\GrossVehicleWeight;
use App\Models\TruckingCompany;
use Validator,Session,DB,Auth,Crypt;
class TruckingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $truckings = TruckingCompany::paginate(15);
        return view('user.trucking.index',compact('truckings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $vehicle_types = VehicleType::where('status',1)->get();
        $fuel_types = FuelType::where('status',1)->get();
        $gross_vehicle_weights = GrossVehicleWeight::where('status',1)->get();
        return view('user.trucking.create',compact('vehicle_types','fuel_types','gross_vehicle_weights'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(),[
            'vehicle_type_id' => 'required | numeric',
            'year_of_manufacture' => 'required | numeric',
            'no_of_wheels' => 'required | numeric',
            'fuel_type_id' => 'required | numeric',
            'cost_of_fuel_consumption_per_year' => 'required',
            'no_of_running_per_km_year' => 'required',
            'avarage_distance_per_km_trip' => 'required',
            'gross_vehicle_weight_id' => 'required',
            'avarage_speed_per_km_hr' => 'required',
            'avarage_payload_per_trip' => 'required',
            'avarage_truck_capacity_utilization' => 'required',
            'operation_days' => 'required',
            'avarage_empty_trip_per_year' => 'required',
            'avarage_vehicle_backhauling_distance' => 'required',
            'avarage_idling_time_per_day' => 'required',
            'vehicle_breakdown_per_year' => 'required',
            'target_of_accident_per_year' => 'required',
            'damaged_of_failed_vehicles_per_year' => 'required',
            'maintanance_programme_per_year' => 'required',
            'tyre_management_per_year' => 'required',
            'eco_driving_to_driver_per_year' => 'required',
            'total_cost_electricity_per_year' => 'required',
            'total_no_of_suppliers' => 'required',
            'total_cost_of_procurement' => 'required',

        ]);
        if($validator->fails())
        return redirect()->back()->withErrors($validator)->withInput($request->all());
        $data['vehicle_type_id'] = $request->vehicle_type_id;
        $data['user_id'] = Auth::id();
        $data['year_of_manufacture'] = $request->year_of_manufacture;
        $data['no_of_wheels'] = $request->no_of_wheels;
        $data['fuel_type_id'] = $request->fuel_type_id;
        $data['cost_of_fuel_consumption_per_year'] = $request->cost_of_fuel_consumption_per_year;
        $data['no_of_running_per_km_year'] = $request->no_of_running_per_km_year;
        $data['avarage_distance_per_km_trip'] = $request->avarage_distance_per_km_trip;
        $data['gross_vehicle_weight_id'] = $request->gross_vehicle_weight_id;
        $data['avarage_speed_per_km_hr'] = $request->avarage_speed_per_km_hr;
        $data['avarage_payload_per_trip'] = $request->avarage_payload_per_trip;
        $data['avarage_truck_capacity_utilization'] = $request->avarage_truck_capacity_utilization;
        $data['operation_days'] = $request->operation_days;
        $data['avarage_empty_trip_per_year'] = $request->avarage_empty_trip_per_year;
        $data['avarage_vehicle_backhauling_distance'] = $request->avarage_vehicle_backhauling_distance;
        $data['avarage_idling_time_per_day'] = $request->avarage_idling_time_per_day;
        $data['vehicle_breakdown_per_year'] = $request->vehicle_breakdown_per_year;
        $data['target_of_accident_per_year'] = $request->target_of_accident_per_year;
        $data['damaged_of_failed_vehicles_per_year'] = $request->damaged_of_failed_vehicles_per_year;
        $data['maintanance_programme_per_year'] = $request->maintanance_programme_per_year;
        $data['tyre_management_per_year'] = $request->tyre_management_per_year;
        $data['eco_driving_to_driver_per_year'] = $request->eco_driving_to_driver_per_year;
        $data['total_cost_electricity_per_year'] = $request->total_cost_electricity_per_year;
        $data['total_no_of_suppliers'] = $request->total_no_of_suppliers;
        $data['total_cost_of_procurement'] = $request->total_cost_of_procurement;
        DB::beginTransaction();
        try{
            if($trucking = TruckingCompany::create($data)){
                $truck_id = "GL-".$trucking->id;
                TruckingCompany::where('id',$trucking->id)->update(['truck_id'=>$truck_id]);
            }

        }catch(\Exception $e){
            DB::rollback();
            return redirect()->back()->withErrors(['errors'=>$e->getMessage()])->withInput($request->all());
        }
        DB::commit();
        Session::flash('success','A new Information added successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $id = Crypt::decrypt($id);
        $truck = TruckingCompany::find($id);
        $vehicle_types = VehicleType::where('status',1)->get();
        $fuel_types = FuelType::where('status',1)->get();
        $gross_vehicle_weights = GrossVehicleWeight::where('status',1)->get();
        return view('user.trucking.edit',compact('vehicle_types','fuel_types','gross_vehicle_weights','truck'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validator = Validator::make($request->all(),[
            'vehicle_type_id' => 'required | numeric',
            'year_of_manufacture' => 'required | numeric',
            'no_of_wheels' => 'required | numeric',
            'fuel_type_id' => 'required | numeric',
            'cost_of_fuel_consumption_per_year' => 'required',
            'no_of_running_per_km_year' => 'required',
            'avarage_distance_per_km_trip' => 'required',
            'gross_vehicle_weight_id' => 'required',
            'avarage_speed_per_km_hr' => 'required',
            'avarage_payload_per_trip' => 'required',
            'avarage_truck_capacity_utilization' => 'required',
            'operation_days' => 'required',
            'avarage_empty_trip_per_year' => 'required',
            'avarage_vehicle_backhauling_distance' => 'required',
            'avarage_idling_time_per_day' => 'required',
            'vehicle_breakdown_per_year' => 'required',
            'target_of_accident_per_year' => 'required',
            'damaged_of_failed_vehicles_per_year' => 'required',
            'maintanance_programme_per_year' => 'required',
            'tyre_management_per_year' => 'required',
            'eco_driving_to_driver_per_year' => 'required',
            'total_cost_electricity_per_year' => 'required',
            'total_no_of_suppliers' => 'required',
            'total_cost_of_procurement' => 'required',

        ]);
        if($validator->fails())
        return redirect()->back()->withErrors($validator)->withInput($request->all());
        $data['vehicle_type_id'] = $request->vehicle_type_id;
        $data['user_id'] = Auth::id();
        $data['year_of_manufacture'] = $request->year_of_manufacture;
        $data['no_of_wheels'] = $request->no_of_wheels;
        $data['fuel_type_id'] = $request->fuel_type_id;
        $data['cost_of_fuel_consumption_per_year'] = $request->cost_of_fuel_consumption_per_year;
        $data['no_of_running_per_km_year'] = $request->no_of_running_per_km_year;
        $data['avarage_distance_per_km_trip'] = $request->avarage_distance_per_km_trip;
        $data['gross_vehicle_weight_id'] = $request->gross_vehicle_weight_id;
        $data['avarage_speed_per_km_hr'] = $request->avarage_speed_per_km_hr;
        $data['avarage_payload_per_trip'] = $request->avarage_payload_per_trip;
        $data['avarage_truck_capacity_utilization'] = $request->avarage_truck_capacity_utilization;
        $data['operation_days'] = $request->operation_days;
        $data['avarage_empty_trip_per_year'] = $request->avarage_empty_trip_per_year;
        $data['avarage_vehicle_backhauling_distance'] = $request->avarage_vehicle_backhauling_distance;
        $data['avarage_idling_time_per_day'] = $request->avarage_idling_time_per_day;
        $data['vehicle_breakdown_per_year'] = $request->vehicle_breakdown_per_year;
        $data['target_of_accident_per_year'] = $request->target_of_accident_per_year;
        $data['damaged_of_failed_vehicles_per_year'] = $request->damaged_of_failed_vehicles_per_year;
        $data['maintanance_programme_per_year'] = $request->maintanance_programme_per_year;
        $data['tyre_management_per_year'] = $request->tyre_management_per_year;
        $data['eco_driving_to_driver_per_year'] = $request->eco_driving_to_driver_per_year;
        $data['total_cost_electricity_per_year'] = $request->total_cost_electricity_per_year;
        $data['total_no_of_suppliers'] = $request->total_no_of_suppliers;
        $data['total_cost_of_procurement'] = $request->total_cost_of_procurement;
        DB::beginTransaction();
        try{
            $trucking = TruckingCompany::where('id',$id)->update($data);

        }catch(\Exception $e){
            DB::rollback();
            return redirect()->back()->withErrors(['errors'=>$e->getMessage()])->withInput($request->all());
        }
        DB::commit();
        Session::flash('success','A new Information added successfully');
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $id = Crypt::decrypt($id);
        $truck = TruckingCompany::find($id);
        DB::beginTransaction();
        try{
            $truck->delete();

        }catch(\Exception $e){
            DB::rollback();
            return redirect()->back()->withErrors(['errors'=>$e->getMessage()]);
        }
        DB::commit();
        Session::flash('success','Deleted');
        return redirect()->back();
    }
}