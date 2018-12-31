<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    protected $table = "goods";
    public $primarikey = "id";
    public $timestamp = true;

    protected $fillable = [
        'name', 'barcode', 'purchase', 'selling', 'stock', 'image',
    ];
}
