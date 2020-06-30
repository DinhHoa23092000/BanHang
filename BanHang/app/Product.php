<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table='products';
    public function type_products(){
        return $this->beLongsTo('App\ProductType','id_type','id');
    }
}
