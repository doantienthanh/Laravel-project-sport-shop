<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Products;

class HomeController extends Controller
{
        function index($category=""){
            if($category!=""){
                return view('index',["categoryActive"=>$category]);
            }
            return view("index",["categoryActive"=>""]);
    
        }
        function getAllProduct(){
            $products=Products::all();
            $allProducts=Products::all();
            return view('users.getAllProduct',['products'=>$products,'allProducts'=>$allProducts]);
        }
}
