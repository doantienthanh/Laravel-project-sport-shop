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
use App\Carts;
use Illuminate\Support\Facades\auth;
use Illuminate\Support\Facades\DB;
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

    function viewCart(){
        $id_user=Auth::user()->id;
        $carts=Carts::where('user_id',$id_user)->get();
        foreach($carts as $cart){
            $cart->product;
        }
     return view('users.cart',['carts'=>$carts]);
}

function addToCart($slug){
      $id_user=Auth::user()->id;
      $products=products::where('slug',$slug)->first();
      $id_product=$products->id;
      $carts=Carts::where('product_id',$id_product)->get();
      $countCarts=count($carts);
      $price_product=$products->price;
      if($countCarts!=0){
          $carts=Carts::where('product_id',$id_product)->first();
          $quantity= $carts->quantity+1;
          $total=$quantity*$price_product;
          $carts->quantity=$quantity;
          $carts->total_price=$total;
          $carts->save();
      }else{
        $quantity=1;
        $cart= new Carts;
        $cart->user_id=$id_user;
        $cart->product_id=$id_product;
        $cart->quantity=$quantity;
        $cart->total_price=$price_product*$quantity;
        $cart->save();
      }
      return redirect('/');
}
function getQuantityCart(){
    $id_user=Auth::user()->id;
    $carts=Carts::where('user_id',$id_user);
    $quantity=0;
    foreach($carts as $cart){
        $quantity=$quantity+$cart->quantity;
    }
    return view('index',$quantity);
}
// Hàm thêm số lượng cho sản phẩm trong giỏ hàng
function addQuantity($slug){
    $products=products::where('slug',$slug)->first();
    $id_product=$products->id;
    $carts=Carts::where('product_id',$id_product)->first();
          $quantity= $carts->quantity+1;
          $price_product=$products->price;
          $total=$quantity*$price_product;
          $carts->quantity=$quantity;
          $carts->total_price=$total;
          $carts->save();
          return redirect('/home/viewCart/ofUser');
}
// Hàm giảm số lượng trong giỏ hàng
function minusQuantity($slug){
    $products=products::where('slug',$slug)->first();
    $id_product=$products->id;
    $carts=Carts::where('product_id',$id_product)->first();
          $quantity= $carts->quantity;
          if($quantity>1){
            $quantity= $quantity-1;
            $price_product=$products->price;
            $total=$quantity*$price_product;
            $carts->quantity=$quantity;
            $carts->total_price=$total;
            $carts->save();
          }
          return redirect('/home/viewCart/ofUser');
}
function deleteProductInCart($id){
Carts::find($id)->delete();
return redirect('/home/viewCart/ofUser');
}
}
