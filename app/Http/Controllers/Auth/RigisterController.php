<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\SendCodeEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Products;
use App\Categories;
use App\Sizes;
use App\Carts;
use App\User;
use Illuminate\Support\Facades\auth;
use Illuminate\Support\Facades\hash;
class RigisterController extends Controller
{
    function sendCodeRegister(REQUEST $request){
        $email=$request->input('emailRegister');
        $users=User::where('email',$email)->get();
        $countUsers=count($users);
        if($countUsers!=0){
            $request->session()->flash('registered', 'Email này đã tồn tại!');
            return redirect('/');
        }else{
                 $code=rand(100000,999999);
                    $request->session()->push('code',$code);
                    $data=[
                        'title'=>'Email xác nhận',
                        'body'=>$code
                    ];
                  \Mail::to($email)->send(new SendCodeEmail($data));
                  return view('users.register',['code'=>$code,'email'=>$email]);
        }
    }
    function getPageRegister(){
        return view('users.register');
    }
       function registerAccount(REQUEST $request){
           $address=$request->address;
           $email=$request->email;
           $code=$request->code;
           $codeSent=$request->codeSent;
           $name=$request->nameUsers;
           $password=$request->password;
           $passwordAgain=$request->passwordAgain;
           if($code!=$codeSent){
            $request->session()->flash('codes', 'Mã xác nhận của bạn không đúng!');
            return view('users.register',['code'=>$code,'email'=>$email]);
           }else if($password!=$passwordAgain)
           {
            $request->session()->flash('password', 'Mật khẩu không trùng khớp!');
            return view('users.register',['code'=>$code,'email'=>$email]);
           }else{
            $hashPassword=Hash::make($password);
            $users= new User;
            $users->fullName=$name;
            $users->email=$email;
            $users->address=$address;
            $users->password=$hashPassword;
            $users->position='user';
            $users->save();
            return redirect('/');
           }
       }
}
