<?php

namespace App\Http\Controllers\Storages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Goods;
use App\ImageGoods;

class EditController extends Controller
{
    public function edit($id) {
        $data = Goods::find($id);
        return view('pages.storages.edit')->with(['goods'=>$data]);
    }

    public function editGoods(Request $request) {
        
        $this->validate($request, [
            'name' => 'required',
            'barcode' => 'required',
            'selling' => 'required',
            'purchase' => 'required',
            'photo' => 'image|max:5000',
        ]);

        $goods = Goods::find($request->id);
        
        if($request->hasFile('photo')){
            $count = Goods::find($request->id)->getImage->count();
            $count = $count + 1;
            $fileNameToStore = $request->barcode . '-' . $count .'.jpg';
            
            $path = $request->file('photo')->storeAs('public/goods', $fileNameToStore);
            
            ImageGoods::create([
                'goods_id'=>$request->id,
                'url'=>'storage/goods/' . $fileNameToStore
            ]);
        }

        $goods->name = $request->name;
        $goods->barcode = $request->barcode;
        $goods->selling = Goods::deconvertFromRupiah($request->selling);
        $goods->purchase = Goods::deconvertFromRupiah($request->purchase);

        $goods->save();
        
        return redirect('storages');
    }
}
