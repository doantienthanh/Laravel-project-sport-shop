<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\SendCodeEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class RigisterController extends Controller
{
    function  sendCodeRegister(REQUEST $request){
               $code=rand(1000,9999);
               $request->session()->push('code',$code);
               $data=[
                   'title'=>'Email xác nhận',
                   'body'=>$code
               ];
             Mail::to($request->input('emailRegister'))->send(new SendCodeEmail($data));
    }
}
