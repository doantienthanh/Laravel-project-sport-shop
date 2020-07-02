<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\hash;
use Illuminate\Support\Facades\auth;
use Illuminate\Support\Facades\DB;
class LoginController extends Controller
{
    function login(Request $request){
        $email=$request->input('emailLogin');
          $password=$request->input('passwordLogin');
          if (Auth::attempt(['email' => $email, 'password' => $password])) {
          $user=Auth::user();
        if($user->position=='user'){
          return redirect('/');
        }
        else{
          return redirect('/admin/dashboard');
        }

       }else{
        $request->session()->flash('loginFeils', 'Mật khẩu hoặc email của bạn không đúng !');
        return  redirect('/');
       }
     }

     function logout(){
      Auth::logout();
      return redirect('/');
     }
}
