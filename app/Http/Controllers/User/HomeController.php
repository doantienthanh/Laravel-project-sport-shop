<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
        function index($category=""){
            if($category!=""){
                return view('index',["categoryActive"=>$category]);
            }
            return view("index",["categoryActive"=>""]);
    
        }
}
