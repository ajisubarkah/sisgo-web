<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Http\Requests;

class UserController extends Controller
{
    public function User (User $user){
        $users = $user->all();
        return response()->json(['data'=>$users]);
    }
}
