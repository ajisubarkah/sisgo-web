<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restock extends Model
{
    protected $table = "restock";
    public $primarikey = "id";
    public $timestamp = true;

    protected $fillable = [
        'user_id',
    ];
}
