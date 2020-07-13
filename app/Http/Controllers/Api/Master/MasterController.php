<?php

namespace App\Http\Controllers\Api\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VehicleType;
use App\Models\FuelType;
use App\Models\vehicleWeight;
use DB,Validator;
class MasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function vehicleTypes()
    {
        //
        $vehicle_types = VehicleType::select('id','name','km_litre')->where('status',1)->get();
        if(!$vehicle_types->isEmpty())
            return response()->json(['success'=>true,'data'=>$vehicle_types]);
        else
            return response()->json(['success'=>false]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function fuelTypes()
    {
        //
        $fuel_types = FuelType::select('id','name','price','unit')->where('status',1)->get();
        if(!$fuel_types->isEmpty())
            return response()->json(['success'=>true,'data'=>$fuel_types]);
        else
            return response()->json(['success'=>false]);
    }

    public function vehicleWeight()
    {
        //
        $vehicle_weights = FuelType::select('id','name')->where('status',1)->get();
        if(!$vehicle_weights->isEmpty())
            return response()->json(['success'=>true,'data'=>$vehicle_weights]);
        else
            return response()->json(['success'=>false]);
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
