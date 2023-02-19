<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function suppliers(){
        return $this->belongsTo(Supplier::class);
    }

    public function brand(){
        return $this->belongsTo(Brand::class);
    }

    public function product_type(){
        return $this->belongsTo(Product_type::class);
    }

    public function group(){
        return $this->belongsTo(Group::class);
    }
}
