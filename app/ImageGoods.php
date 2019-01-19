<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageGoods extends Model
{
    protected $table = "image_goods";
    public $primarikey = "id";
    public $timestamp = true;

    protected $fillable = [
        'goods_id', 'url'
    ];

    public function hasGoods() {
        return $this->belongsTo(Goods::class,'goods_id');
    }
}
