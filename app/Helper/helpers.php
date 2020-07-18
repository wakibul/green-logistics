<?php
function left($str, $length) {
     return substr($str, 0, $length);
}

function right($str, $length) {
     return substr($str, -$length);
}

function getTotalCount($model,$where,$user_id){
    return $model::where($where)->where('user_id',$user_id)->count();
}

function getAvarageAge($where,$user_id){
    $companies =  "App\Models\TruckingCompany"::whereBetween('age',$where)->where('user_id',$user_id)->get();
    if(!$companies->isEmpty()){
    $total_companies =  "App\Models\TruckingCompany"::get();
    $company_array = [];
    foreach($companies as $key=>$val){
        array_push($company_array,$val->age);
    }
    return $average = ceil( array_sum($company_array) / count($total_companies) );
    }
    else
    return 0;
}

function totalConsumption($model,$where,$field,$user_id){
    $fuel_consumption =  $model::where($where)->where('user_id',$user_id)->sum($field);
    if($fuel_consumption){
        return $fuel_consumption;
    }
    else
    return 0;
}



