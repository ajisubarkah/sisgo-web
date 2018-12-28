<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Restock;
use App\Http\Requests;
use App\Transformers\RestockTransformers;
use League\Fractal\Resource\Collection;

class RestockController extends Controller
{
    public function getList(Restock $restock){
        $restocks = $restock->all();

        return fractal()
            ->collection($restocks)
            ->transformWith(new RestockTransformers)
            ->toArray();
    }

    public function addRestock(Request $request, Restock $restock){
        $restocks = $restock->create([
            'user_id'=>$request->user_id,
        ]);
        
        return response()->json(['status'=>201,'id'=>$restocks->id]);
    }
}
