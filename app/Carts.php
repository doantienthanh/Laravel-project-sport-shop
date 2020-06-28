<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carts extends Model
{
    public function product(){
        return $this->belongsTo("App\Products","product_id","id");
    }
    public function user(){
        return $this->hasMany("App\User","id","user_id");
    }

    function getPriceTotal(){
        $formatedPrice=number_format($this->total_price,0,',','.');
        return $formatedPrice." VND";
    }
}
