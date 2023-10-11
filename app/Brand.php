<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\FuncCall;

class Brand extends Model
{
    protected $guarded = [];
    public function product(){
        return $this->hasMany(Product::class);
    }
}
