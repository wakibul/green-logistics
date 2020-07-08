<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use App\User;
use Validator;
use DB;
class AuthController extends Controller
{
    //
    public function login(Request $request){
        $validator = Validator::make($request->all(),[
            'email'=>'required|email',
            'password'=>'required'
        ]);
        if($validator->fails())
            return response()->json(['success'=>false,'error'=>$validator->errors()]);
        $user = User::where('email', $request->email)->first();
        if($user){
            if (Hash::check($request->password, $user->password)) {
                $token                 = $user->createToken('auth-token');
                $user->access_token = $token->plainTextToken;
            return response()->json(['success'=>true,'data'=>$user]);
            }
            else{
                return response()->json(['success'=>false,'error'=>['message'=>'Incorrect Password']]);
            }
        }
        else{
            return response()->json(['success'=>false,'error'=>['message'=>'Invalid User']]);
        }

    }

    public function register(Request $request){
        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'country_id' => 'required|numeric',
            'province' => 'required',
            'password' => 'required|min:6|confirmed'

        ]);
        if($validator->fails())
            return response()->json(['success'=>false,'error'=>$validator->errors()]);

        DB::beginTransaction();
        try{
            $data['name'] = $request->name;
            $data['email'] = $request->email;
            $data['country_id'] = $request->country_id;
            $data['province'] = $request->province;
            $data['phone_no'] = $request->phone_no;
            $data['password'] = bcrypt($request->password);
            $user = User :: create($data);
            $token = $user->createToken('auth-token');
            $user->access_token = $token->plainTextToken;

        }
        catch(\Exception  $e){
            return response()->json(['success'=>false,'error'=>['message'=>$e->getMessage()]]);
        }
        DB::commit();
        return response()->json(['success'=>true,'message'=>'Login Succesfull','data'=>$user]);

    }

}
