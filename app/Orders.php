<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    function getTotalPriceOrder(){
        $formatedPrice=number_format($this->totalPriceOrder,0,',','.');
        return $formatedPrice." VND";
    }
}
