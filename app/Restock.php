<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restock extends Model
{
    protected $table = "restock";
    public $primarikery = "id";
    public $timestamp = true;
}
