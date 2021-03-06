<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class TruckingCompany extends Model
{
    //
    use SoftDeletes;
    protected $guarded = ['id','token'];
    protected $hidden = ['status','deleted_at','created_at','updated_at'];
    public function fuelType(){
        return $this->belongsTo('App\Models\FuelType');
    }
    public function vehicleType(){
        return $this->belongsTo('App\Models\VehicleType');
    }
    public function grossVehicleWeight(){
        return $this->belongsTo('App\Models\GrossVehicleWeight');
    }
}
