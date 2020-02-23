<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
       protected $table = "bills";

       public funtion bill_detail(){
       		return $this->hasMany('App\BillDetail','id_bill','id');
       }
       public funtion customer(){
       		return $this->belongsTo('App\Customer','id_customer','id');
       }
}
