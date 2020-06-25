<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Products;
use App\Companies;
use App\Categories;
use App\Sizes;
use App\Details;
use App\SizeProducts;
class ProductController extends Controller
{
    function viewDetails($slug)
    {   $categories = Categories::all();
        $products = Products::where('slug',$slug)->get();
        foreach ($products as $product) {
            $product->company;
            $product->category;
            $product->detail;
            $product->size;
        }
       return view('users.viewDetails',['products'=>$products,'categories'=>$categories]);
    }
}
