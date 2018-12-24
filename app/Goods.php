<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    protected $table = "goods";
    public $primarikery = "id";
    public $timestamp = true;

}
