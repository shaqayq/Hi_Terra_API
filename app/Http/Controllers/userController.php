<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;

class userController extends Controller
{
    public function getAlluser () {
      
        $users = User::select('user.id', 'user_info.fullname')
        ->join('user_info', 'user.id', '=', 'user_info.userID')
        ->get();
        return response()->json(['users' => $users]);
    }
}
