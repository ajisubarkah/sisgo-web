<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Transformers\UserTransformers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    
    public function Register(Request $request, User $user){
        $this->validate($request,[
            'username' => 'required',
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $user = $user->create([
            'username' => $request->username,
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'token' => bcrypt($request->email)
        ]);

        return fractal()
            ->item($user)
            ->transformWith(new UserTransformers)
            ->toArray();
    }

    public function Login(Request $request, User $user){

        if(!Auth::attempt(['username'=>$request->username, 'password'=>$request->password])){
            return response()->json(['status'=>'error','error'=>401]);
        }

        $users = $user->find(Auth::user()->id);

        return fractal()
            ->item($users)
            ->transformWith(new UserTransformers)
            ->toArray();
    }
}
