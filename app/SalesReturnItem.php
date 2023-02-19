<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalesReturnItem extends Model
{
    protected $guarded=[];

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
