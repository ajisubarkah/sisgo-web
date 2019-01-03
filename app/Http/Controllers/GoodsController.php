<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Goods;
use App\Transformers\GoodTransformers;
use League\Fractal\Resource\Collection;

class GoodsController extends Controller
{
    public function goodsList(Goods $good){
        $goods = $good->all();

        return fractal()
            ->collection($goods)
            ->transformWith(new GoodTransformers)
            ->toArray();
	}

    public function detailGood(Request $request){
        if($goods = Goods::find($request->id)){
            return fractal()
                ->collection($goods)
                ->transformWith(new GoodTransformers)
                ->toArray();
        } else {
            return response()->json(['data'=>null]);
        }
    }
}
