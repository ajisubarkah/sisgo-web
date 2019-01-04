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
    public function form() {
        if(Auth::guest())
            return view('login');
        else
            return redirect('dashboard');
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }

    public function attemptLogin(Request $request) {
        $this->validate($request, [
            'username' => 'exists:users,username',
            'password' => 'required',
        ]);

        if (Auth::attempt(['username'=>$request->username, 'password'=>$request->password])) {
            return redirect('dashboard');
        }

        return redirect()->back();
    }

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
            'api_token' => bcrypt($request->email)
        ]);

        return fractal()
        ->item($user)
        ->transformWith(new UserTransformers)
        ->toArray();
    }

    public function Login(Request $request, User $user){

        if(Auth::attempt(['username'=>$request->username, 'password'=>$request->password])){
            $users = $user->find(Auth::user()->id);
            return response()->json(['status'=>200,'message'=>'OK','token'=>$users->api_token]);
        } else {
            return response()->json(['status'=>401,'message'=>'Unauthorized','token'=>null]);
        }

    }
}
