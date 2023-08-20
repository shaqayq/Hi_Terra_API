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

public function login(Request $request){
    $validator = Validator::make($request->all(), [
        'username' => 'required|string',
        'password' => 'required|string',
    ]);

      if ($validator->fails()) {
          return response(['message' => 'Validation failed', 'errors' => $validator->errors()], 422);
      }

      $user = User::select('user.*' , 'user_info.email')
          ->join('user_info', 'user.id', '=', 'user_info.userID')
          ->where('user.username', $request->username)
          ->orWhere('user_info.email', $request->username)
          ->first();

      if (!$user || !password_verify($request->password, $user->password)) {
          return response(['message' => 'Invalid credentials'], 401);
      }


      $token = $user->createToken('authToken')->accessToken;

      return response(['user' => $user, 'access_token' => $token , 'message'=> 'successfully login'], 200);
  }

}
