<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Products;
use App\Categories;
use App\Sizes;
use App\Carts;
use Illuminate\Support\Facades\auth;
class HomeController extends Controller
{
    function viewProductByCategory($id){
        $countCarts=0;
         if(Auth::check()){
            $id_user = Auth::user()->id;
            $carts = Carts::where('user_id', $id_user)->get();
            $countCarts=count($carts);
        };
        $categories = Categories::all();
        $sizes=Sizes::all();
        $productByCategories=Products::where('category_id',$id)->limit(4)->get();
        $products=Products::where('category_id',$id)->limit(4)->get();
                    return view('users.viewProductByCategory',['countCarts'=>$countCarts,"categoryActive"=>$id,'productByCategories'=>$productByCategories,'products'=>$products,'categories'=>$categories,'sizes'=>$sizes]);
    }
    function index()
    {
        $countCarts=0;
         if(Auth::check()){
            $id_user = Auth::user()->id;
            $carts = Carts::where('user_id', $id_user)->get();
            $countCarts=count($carts);
        };
        // $carts = Carts::where('user_id', $id_user)->get();
        $categories = Categories::all();
        $products=Products::where('date_create','!=',null)->orderBy('date_create','desc')->limit(8)->get();
        $productDiscounts=Products::where('discount','!=',0)->limit(8)->get();
        $sizes=Sizes::all();
        return view('index', ['sizes'=>$sizes,'countCarts'=>$countCarts,'categories' => $categories,'products'=>$products,'productDiscounts'=>$productDiscounts]);
    }
    function getAllProduct()
    {           $countCarts=0;
        if(Auth::check()){
           $id_user = Auth::user()->id;
           $carts = Carts::where('user_id', $id_user)->get();
           $countCarts=count($carts);
       };
        $products = Products::all();
        return view('users.getAllProduct', ['products' => $products,'countCarts'=>$countCarts]);
    }
}
