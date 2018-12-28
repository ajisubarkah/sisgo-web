<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\GoodsStock;
use App\Goods;

class GoodStockController extends Controller
{
    public function addStock(Request $request, GoodsStock $good){
        $goods = $good->create([
            'restock_id'=>$request->restock_id,
            'goods_id'=>$request->goods_id,
            'add_stock'=>$request->add_stock,
        ]);

        Goods::where('id', $request->goods_id)->increment('stock', $request->add_stock);

        return response()->json(['status'=>201,'id'=>$goods->id]);
    }

    public function listStock(Request $request, GoodsStock $good){
        $goods = GoodsStock::where('restock_id', $request->id)->get();
        
        return response()->json(['data'=>$goods]);
    }
}
