<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    public function category(){
        return $this->beLongsTo("App\Categories","category_id","id");
    }
    public function company(){
        return $this->beLongsTo("App\Companies","company_id","id");
    }
    public function detail(){
        return $this->hasOne("App\Details","product_id","id");
    }
    public function size(){
        return $this->beLongsToMany("App\Sizes","size_products","product_id","size_id");
    }


    //
    function getPrice(){
        $formatedPrice=number_format($this->price,0,',','.');
        return $formatedPrice." VND";
     }
     function getOldPrice(){
        $formatedPrice=number_format($this->old_price,0,',','.');
        return $formatedPrice." VND";
     }
     function getDiscount(){
        $formatedPrice=number_format($this->discount,0,',','.');
        return $formatedPrice."%";
     }
}

