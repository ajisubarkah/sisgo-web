<?php

namespace App\Http\Controllers\Storages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Goods;
use App\ImageGoods;
class NewController extends Controller
{
    public function index() {
        return view('pages.storages.new');
    }
    
    public function goods(Request $request) {
        $this->validate($request, [
            'barcode' => 'required|unique:goods',
            'name' => 'required',
            'selling' => 'required',
            'purchase' => 'required',
            'photo' => 'image|max: 5000|nullable',
        ]);

        $goods = Goods::create([
            'barcode' => $request->barcode,
            'name' => $request->name,
            'selling' => Goods::deconvertFromRupiah($request->selling),
            'purchase' => Goods::deconvertFromRupiah($request->purchase),
            'stock' => 0,
        ]);
        
        if($request->hasFile('photo')) {
            $fileNameToStore = $request->barcode . '-1.jpg';
            
            $path = $request->file('photo')->storeAs('public/goods', $fileNameToStore);
            
            ImageGoods::create([
                'goods_id'=>$goods->id,
                'url'=>'storage/goods/' . $fileNameToStore
            ]);
        }
        return redirect('storages');
    }
}
