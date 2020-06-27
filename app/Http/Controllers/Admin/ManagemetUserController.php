<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Payments;
use App\Products;
use App\Companies;
use App\Categories;
use App\Sizes;
use App\Details;
use App\SizeProducts;
use App\Carts;
use Illuminate\Support\Facades\auth;
use Illuminate\Support\Facades\DB;
class ManagemetUserController extends Controller
{
    function returnPagesManagement(){
          $payments=Payments::all();
          foreach ($payments as $payment){
              $payment->users;
          }
          return view('admin.payment.managementAddMoney',['payments'=>$payments]);
    }
    function deleteAddMoney($id){
        Payments::find($id)->delete();
        return redirect('/admin/management/AddMoneyOfUser');
    }
}
