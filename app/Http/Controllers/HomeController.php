<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VehicleType;
use App\Models\FuelType;
use App\Models\GrossVehicleWeight;
use App\Models\TruckingCompany;
use Validator,Session,DB,Auth,Crypt;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $vehicle_types = VehicleType::where('status',1)->get();
        $fuel_types = FuelType::where('status',1)->get();
        return view('user.home',compact('fuel_types','vehicle_types'));
    }
}
