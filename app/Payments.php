<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
   public function users(){      
            return $this->hasOne("App\User","id","user_id");
    }
    function getMoney(){
        $formatedPrice=number_format($this->money,0,',','.');
        return $formatedPrice." VND";
    }
}
