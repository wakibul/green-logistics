<?php

function left($str, $length) {
     return substr($str, 0, $length);
}

function right($str, $length) {
     return substr($str, -$length);
}

function getTotalCount($model,$where){
    return $model::where($where)->count();
}

function getAvarageAge($where){
    $companies =  "App\Models\TruckingCompany"::whereBetween('age',$where)->get();
    $total_companies =  "App\Models\TruckingCompany"::get();
    $company_array = [];
    foreach($companies as $key=>$val){
        array_push($company_array,$val->age);
    }
    return $average = ceil( array_sum($company_array) / count($total_companies) );
}



