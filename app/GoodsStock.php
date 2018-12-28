<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GoodsStock extends Model
{
    protected $table = "goods_stock";
    public $primarikey = "id";
    public $timestamp = true;

    protected $fillable = [
        'goods_id', 'restock_id', 'add_stock',
    ];
}
