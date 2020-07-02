<?php

namespace App\Http\Controllers\User;

use App\Carts;
use App\Categories;
use App\Codes;
use App\Http\Controllers\Controller;
use App\Orders;
use App\Products;
use App\Sizes;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\auth;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    public function viewDetails($slug)
    {$countCarts = 0;
        if (Auth::check()) {
            $id_user = Auth::user()->id;
            $carts = Carts::where('user_id', $id_user)->get();
            $countCarts = count($carts);
        };
        $categories = Categories::all();
        $sizes = Sizes::all();
        $products = Products::where('slug', $slug)->get();
        foreach ($products as $product) {
            $product->company;
            $product->category;
            $product->detail;
            $product->size;
        }
        return view('users.viewDetails', ['countCarts' => $countCarts, 'products' => $products, 'sizes' => $sizes, 'categories' => $categories]);
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
        $id_user = Auth::user()->id;
        $carts = Carts::where('user_id', $id_user)->get();
        $list = [];
        $quantity = [];
        $totalPriceCart = 0;
        foreach ($carts as $cart) {
            $id = [
                $cart->product_id,
            ];
            $quantities = [
                $cart->quantity,
            ];
            array_push($quantity, $quantities);
            array_push($list, $id);
            $totalPriceCart = $totalPriceCart + $cart->total_price;
        }
        if (Auth::user()->money < $totalPriceCart) {
            $request->session()->flash('status', 'Số tiền của bạn không đủ để tiến hành thanh toán !');
            return redirect('/home/viewCart/ofUser');
        } else {
            $users = User::find($id_user);
            $name = $users->fullName;
            $email = $users->email;
            $address = $users->address;
            $order = new Orders;
            $order->id_allProducts = json_encode($list);
            $order->quantity=json_encode($quantity);
            $order->user_id = $id_user;
            $order->fullNameUserOrder = $name;
            $order->address = $address;
            $order->email = $email;
            $order->totalPriceOrder = $totalPriceCart;
            $order->save();
            foreach ($carts as $cart) {
                $cart->delete();
            }
            return redirect('/home/viewCart/ofUser');
        }
    }

    // Sắp xếp sản phẩm tăng dần
    public function sortAscending()
    {
        $countCarts = 0;
        if (Auth::check()) {
            $id_user = Auth::user()->id;
            $carts = Carts::where('user_id', $id_user)->get();
            $countCarts = count($carts);
        };
        $product = Products::all();
        $sorted = $product->sortBy('price');
        $products = $sorted->values()->all();
        foreach ($products as $product) {
            $product->company;
            $product->category;
            $product->detail;
            $product->size;
        }
        return view('users.sortAscending', ['countCarts' => $countCarts, 'products' => $products]);
    }
    // Sắp xếp giảm dần
    public function sortDescending()
    {
        $countCarts = 0;
        if (Auth::check()) {
            $id_user = Auth::user()->id;
            $carts = Carts::where('user_id', $id_user)->get();
            $countCarts = count($carts);
        };
        $products = Products::where('price', '!=', 0)->orderBy('price', 'desc')->get();
        foreach ($products as $product) {
            $product->company;
            $product->category;
            $product->detail;
            $product->size;
        }
        return view('users.sortAscending', ['countCarts' => $countCarts, 'products' => $products]);
    }
    // Tìm kiếm sản phẩm
    public function searchProduct(REQUEST $request)
    {
        $countCarts = 0;
        if (Auth::check()) {
            $id_user = Auth::user()->id;
            $carts = Carts::where('user_id', $id_user)->get();
            $countCarts = count($carts);
        };
        $nameSearch = $request->searchProduct;
        if ($nameSearch == "") {
            $request->session()->flash('status', 'Bạn chưa nhập gì trong thanh tìm kiếm!');
            return Redirect('/');
        } else {
            $products = Products::where('name_product', 'LIKE', '%' . $nameSearch . '%')->get();
            if (count($products) == 0) {
                $request->session()->flash('statuses', 'Không tìm thấy kết quả nào phù hợp với:' . $nameSearch);
                return view('users.searchProducts', ['countCarts' => $countCarts, 'products' => $products]);
            } else {
                $request->session()->flash('statused', 'Kết quả cho:' . $nameSearch);
                return view('users.searchProducts', ['countCarts' => $countCarts, 'products' => $products]);
            }
        }
    }
}
