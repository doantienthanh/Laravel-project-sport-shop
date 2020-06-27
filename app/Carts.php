<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carts extends Model
{
    public function product(){
        return $this->beLongsToMany("App\Products","carts","id","product_id");
    }

    function getPriceTotal(){
        $formatedPrice=number_format($this->total_price,0,',','.');
        return $formatedPrice." VND";
    }
}
