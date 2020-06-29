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
use App\Codes;
use App\User;
use App\Orders;
use Illuminate\Support\Facades\auth;
use Illuminate\Support\Facades\DB;

use function GuzzleHttp\json_decode;

class ProductController extends Controller
{
    public function viewDetails($slug)
    {
        $categories = Categories::all();
        $products = Products::where('slug', $slug)->get();
        foreach ($products as $product) {
            $product->company;
            $product->category;
            $product->detail;
            $product->size;
        }
        return view('users.viewDetails', ['products' => $products, 'categories' => $categories]);
    }

    public function viewCart()
    {
        $id_user = Auth::user()->id;
        $carts = Carts::where('user_id', $id_user)->get();
        foreach ($carts as $cart) {
            $cart->product;
            $cart->user;
        }
        return view('users.cart', ['carts' => $carts]);
    }

    public function addToCart($slug)
    {
        $id_user = Auth::user()->id;
        $products = products::where('slug', $slug)->first();
        $id_product = $products->id;
        $carts = Carts::where('product_id', $id_product)->get();
        $countCarts = count($carts);
        $price_product = $products->price;
        if ($countCarts != 0) {
            $carts = Carts::where('product_id', $id_product)->first();
            $quantity = $carts->quantity + 1;
            $total = $quantity * $price_product;
            $carts->quantity = $quantity;
            $carts->total_price = $total;
            $carts->save();
        } else {
            $quantity = 1;
            $cart = new Carts;
            $cart->user_id = $id_user;
            $cart->product_id = $id_product;
            $cart->quantity = $quantity;
            $cart->total_price = $price_product * $quantity;
            $cart->save();
        }
        return redirect('/');
    }
    public function getQuantityCart()
    {
        $id_user = Auth::user()->id;
        $carts = Carts::where('user_id', $id_user);
        $quantity = 0;
        foreach ($carts as $cart) {
            $quantity = $quantity + $cart->quantity;
        }
        return view('index', $quantity);
    }
    // Hàm thêm số lượng cho sản phẩm trong giỏ hàng
    public function addQuantity($slug)
    {
        $products = products::where('slug', $slug)->first();
        $id_product = $products->id;
        $carts = Carts::where('product_id', $id_product)->first();
        $quantity = $carts->quantity + 1;
        $price_product = $products->price;
        $total = $quantity * $price_product;
        $carts->quantity = $quantity;
        $carts->total_price = $total;
        $carts->save();
        return redirect('/home/viewCart/ofUser');
    }
    // Hàm giảm số lượng trong giỏ hàng
    public function minusQuantity($slug)
    {
        $products = products::where('slug', $slug)->first();
        $id_product = $products->id;
        $carts = Carts::where('product_id', $id_product)->first();
        $quantity = $carts->quantity;
        if ($quantity > 1) {
            $quantity = $quantity - 1;
            $price_product = $products->price;
            $total = $quantity * $price_product;
            $carts->quantity = $quantity;
            $carts->total_price = $total;
            $carts->save();
        }
        return redirect('/home/viewCart/ofUser');
    }
    public function deleteProductInCart($id)
    {
        Carts::find($id)->delete();
        return redirect('/home/viewCart/ofUser');
    }

    // Dùng mã giảm giá
    public function useCode(REQUEST $request)
    {
        $codes = $request->codes;
        $codeses = Codes::all();
        foreach ($codeses as $code) {
            if ($code->code == $codes) {
                $id_user = Auth::user()->id;
                $carts = Carts::where('user_id', $id_user)->get();
                foreach ($carts as $cart) {
                    $cart->total_price = ($cart->total_price * $code->discount) / 100;
                    $cart->save();
                }
            }
        }
        return redirect('/home/viewCart/ofUser');
    }

    // Tiến hành thanh toán
    public function order(Request $request)
    {
        $id_user=Auth::user()->id;
        $carts=Carts::where('user_id', $id_user)->get();
        $list=[];
        $totalPriceCart=0;
        foreach ($carts as $cart) {
            $c=[
         "id"=>$cart->product_id,
         "quantity"=>$cart->quantity
     ];
            array_push($list, $c);
            $totalPriceCart=$totalPriceCart+$cart->total_price;
        }
        if (Auth::user()->money<$totalPriceCart) {
            $request->session()->flash('status', 'Số tiền của bạn không đủ để tiến hành thanh toán !');
            return redirect('/home/viewCart/ofUser');
        }else{
        $users=User::find($id_user);
        $name=$users->fullName;
        $email=$users->email;
        $address=$users->address;
        $order= new Orders;
        $order->id_allProducts= json_encode($list);
        $order->user_id=$id_user;
        $order->fullNameUserOrder=$name;
        $order->address=$address;
        $order->email=$email;
        $order->totalPriceOrder=$totalPriceCart;
        $order->save();
        foreach ($carts as $cart){
            $cart->delete();
        }
        return redirect('/home/viewCart/ofUser');
        }
    }

    // Sắp xếp sản phẩm tăng dần
    function sortAscending(){
        $product=Products::all();
        $sorted = $product->sortBy('price');
        $products=$sorted->values()->all();  
        return view('users.sortAscending',['products'=>$products]);
    }
    // Sắp xếp giảm dần
    function sortDescending(){
        $products=Products::where('price','!=',0)->orderBy('price','desc')->get();
        return view('users.sortAscending',['products'=>$products]);
    }
    
}
