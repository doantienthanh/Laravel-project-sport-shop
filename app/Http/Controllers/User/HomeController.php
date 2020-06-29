<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Products;
use App\Categories;
use App\Sizes;

class HomeController extends Controller
{
    // function index($category=""){
    //     if($category!=""){
    //         return view('index',["categoryActive"=>$category]);
    //     }
    //     return view("index",["categoryActive"=>""]);

    // }
    function viewProductByCategory($id){
        $categories = Categories::all();
        $sizes=Sizes::all(); 
        $products=Products::where('category_id',$id)->get();
        if($id!=""){
                    return view('users.viewProductByCategory',["categoryActive"=>$id,'products'=>$products,'categories'=>$categories,'sizes'=>$sizes]);
                }
               return view("index",["categoryActive"=>""]);
    }
    function index()
    {
        $categories = Categories::all();
        $products=Products::where('date_create','!=',null)->orderBy('date_create','desc')->limit(8)->get();
        $productDiscounts=Products::where('discount','!=',0)->limit(8)->get();
        $sizes=Sizes::all();  
        return view('index', ['sizes'=>$sizes,'categories' => $categories,'products'=>$products,'productDiscounts'=>$productDiscounts]);
    }
    function getAllProduct()
    {
        $products = Products::all();
        return view('users.getAllProduct', ['products' => $products]);
    }
}
