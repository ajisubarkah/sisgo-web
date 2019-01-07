<?php

namespace App\Http\Controllers\Storages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\GoodsStock;

class ViewController extends Controller
{
    public function index($id) {
        $stock = GoodsStock::where('goods_id', $id)->paginate(10);
        return view('pages.storages.view')->with(['stocks'=>$stock]);
    }
}
