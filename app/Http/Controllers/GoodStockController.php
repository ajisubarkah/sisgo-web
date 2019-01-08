<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transformers\GoodStockTransformers;
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

        $gd = Goods::where('id', $request->goods_id)->increment('stock', $request->add_stock);
        if($gd)
            return response()->json(['status'=>201,'id'=>$goods->id]);
        
        return response()->json(['status'=>500,'message'=>'Internal server error!']);
    }

    public function listStock(Request $request){
        $goods = GoodsStock::where('restock_id', $request->id)->get();
        return fractal()
            ->collection($goods)
            ->transformWith(new GoodStockTransformers)
            ->toArray();
    }
}
