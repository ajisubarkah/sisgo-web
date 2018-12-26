<?php

namespace App\Transformers;

use App\Goods;
use League\Fractal\TransformerAbstract;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;

class GoodTransformers extends TransformerAbstract{
    public function transform(Goods $good){
        return [
            'id' => $good->id,
            'name' => $good->name,
            'barcode' => $good->barcode,
            'pricePurchase' => $good->purchase,
            'priceSelling' => $good->selling,
            'stock' => $good->stock,
            'createdAt' => $good->created_at->format('d M y H:i'),
            'updatedAt' => $good->updated_at->format('d M y H:i'),
        ];
    }
}
