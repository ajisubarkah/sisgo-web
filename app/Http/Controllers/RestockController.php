<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restock;
use App\Http\Requests;
class RestockController extends Controller
{
    public function getList(Restock $restock){
        $restock = $restock->all();
        return response()->json(['data'=>$restock]);
    }

    public function addRestock(Request $request, Restock $restock){

    }
}
