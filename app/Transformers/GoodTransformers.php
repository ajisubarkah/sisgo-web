<?php

namespace App\Transformers;

use App\Goods;
use League\Fractal\TransformerAbstract;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;

class GoodTransformers extends TransformerAbstract{
    public function transform(Goods $good){
      $images = url($good->image);
        return [
            'intId' => $good->id,
            'strName' => $good->name,
            'strImg' => $images,
            'strBarcode' => $good->barcode,
            'intPurchase' => $good->purchase,
            'intSelling' => $good->selling,
            'intStock' => $good->stock,
            'strCreatedAt' => $good->created_at->format('d M y H:i'),
            'strCpdatedAt' => $good->updated_at->format('d M y H:i'),
        ];
    }
}
