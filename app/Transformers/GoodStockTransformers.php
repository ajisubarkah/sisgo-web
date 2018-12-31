<?php

namespace App\Transformers;

use App\GoodsStock;
use App\Goods;
use League\Fractal\TransformerAbstract;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;

class GoodStockTransformers extends TransformerAbstract{
  public function transform(GoodsStock $gs){
    $gd = Goods::find($gs->goods_id);
    return [
      'intId' => $gs->id,
      'strBarcode' => $gd->barcode,
      'strName' => $gd->name,
      'intAddStok' => $gs->add_stock,
    ];
  }
}
