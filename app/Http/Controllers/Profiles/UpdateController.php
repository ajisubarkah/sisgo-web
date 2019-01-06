<?php

namespace App\Http\Controllers\Profiles;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
class UpdateController extends Controller
{
    public function update (Request $request) {
        $this->validate($request, [
            'fullname' => 'required',
            'email' => 'email|required',
            'photo' => 'image|max: 5000',
            'password' => 'confirmed|nullable|min: 6'          
        ]);

        $user = User::find($request->id);
        
        $user->name = $request->fullname;
        $user->email = $request->email;
        
        if($request->password) {
            $user->password = bcrypt($request->password);
        }
        
        if($request->hasFile('photo')) {
            $fileNameToStore = $request->id . '.jpg';
            
            $path = $request->file('photo')->storeAs('public/profiles', $fileNameToStore);
            
            $user->photo = 'storage/profiles/' . $fileNameToStore;
        }

        $user->save();

        return redirect('profile');
    }
}
