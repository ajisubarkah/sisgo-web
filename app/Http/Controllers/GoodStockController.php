<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transformers\GoodStockTransformers;
use App\GoodsStock;
use App\Goods;
use App\Restock;

class GoodStockController extends Controller
{
    public function addStock(Request $request){

        if(Goods::where('barcode', $request->barcode) && Restock::find($request->restock_id)){
            $gd = Goods::where('barcode', $request->barcode)->first();
            $gs = GoodsStock::create([
                'restock_id'=>$request->restock_id,
                'goods_id'=>$gd->id,
                'add_stock'=>$request->add_stock,
            ]);

            Goods::find($gd->id)->increment('stock', $request->add_stock);
            $gd = Goods::find($gd->id);

            return response()->json(['status'=>201, 'id'=> $gs->id, 'strNameGoods'=>$gd->name]);
        }

        return response()->json(['status'=>500, 'id'=> null, 'strNameGoods'=>null]);
    }

    public function listStock(Request $request){

        $goods = GoodsStock::where('restock_id', $request->id)->get();

        return fractal()
            ->collection($goods)
            ->transformWith(new GoodStockTransformers)
            ->toArray();
    }
}
