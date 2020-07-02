<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Payments;
use App\Products;
use App\Companies;
use App\Categories;
use App\Sizes;
use App\Details;
use App\SizeProducts;
use App\Orders;
use App\Comments;
use App\Codes;
use Faker\Provider\ar_SA\Payment;

class DashboardContronller extends Controller
{
    function index(){
        $users=User::where('position','user')->get();
        $countUsers=count($users);
        $products=Products::all();
        $countProducts=count($products);
        $categories=Categories::all();
        $countCategory=count($categories);
        $orders=Orders::all();
        $countOrders=count($orders);
        $sizes=Sizes::all();
        $countSizes=count($sizes);
        $comments=Comments::all();
        $countComments=count($comments);
        $companies=Companies::all();
        $countCompany=count($companies);
        $payments=Payments::all();
        $countPayments=count($payments);
        $code=Codes::all();
        $countCode=count($code);
        return view('admin.dashboard',['countUsers'=>$countUsers,'countProducts'=>$countProducts,'countCategory'=>$countCategory,'countOrders'=>$countOrders,
        'countSizes'=>$countSizes,'countCode'=>$countCode,'countComments'=>$countComments,'countCompany'=>$countCompany,'countPayments'=>$countPayments]);
    }
}
