<?php

namespace App\Http\Controllers\Api\Trucking;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TruckingCompany;
use Validator,DB,Auth;
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
        $trucking = TruckingCompany::with(['fuelType'=>function($query){
            $query->select('id','name')->where('status',1);
        },'vehicleType'=>function($query){
            $query->select('id','name')->where('status',1);
        },'grossVehicleWeight'=>function($query){
            $query->select('id','name')->where('status',1);
        }])->where('status',1)->paginate(10);
        if(!$trucking->isEmpty()){
            return response()->json(['success'=>true,'data'=>$trucking]);
        }
        else
        return response()->json(['success'=>false,'data'=>'']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        return response()->json(['success'=>false,'error'=>$validator->errors()]);

        $data['vehicle_type_id'] = $request->vehicle_type_id;
        $data['user_id'] = Auth::guard('sanctum')->id();
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
            return response()->json(['success'=>false,'message'=>$e->getMessage()]);
        }
        DB::commit();
        return response()->json(['success'=>true,'message'=>'A new Information added successfully']);
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

        $trucking = TruckingCompany::with(['fuelType'=>function($query){
            $query->select('id','name')->where('status',1);
        },'vehicleType'=>function($query){
            $query->select('id','name')->where('status',1);
        },'grossVehicleWeight'=>function($query){
            $query->select('id','name')->where('status',1);
        }])->where([['id',$id],['user_id',Auth::guard('sanctum')->id()]])->first();
        if($trucking)
            return response()->json(['success'=>true,'data'=>$trucking]);
        else
            return response()->json(['success'=>false,'data'=>'']);

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
        $trucking = TruckingCompany::where('id',$id)->first();
        if($trucking == null)
        return response()->json(['success'=>false,'message'=>'No Records found']);
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
        return response()->json(['success'=>false,'error'=>$validator->errors()]);

        $data['vehicle_type_id'] = $request->vehicle_type_id;
        $data['user_id'] = Auth::guard('sanctum')->id();
        $data['year_of_manufacture'] = $request->year_of_manufacture;
        $data['age'] = intval(date('Y'))-intval($request->year_of_manufacture);
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
            return response()->json(['success'=>false,'message'=>$e->getMessage()]);
        }
        DB::commit();
        return response()->json(['success'=>true,'message'=>'Updated successfully']);



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
    }
}
