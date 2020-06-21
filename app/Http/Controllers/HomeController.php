<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    function index($category=""){

        if($category!=""){
            return view('index',["categoryActive"=>$category]);
        }
        return view("index",["categoryActive"=>""]);

    }
}
