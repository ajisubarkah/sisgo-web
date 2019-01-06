<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Goods;
use App\User;
use Auth;

class IndexController extends Controller
{
    public function dashboard() {
        $countStock = Goods::all()->sum('stock');
        $countGoods = Goods::where('stock', '>=', 0)->count();
        $countOut = Goods::where('stock', '=', 0)->count();
        $countUser = User::all()->count();

        $data = [
            'countStock'=>$countStock,
            'countGoods'=>$countGoods,
            'countOut'=>$countOut,
            'countUser'=>$countUser,
        ];

        $this->titleNavigation = 'Testing';
        return view('pages.dashboard')->with(['data'=>$data]);
    }

    public function storage() {
        $data = Goods::paginate(10);
        return view('pages.storage')->with(['goods'=>$data]);
    }

    public function account() {
        $users = User::paginate(10);
        return view('pages.account')->with(['users'=>$users]);
    }

    public function profile() {
        $profile = User::find(Auth::user()->id);
        return view('pages.profile')->with(['profile'=>$profile]);
    }
}
