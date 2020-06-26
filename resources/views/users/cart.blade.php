@extends('layouts.master')
@section('content')
@include('partials/logo')
@include('partials/menuUser')
<div class="container" style="height:500px;"> <br><br>
    <h1 class="text-center">TẤT CẢ CÁC SẢN PHẨM CỦA BẠN ĐẢ THÊM VÀO GIỎ HÀNG</h1>
    <div class="table-wrapper-scroll-y my-custom-scrollbar" style="height:100%;">
        <table class="table table-striped table-bordered overflow-auto" style="height:400px;">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên sản phẩm</th>
                    <th>Hình ảnh</th>
                    <th>Số lượng</th>
                    <th>Giá</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($carts as $cart)
               <tr style="height:70px;">
                    <td></td>
                    <td class="text-center">{{$cart->product->name_product}}</td>
                    <td> <img src="{{'/storage/'. $cart->product->image}}" style="width:60px;hieght:60px;"></td>
                    <td class="text-center">{{$cart->quantity}}</td>
                    <td class="text-center">{{$cart->total_price}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection