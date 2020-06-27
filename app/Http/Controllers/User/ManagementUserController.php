<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Payments;
use App\Products;
use App\Companies;
use App\Categories;
use App\Sizes;
use App\Details;
use App\SizeProducts;
use App\Carts;
use Illuminate\Support\Facades\auth;
use Illuminate\Support\Facades\DB;
class ManagementUserController extends Controller
{
    function addMoney(REQUEST $request){
      $money=$request->money;
     $id_user=Auth::user()->id;
     $checkUser=Payments::where('user_id',$id_user)->get();
     $checkCount=count($checkUser);
     if($checkCount==0){
        $addMoney=new Payments;
        $addMoney->user_id=$id_user;
        $addMoney->money=$money;
        $addMoney->save();
     }else{
         $moneys=Payments::where('user_id',$id_user)->first();
         $moneys->user_id=$id_user;
         $moneys->money+=$money;
         $moneys->save();
     }
     return redirect('/');
    }
}
