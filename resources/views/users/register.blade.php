@extends('layouts.master')
@section('content')
@include('partials/logo')
@include('partials/menuUser')
        <div class="container" style="width: 40%;margin-top: 80px;" id="registerForm">
            <h1 class="text-center" style="margin-top: 20px;"><b style="color: red">NHẬP THÔNG TIN</b></h1>
         <form action="/users/registerAccount" method="post">
            @csrf
             <div class="form-group">
                <input id="my-input" class="form-control" value="<?php echo $code ?>" type="number" readonly  name="code" style="display: none"> <br> <br>
                <input id="my-input" class="form-control" value="<?php echo $email ?>" type="email" readonly  name="email"> <br> <br>
                @if (session('codes'))
                <div class="alert alert-danger" style="text-align: center">{{session('codes')}}</div>
            @endif
                <label for="my-input">Code:</label>
                 <input id="my-input" class="form-control" placeholder="Nhập mã bạn vừa nhận trong email"  type="number" name="codeSent"><br><br>
                 <input id="my-input" class="form-control" placeholder="Nhập Tên đầy đủ của bạn" type="text" name="nameUsers"> <br> <br>
                 <input id="my-input" class="form-control" placeholder="Nhập Địa chỉ" type="text" name="address"> <br> <br>
                 @if (session('password'))
                <div class="alert alert-danger" style="text-align: center">{{session('password')}}</div>
            @endif
                 <input id="my-input" class="form-control" placeholder="Nhập mật khẩu" type="password" name="password"> <br> <br>
                 <input id="my-input" class="form-control" placeholder="Nhập lại mật khẩu" type="password" name="passwordAgain"> <br> <br>
             </div>
             <button class="btn btn-info" type="submit" style="width: 100%;height: 1.2cm;margin-bottom: 20px;">ĐĂNG KÍ</button>
         </form>
        </div>
@endsection
