<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "products";

    public funtion product_type(){
    	return $this->belongsTo('App\ProductType','id_type','id');
    }

    public funtion bill_detail(){
    	return $this->hasMany('App\BillDetail','id_product','id');
    }
}
