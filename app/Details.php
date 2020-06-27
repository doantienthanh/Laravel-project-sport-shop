<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Details extends Model
{
    public function product(){
        return $this->hasOne("App\Details","product_id","id");
    }
}
