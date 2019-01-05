<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Goods;
use App\User;

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
        $data = Goods::all();
        return view('pages.storage')->with(['goods'=>$data]);
    }

    public function account() {
        return view('pages.account');
    }

    public function profile() {
        return view('pages.profile');
    }
}
