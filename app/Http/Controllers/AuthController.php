<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Transformers\UserTransformers;

class AuthController extends Controller
{
    
    public function regiter(Request $request, User $user){
        
    }

    public function login(Request $request, User $user){
        if(!Auth::attempt(['username'=>$request->username, 'password'=>$request->password])){
            return response()->json(['error'=>'Salah bangsat',401]);
        }

        $users = $user->find(Auth::user()->id);
    }
}
