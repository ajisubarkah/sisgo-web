<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class NewController extends Controller
{
    public function index() {
        return view('pages.account.new');
    }
    
    public function newAccount(Request $request) {
        $this->validate($request, [
            'username' => 'required|unique:users',
            'fullname' => 'required',
            'email' => 'email|required',
            'photo' => 'image|max: 5000|nullable',
            'password' => 'confirmed|required|min: 6'          
        ]);

        $user = User::create([
            'username' => $request->username,
            'name' => $request->fullname,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'api_token' => bcrypt($request->email)
        ]);
        
        if($request->hasFile('photo')) {
            $fileNameToStore = $request->id . '.jpg';
            
            $path = $request->file('photo')->storeAs('public/profiles', $fileNameToStore);
            
            $user->photo = 'storage/profiles/' . $fileNameToStore;
            $user->save();
        }

        

        return redirect('account');
    }
}
