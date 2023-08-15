<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
// use Auth;
use Hash;

use App\Helpers\APIHelper;
use App\Models\user;
use App\Models\user_info;
use App\Models\sys_session;
use App\Models\sys_device;

class AuthController extends Controller
{
    // public function login()
    // {
    //   $rules = [
    //     'username' => 'required',
    //     'password' => 'required',
    //     // 'platform' => 'required',
    //   ];
    //   $parameterError = APIHelper::checkParameter($rules);
    //   if($parameterError) return APIHelper::returnJSON(false, 400, $parameterError);
  
    //   $username = request('username');
    //   $password = request('password');
    // //   $platform = request('platform');
    //   $ipInfo = request('ipInfo');
    //   $deviceID = request()->header('deviceID');
  
    //   $credentials = [
    //     'username' => $username,
    //     'password' => $password,
    //     'status' => 1,
    //   ];
  
    //   $token = Auth::attempt($credentials);
    //   if(!$token) return APIHelper::returnJSON(false, 403, 'Incorrect Username or Password');
  
    //   $insertData = [
    //     'userID' => Auth::user()->id,
    //     // 'platform' => $platform,
    //     'ipInfo' => $ipInfo ? json_encode($ipInfo) : null,
    //     'authToken' => $token,
    //   ];
    //   sys_session::insert($insertData);
  
    //   sys_device::where('id', $deviceID)->update(['userID' => Auth::user()->id]);
  
    //   $data = [
    //     'userID' => Auth::user()->id,
    //     'countryID' => Auth::user()->userInfo->countryID,
    //     'token' => $token,
    //   ];
  
    //   return APIHelper::returnJSON(true, 200, 'Login Successfully', $data);
    // }


    public function login(Request $request)
{
    $validator = Validator::make($request->all(), [
        'username' => 'required|string',
        'password' => 'required|string',
    ]);

      if ($validator->fails()) {
          return response(['message' => 'Validation failed', 'errors' => $validator->errors()], 422);
      }

      $user = User::leftJoin('user_info', 'user.id', '=', 'user_info.userID')
          ->where('user.username', $request->username)
          // ->orWhere('user.email', $request->username)
          ->orWhere('user_info.email', $request->username)
          ->first();

      if (!$user || !password_verify($request->password, $user->password)) {
          return response(['message' => 'Invalid credentials'], 401);
      }


      $token = $user->createToken('authToken')->accessToken;

      return response(['user' => $user, 'access_token' => $token , 'message'=> 'successfully login'], 200);
  }

}
